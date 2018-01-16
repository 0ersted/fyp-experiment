<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Audio;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    private $exp_list1 = array(1, 3);
    private $exp_list2 = array(2);

    public function index($exp_id, $sub_id){

        // a blade view of about the experiment instruction
        return view('instruction', [
            'sub_id' => $sub_id,
            'exp_id' => $exp_id
        ]);
    }
    
    public function show( Request $request ){
        // get input
        $exp_id= $request->input('exp_id');
        $sub_id = $request->input('sub_id');

        $num = Answer::getRandomAudio($exp_id, $sub_id);
        return redirect('exp/' .$exp_id. '/subject/' .$sub_id. '/audio/' .$num);

    }

    public function main($exp_id, $sub_id, $audio_id){
    
        return view('main', [
            'exp_id' => $exp_id,
            'sub_id' => $sub_id,
            'audio' => Audio::find($audio_id)
        ]);

    }

    public function store(Request $request, $exp_id, $sub_id, $audio_id, $solution){
        $answer = new Answer;
        $answer->subject_id = $sub_id;
        $answer->audio_id = $audio_id;
        $answer->experiment_id = $exp_id;


        if (in_array($exp_id, $this->exp_list1)){
            $answer->experimenter = 1;
            $key = Audio::getEmotionByAudioId($audio_id);
            $answer->solution_emotion = $solution;
        }
        elseif (in_array($exp_id, $this->exp_list2)){
            $answer->experimenter = 2;
            $key = Audio::getToneByAudioId($audio_id);
            $answer->solution_tone = $solution;
            // not completed yet
        }

        //dd([$key, $solution]);
        if ($solution == $key){
            $answer->correctness = 1;
        }
        //dd($answer->correctness);
        //dd($answer);
        $answer->save();

        //generate a random number in the rest of audios
        $num = Answer::getRandomAudio($exp_id, $sub_id);

        if ($num == -1){
            return redirect('exp/' .$exp_id. '/subject/'. $sub_id. '/finish');
        }
        return redirect('exp/' .$exp_id. '/subject/' . $sub_id . '/audio/' . $num );

    }

    public function finish($exp_id, $sub_id){
        $list = Answer::where('subject_id', $sub_id)->orderBy('subject_id', 'asc')->get();

        $correct = 0;
        foreach ($list as $l){
            if ($l->correctness == 1){
                $correct++;
            }
        }
        $accuracy = $correct/count($list);
        return view('finish', ['accuracy' => $accuracy]);
    }
}
