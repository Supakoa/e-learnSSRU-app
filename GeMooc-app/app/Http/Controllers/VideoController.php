<?php

namespace App\Http\Controllers;

use App\video as video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test');
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
        if($request->hasFile('videoSquare')){
            $file = $request->file('videoSquare');
            $filename = $file->getClientOriginalName();
            $path = public_path()."\storage"."\\"."videos";
            $file->move($path, $filename);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        $course = $video->content->lesson->course;
        return view('admin-teach.webapp.content.subject.courses.coursecontent.editor.Videocontent')->with('course', $course)->with('video', $video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, video $video)
    {
        $newData = $request->newUrl;
        $updateAt = $video->id;

        $thisVideo = video::find($updateAt);
        $thisVideo->data = $newData;
        $thisVideo->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        //
    }
}
