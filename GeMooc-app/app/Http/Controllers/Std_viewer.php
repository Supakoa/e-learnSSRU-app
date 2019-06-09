<?php

namespace App\Http\Controllers;
use App\subject as subject;
use App\course as course;
use App\content as content;


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
     public function show_content(course $course,content $content)
    {
        if($content->type==1){
            return view('std_viewer.std_subject.std_course.content.CT_video');
        }elseif($content->type==2){
            return view('std_viewer.std_subject.std_course.content.CT_text');
        }else{
            $quiz = $content->quiz;
            // dd($quiz);
        return view('std_viewer.std_subject.std_quiz.Quiz')->with('course',$course)->with('quiz',$quiz);

        }
    }
    public function Std_quiz(){
        return view('std_viewer.std_subject.std_quiz.Quiz');
    }
    public function Std_quizDashboard(){
        return view('std_viewer.std_subject.std_quiz.Quiz_dashboard');
    }
    public function Std_quizPreview(){
        return view('std_viewer.std_subject.std_quiz.Preview');
    }

    public function Std_payment(){
        return view('std_viewer.std_payment.Payment');
    }
}
