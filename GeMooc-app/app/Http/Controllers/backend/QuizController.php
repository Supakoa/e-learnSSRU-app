<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Exports\quizExport;
use App\Imports\QuizImport;

use Maatwebsite\Excel\Facades\Excel;

use App\quiz;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(quiz $quiz)
    {
        $course = $quiz->content->lesson->course;
        return view('admin-teach.webapp.content.subject.courses.coursecontent.editor.Quizcontent')->with('quiz', $quiz)->with('course', $course);;
        // return view('quiz.show')->with('quiz', $quiz);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quiz $quiz)
    {
        $this->validate($request,[
            'name' => 'required',
            'time' => 'required',
            'detail' => 'required',
            'cover_image' => 'image|nullable|max:10000'

        ]);
        $quiz->name = $request->name;
        $quiz->time = $request->time;
        $quiz->detail = $request->detail;
        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('quiz_img','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500,250);
            // dd($image);
            $image->save();

            $quiz->image =  $imagePath;
            // dd($quiz->image);
        }
        $quiz->save();
        return redirect('/quiz/'.$quiz->id)->with('success', 'Quiz Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(quiz $quiz)
    {
        //
    }

    public function quiz_dashboard(quiz $quiz)
    {
        $course = $quiz->content->lesson->course;
        // dd( $course );
       return view('admin-teach.webapp.content.subject.courses.coursecontent.editor.dashboard.DashboardQuiz')->with('quiz', $quiz)->with('course', $course);;

    }

    public function export($id)
    {
        $quiz = quiz::find($id);
        return (new quizExport($id))->download($quiz->name.'.xlsx');
    }

    public function import($id,Request $request)
    {
        // dd($request->file('import'));
        Excel::import(new QuizImport($id),$request->file('import'), \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->back()->with('success', 'All good!');
    }
}
