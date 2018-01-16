<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public static function getAnswerlist($exp_id, $sub_id){
        return Answer::where('experiment_id', $exp_id)
            ->where('subject_id', $sub_id)->orderBy('subject_id')
            ->get();
    }

    public static function getRandomAudio($exp_id, $sub_id){

        // get the subject and its records of answers
        $subject = Subject::find($sub_id);
        $answerList = Answer::getAnswerlist($exp_id, $sub_id);

        // generate the audio list of the records
        $audioList = array();
        foreach ($answerList as $answer){
            $audioList[] = $answer->audio_id;
        }

        if (count($audioList) == Audio::countByExperiment($exp_id)){ // Audio::count() needs to be modified as well as the database
            return -1;
        }
        else{
            // generate a list of audios that have not been played
            // it is paly array_diff between id of all audios in the experiment and id of records
            $list = array_diff(Audio::getIdListByExperimentId($exp_id), $audioList);
            
            if (count($list) == 0){
                return -1;
            }

            // choose a random number that is not in audiolist
            return $list[array_rand($list)];

        }

    }
}
