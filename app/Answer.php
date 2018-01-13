<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public static function getRandomAudioBySubjectId($sub_id){

        $subject = Subject::find($sub_id);
        $answerList = Answer::where('subject_id', $sub_id)->orderBy('subject_id', 'asc')->get();

        $audioList = array();
        foreach ($answerList as $answer){
            $audioList[] = $answer->audio_id;
        }

        if (count($audioList) == Audio::count()){ // Audio::count() needs to be modified as well as the database
            return -1;
        }
        else{
            // generate a list of audios that have not been played
            $list = array_diff(range(1, Audio::count()), $audioList);
            
            if (count($list) == 0){
                return -1;
            }

            // choose a random number that is not in audiolist
            return $list[array_rand($list)];

        }

    }
}
