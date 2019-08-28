<?php

namespace App\Http\Controllers;
use App\subject as subject;
use App\course as course;
use App\content as content;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\DB;
use App\record as record;

use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class Std_viewer extends Controller
{
    public function Std_home(){
        // old view
        // return view('std_viewer.std_home.index');
        // new view
        return view('pagestudent.index.home');
    }

    public function all_subject(){
        $subjects = subject::where('status','1')->get();

        return view('pagestudent.subject.allSubject')->with('subjects',$subjects);
    }

    public function show_subject(subject $subject){
        $courses = $subject->courses;
        return view('pagestudent.subject.infoSubject')->with('subject',$subject)->with('courses',$courses);
    }


    public function Std_course(course $course){
        $lessons = $course->lessons;
        return view('std_viewer.std_subject.std_course.Course')->with('course',$course)->with('lessons',$lessons);
    }
    public function course_enroll(course $course){
        $user = auth()->user();
        // dd($user->course($course)->count());
        if($user->type_user != 'student'){
            return redirect()->back();
        }elseif($user->course($course)->count()){
            return redirect()->back()->with('error','You Can\'t Do That !!');
        }else{
            //เพิ่มหน้าลงทะเบียนด้วย
            $user->courses()->attach($course);
            return "Enroll";
        }
    }

     public function show_content(content $content)
    {
        $course = $content->lesson->course;
        if( $content->type == 1 ){
            $record = record::where('content_id', $content->id)->where('user_id', auth()->user()->id)->first();
            $video = $content->video;
            if($record == null){
                return view('std_viewer.std_subject.std_course.content.CT_video')->with('course',$course)->with('lessons', $course->lessons)->with('now_content', $content)->with('video', $video);
            }else{
                return view('std_viewer.std_subject.std_course.content.CT_video')->with('course',$course)->with('lessons', $course->lessons)->with('now_content', $content)->with('record', $record)->with('video', $video);
            }
        }elseif( $content->type == 2 ){
            $article = $content->article;
            return view('pagestudent.subject.course.content.textContent')->with('course',$course)->with('article',$article)->with('lessons',$course->lessons)->with('now_content',$content);
        }else{
            $quiz = $content->quiz;
            $time = $quiz->time*60;
            session(['time'=>$time]);
            return view('pagestudent.subject.quiz.quiz')->with('course',$course)->with('quiz',$quiz);

        }
    }

    public function submit_quiz(content $content,Request $request){
        $course = $content->lesson->course;

        if($request->timeleft=="Wait..."){
                return redirect('/std_view/course/'.$course->id);
            }
            $user =auth()->user();
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
            $percent = (int)(($score/$questions->count())*100);
            $temp = $user->scores()->attach($quiz,['score'=>$score,'time'=>$request->timeleft]);
            if($user->progresse($content)->count()){
                if($user->progresse($content)->first()->pivot->percent < $percent){
                    $temp = $user->progresses()->detach($content);
                    $temp = $user->progresses()->save($content, ['percent'=>$percent]);
                    // dd($temp);
                }
            }else{
                $temp = $user->progresses()->save($content,['percent'=>$percent]);
            }


            return redirect('std_view/course/content/'.$content->id.'/dashboard');

    }
    public function submit_article(content $content,Request $request){
        $user =auth()->user();

        $temp = $user->progresses()->detach($content);
        $temp = $user->progresses()->save($content,['percent'=>100]);
        return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ');
    }
    public function show_dashboard(content $content)
    {
        $course = $content->lesson->course;
        if($content->type==1){
            return view('pagestudent.subject.course.content.videoContent')->with('lessons',$course->lessons)->with('now_content',$content);
        }elseif($content->type==2){
            $article = $content->article;
            return view('pagestudent.subject.course.content.textContent')->with('course',$course)->with('article',$article)->with('lessons',$course->lessons)->with('now_content',$content);
        }else{
            $quiz = $content->quiz;
            return view('pagestudent.subject.quiz.quizDashboard')->with('course',$course)->with('quiz',$quiz);

        }
    }


    public function Std_quiz(){
        return view('pagestudent.subject.quiz.quiz');
    }
    public function Std_quizDashboard(){
        return view('pagestudent.subject.quiz.quizDashboard');
    }
    public function Std_quizPreview(){
        return view('pagestudent.subject.quiz.quizPreview');
    }
    public function Std_payment(){
        return view('std_viewer.std_payment.Payment');
    }
}
