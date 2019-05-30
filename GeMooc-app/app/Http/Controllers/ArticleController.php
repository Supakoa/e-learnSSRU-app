<?php

namespace App\Http\Controllers;

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
        return view('article.show')->with('article', $article)->with('content',  $content);
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

        return  view('article.edit')->with('article', $article)->with('content',  $content);
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
        ]) ;


        // Create Post
        $article->rawdata = $request->input('rawdata');
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
