<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Audio;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, $sub_id, $audio_id, $solution){
        $answer = new Answer;
        $answer->subject_id = $sub_id;
        $answer->audio_id = $audio_id;
        $answer->solution = $solution;

        $key = Audio::getKeyByAudioId($audio_id);
        if ($solution == $key){
            $answer->correctness = 1;
        }

        $answer->save();

        //generate a random number in the rest of audios
        $num = Answer::getRandomAudioBySubjectId($sub_id);

        if ($num == -1){
            return redirect('subject/'.$sub_id.'/finish');
        }
        return redirect('subject/' . $sub_id . '/audio/' . $num );
    }
}
