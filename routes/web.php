<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('subject', 'SubjectController@store');

Route::get('subject/{sub_id}/audio/{audio_id}', function($sub_id, $audio_id){
    
    return view('main', [
        'sub_id' => $sub_id,
        'audio' => App\Audio::find($audio_id)
    ]);

});

Route::post('subject/{sub_id}/audio/{audio_id}/{solution}', 'AnswerController@store');

Route::get('subject/{sub_id}/finish', function($sub_id){
    $list = App\Answer::where('subject_id', $sub_id)->orderBy('subject_id', 'asc')->get();

    $correct = 0;
    foreach ($list as $l){
        if ($l->correctness == 1){
            $correct++;
        }
    }
    $accuracy = $correct/count($list);
    return view('finish', ['accuracy' => $accuracy]);
});