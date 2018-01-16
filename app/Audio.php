<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';

    public static function getNameById($id){
        $audio = Audio::find($id);
        return $audio->name;
    }

    public static function getEmotionByAudioId($id){
        $audio = Audio::find($id);
        return $audio->emotion;
    }

    public static function getToneByAudioId($id){
        $audio = Audio::find($id);
        return $audio->tone;
    }

    public static function countByExperiment($exp_id){
        return Audio::all()->where('experiment', $exp_id)->count();
    }

    public static function getListByExperimentId($exp_id){
        return Audio::where('experiment', $exp_id)->orderBy('id')->get()->toArray();
    }

    public static function getIdListByExperimentId($exp_id){
        $list = Audio::getListByExperimentId($exp_id);
        return array_column($list, 'id');
    }
}
