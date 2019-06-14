<?php

namespace App\Http\Controllers;
use App\subject as subject;
use App\course as course;
use App\content as content;
use App\Http\Controllers\Session;

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


     public function show_content(content $content)
    {
        $course = $content->lesson->course;
        // dd($course);
        if($content->type==1){
            return view('std_viewer.std_subject.std_course.content.CT_video')->with('lessons',$course->lessons)->with('now_content',$content);
        }elseif($content->type==2){
            $article = $content->article;
            return view('std_viewer.std_subject.std_course.content.CT_text')->with('course',$course)->with('article',$article)->with('lessons',$course->lessons)->with('now_content',$content);
        }else{
            $quiz = $content->quiz;
            $time = $quiz->time*60;
            session(['time'=>$time]);
            return view('std_viewer.std_subject.std_quiz.Quiz')->with('course',$course)->with('quiz',$quiz);

        }
    }
    public function submit_quiz(content $content,Request $request){
        $course = $content->lesson->course;

        if($request->timeleft=="Wait..."){
                return redirect('/std_view/course/'.$course->id);
            }
            $quiz = $content->quiz;
            $questions = $quiz->questions;
            $score = 0;
            foreach ($questions as $key => $question) {
                $answers = $question->answers->where('correct','1');
                $question_id="question_".$question->id;
                if ($request->has($question_id)) {
                    $answer_now = $question->answers->where('id',$request->$question_id)->first();
                    auth()->user()->answers()->attach($answer_now);
                }
                if($answers->count()>1){
                    // มีถูกหลายคำตอบ
                }else{
                    $answer = $answers->pop()->id;
                    $question_id="question_".$question->id;
                    if($answer == $request->$question_id){
                     $score++;
                    }
                }
            }
            $temp = auth()->user()->scores()->attach($quiz,['score'=>$score,'time'=>$request->timeleft]);
            return redirect('std_view/course/content/'.$content->id.'/dashboard');

    }
    public function show_dashboard(content $content)
    {
        $course = $content->lesson->course;
        if($content->type==1){
            return view('std_viewer.std_subject.std_course.content.CT_video')->with('lessons',$course->lessons)->with('now_content',$content);
        }elseif($content->type==2){
            $article = $content->article;
            return view('std_viewer.std_subject.std_course.content.CT_text')->with('course',$course)->with('article',$article)->with('lessons',$course->lessons)->with('now_content',$content);
        }else{
            $quiz = $content->quiz;
            return view('std_viewer.std_subject.std_quiz.Quiz_dashboard')->with('course',$course)->with('quiz',$quiz);

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
