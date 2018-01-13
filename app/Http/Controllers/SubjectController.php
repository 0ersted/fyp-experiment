<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Answer;
use Illuminate\Http\Request;


class SubjectController extends Controller
{
    
    public function store(Request $request)
    {
        // create new subject
        $subject = new Subject;
        $subject->name = $request->input('sub_name');
        $subject->save();

        $experiment_id = $request->input('experiment_id');

        // go to the instruction page
        return redirect('exp/' . $experiment_id . '/subject/' . $subject->id);
        // just generate a random number which is a audio #
        // $num = Answer::getRandomAudioBySubjectId($subject->id);

        // redirect
        // return redirect('subject/' . $subject->id . '/audio/' . $num );

    }

}
