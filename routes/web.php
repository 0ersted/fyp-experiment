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

Route::get('exp/{exp_id}/subject/{sub_id}', 'AnswerController@index');

Route::get('show', 'AnswerController@show');

Route::get('exp/{exp_id}/subject/{sub_id}/audio/{audio_id}', 'AnswerController@main');

Route::post('exp/{exp_id}/subject/{sub_id}/audio/{audio_id}/{solution}', 'AnswerController@store');

Route::get('exp/{exp_id}/subject/{sub_id}/finish', 'AnswerController@finish');