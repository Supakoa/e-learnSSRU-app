<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\lesson as lesson;
use App\course as course;
use App\content as content;
use App\adjust as adjust;

class lesson_c extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $this->validate($request,[
            'name' => 'required'
            // 'detail' => 'required'
            // 'cover_image' => 'image|nullable|max:10000'
            ]) ;


        // Create lesson
        $lesson = new lesson;
        $lesson->name = $request->input('name');
        $lesson->course_id = $request->input('course_id');
        // $lesson->detail = $request->input('detail');
        // $lesson->user_id = auth()->user()->id;
        // $lesson->sm_banner = $fileNameToStore;
        $lesson->save();
        $now = new adjust;
        $now->user_id = auth()->user()->id;
        $now->detail = "Create Lesson : ID ====> || ".$lesson->id." ||";
        $now->save();
        return redirect('/course/'.$request->input('course_id'))->with('success', 'Lesson Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required'
            ]) ;
        $lesson = lesson::find($id);
        $lesson->name = $request->input('name');
        $lesson->save();
        return redirect('/course/'.$request->input('course_id'))->with('success', 'Lesson Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = lesson::find($id);
        $course = $lesson->course;
        $lesson->delete();
        return redirect('/course/'.$course->id)->with('success', 'Lesson Deleted');

    }
}
