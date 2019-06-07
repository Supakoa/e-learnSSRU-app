<?php

namespace App\Http\Controllers;
use App\subject as subject;
use App\course as course;

use Illuminate\Http\Request;

class Std_viewer extends Controller
{
    public function Std_home(){
        return view('std_viewer.std_home.index');
    }

    public function all_subject(){
        $subjects = subject::all();

        return view('std_viewer.std_subject.Show_sub')->with('subjects',$subjects);
    }

    public function show_subject(subject $subject){
        $courses = $subject->courses;
        return view('std_viewer.std_subject.std_course.Show_course')->with('subject',$subject)->with('courses',$courses);
    }


    public function Std_course(course $course){
        $lessons = $course->lessons;
        return view('std_viewer.std_subject.std_course.Course')->with('course',$course)->with('lessons',$lessons);
    }

    public function Std_quiz(){
        return view('std_viewer.std_subject.std_quiz.Quiz');
    }
    public function Std_quizDashboard(){
        return view('std_viewer.std_subject.std_quiz.Quiz_dashboard');
    }

    public function Std_payment(){
        return view('std_viewer.std_payment.Payment');
    }
}
