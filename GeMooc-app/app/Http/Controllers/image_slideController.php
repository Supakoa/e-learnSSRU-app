<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class image_slideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq =  DB::table('image_slides')->where('type', 'faq')->get();
        $news = DB::table('image_slides')->where('type', 'news')->get();
        return view('admin-teach.webapp.content.image_slide.image_slide')->with('faq',$faq)->with('news',$news);
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
            'type' => 'required',
            'image' => 'image|nullable|max:10000',
        ]) ;

        $imagePath = request('image')->store('image_slides','public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();
        $url = null;
        if($request->has('url')){
            $url = request('url');
        }
        DB::table('image_slides')->insert([
            'image' => 'storage/'.$imagePath,
            'type' =>request('type'),
            'url'=>$url
        ]);

        return redirect()->back()->with('success', 'อัพโหลดรูปภาพสำเร็จ.');
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
