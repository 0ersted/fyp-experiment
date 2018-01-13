<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Audio;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
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

        if ($exp_id == 1){
            // generate a random audio or sth
            $num = Answer::getRandomAudioBySubjectId($sub_id);
            return redirect('exp/' .$exp_id. '/subject/' .$sub_id. '/audio/' .$num);
        }



        // go to main page
        return view('/');
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
        $answer->experiment_id = 1;
        $answer->experimenter = 1;

        $answer->solution_emotion = $solution;

        $key = Audio::getKeyByAudioId($audio_id);
        if ($solution == $key){
            $answer->correctness = 1;
        }

        $answer->save();

        //generate a random number in the rest of audios
        $num = Answer::getRandomAudioBySubjectId($sub_id);

        if ($num == -1){
            return redirect('exp/' .$exp_id. '/subject/'.$sub_id.'/finish');
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
