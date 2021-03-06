<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\article as article;
use App\content as content;

use Illuminate\Http\Request;

class ArticleController extends Controller
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
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        $content = content::where('detail',$article->id)->first();;
        // dd($content);
        $course = $content->lesson->course;

        return view('admin-teach.webapp.content.subject.courses.coursecontent.editor.Textcontent')->with('article', $article)->with('content',$content)->with('course',$course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        //
        $content = content::where('detail',$article->id)->first();;
        $course = $content->lesson->course;
        return  view('admin-teach.webapp.content.subject.courses.coursecontent.editor.text.Editor')->with('article', $article)->with('content',  $content)->with('course',$course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
        $this->validate($request,[
            'rawdata' => 'required',
            'name' => 'required',

        ]) ;


        // Create Post
        $article->rawdata = $request->input('rawdata');
        $content = $article->content;
        $content->name =$request->name;
        $content->save();
        // $post->detail = $request->input('detail');
        // $post->user_id = auth()->user()->id;
        // $post->sm_banner = $fileNameToStore;
        // $post->subject_id = $request->input('sub_id');

        $article->save();
        return redirect('/article/'.$article->id)->with('success', 'Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        //
    }
}
