<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lesson as lesson;
use App\course as course;
use App\content as content;

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
            // 'cover_image' => 'image|nullable|max:1999'
            ]) ;


        // Create Post
        $post = new lesson;
        $post->name = $request->input('name');
        $post->course_id = $request->input('course_id');
        // $post->detail = $request->input('detail');
        // $post->user_id = auth()->user()->id;
        // $post->sm_banner = $fileNameToStore;
        $post->save();
        return redirect('/course/'.$request->input('course_id'))->with('success', 'Subject Created');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
