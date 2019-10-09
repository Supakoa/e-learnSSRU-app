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
        $user = auth()->user();
        foreach(auth()->user()->courses as $course){
            $sum_course = 0;
            $sum_lesson = 0;
            $n_lessons = $course->lessons->count();
            if($n_lessons){
                foreach($course->lessons as $lesson){
                    $sum_progress = 0;
                    $n_contents = $lesson->contents->count();
                    if($n_contents){
                        foreach ($lesson->contents as $key=>$content) {
                            $progress = $content->progress_user($user->id)->orderBy('progresses.created_at','desc');
                            if($pro = $progress->first()){
                                if($pro = $pro->pivot->percent){
                                    $sum_progress += $pro;
                                }else{
                                    $sum_progress += 0;
                                }
                            }else{
                                $sum_progress += 0;
                            }
                        }
                        $sum_lesson += $sum_progress/$n_contents ;
                    }else{
                        $sum_lesson +=100;
                    }
                }
                $sum_course = $sum_lesson/$n_lessons;
            }else{
                $sum_course =0;
            }
            $user->courses()->detach($course);
            if($sum_course>=80){
                $user->courses()->save($course,['percent'=>$sum_course,'status'=>1]);
            }else{
                $user->courses()->save($course,['percent'=>$sum_course]);
            }

        }

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
        return view('pagestudent.subject.course.content.indexContent')->with('course',$course)->with('lessons',$lessons);
    }
    public function course_enroll(course $course){
        $user = auth()->user();
        // dd($user->type_user);
        if($user->type_user != 'student'){
            return redirect()->back();
        }elseif($user->course($course)->count()){
            return redirect()->back()->with('error','You Can\'t Do That !!');
        }else{
            //เพิ่มหน้าลงทะเบียนด้วย
            $user->courses()->attach($course);
            return redirect()->back()->with('success','Enroll !!');

        }
    }

     public function show_content(content $content)
    {
        $course = $content->lesson->course;
        if(auth()->user()->course($course)->get()->isEmpty()){
            return redirect()->back()->with('error','Please Enroll Course');
        }
        if( $content->type == 1 ){
            $record = record::where('content_id', $content->id)->where('user_id', auth()->user()->id)->first();
            $video = $content->video;

            // split val to send important val
            $contentId = $content->id;
            $contentName = $content->name;
            $contentDetail = $content->detail;

            $contentO = array(
                'id' => $contentId,
                'name' => $contentName,
                'detail' => $contentDetail,
            );

            $videoType = $video->type;
            $videoData = $video->data;
            $videoName = $video->name;

            $videoO = array(
                'type' => $videoType,
                'data' => $videoData,
                'name' => $videoName,
            );

            $userId = auth()->user()->id;

            $issetRecord = ($record != null);

            if(!$issetRecord){

                // create new
                $newRecord = new record();
                $newRecord->content_id = $contentId;
                $newRecord->user_id = auth()->user()->id;
                $newRecord->record = json_encode(array());
                $newRecord->percent = '0';
                $newRecord->save();

                $recordContentId = $newRecord->content_id;
                $recordRecord = $newRecord->record;
                $recordPercent = $newRecord->percent;
            }else{
                $recordContentId = $record->content_id;
                $recordRecord = $record->record;
                $recordPercent = $record->percent;
            }

            $recordO = array(
                'contentId' => $recordContentId,
                'record' => $recordRecord,
                'percent' => $recordPercent,
            );

            // path view video
            $view = 'pagestudent.subject.course.content.videoContent';

            return view($view)
                    ->with('content' ,json_encode($contentO))
                    ->with('video' ,json_encode($videoO))
                    ->with('userId', json_encode($userId))
                    ->with('issetRecord', json_encode($issetRecord))
                    ->with('record', json_encode($recordO))
                    ->with('now_content', $content)
                    ->with('lessons', $course->lessons)
                    ->with('course', $course);

        }elseif( $content->type == 2 ){
            $article = $content->article;
            return view('pagestudent.subject.course.content.textContent')->with('course',$course)->with('article',$article)->with('lessons',$course->lessons)->with('now_content',$content);
        }else{
            $quiz = $content->quiz;
            $time = $quiz->time*60;
            session(['time'=>$time]);
            return view('pagestudent.subject.course.quiz.quiz')->with('course',$course)->with('quiz',$quiz)->with('lessons',$course->lessons);

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
            return view('pagestudent.subject.course.quiz.quizDashboard')->with('course',$course)->with('quiz',$quiz)->with('lessons',$course->lessons);

        }
    }


    public function Std_quiz(){
        return view('pagestudent.subject.quiz.quiz');
    }
    public function Std_quizDashboard(){
        return view('pagestudent.subject.course.quiz.quizDashboard');
    }
    public function Std_quizPreview(){
        return view('pagestudent.subject.course.quiz.quizPreview');
    }
    public function Std_payment(){
        return view('std_viewer.std_payment.Payment');
    }
    public function manual(){
        $manual = DB::table('guidebooks')->get();
        return view('pagestudent.toolLearn.toolLearn')->with('manuals',$manual);;
    }
    public function FAQ(){
        $faq =  DB::table('image_slides')->where('type', 'faq')->get();
        return view('pagestudent.FAQ.FAQ')->with('faqs',$faq);
    }
}
