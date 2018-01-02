<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';

    public static function getKeyByAudioId($id){
        $audio = Audio::find($id);
        return $audio->emotion;
    }

    public static function count(){
        return Audio::all()->count();
    }

}
