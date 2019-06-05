<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Std_viewer extends Controller
{
    public function Std_home(){
        return view('std_viewer.std_home.index');
    }

    public function Std_subject(){
        return view('std_viewer.std_subject.Show_sub');
    }

    public function Std_showcourse(){
        return view('std_viewer.std_subject.std_course.Show_course');
    }
    public function Std_course(){
        return view('std_viewer.std_subject.std_course.Course');
    }

    public function Std_quiz(){
        return view('std_viewer.std_subject.std_quiz.Quiz');
    }

    public function Std_payment(){
        return view('std_viewer.std_payment.Payment');
    }
}
