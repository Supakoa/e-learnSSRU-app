<?php

namespace App\Http\Controllers;
use App\course as course;
use App\subject as sub;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class subject_c extends Controller
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
        $sub = sub::all();
        // $sub = ["123","456"];
        // dd($sub);
        return view('subject.all_sub')->with('sub', $sub);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sub = sub::all();

        return view('subject.create')->with('sub', $sub);
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
            'name' => 'required',
            'detail' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]) ;

        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('cover_image_subject/sm','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,225);
            $image->save();
            $fileNameToStore =  $imagePath;
        } else {
            $fileNameToStore =  'cover_image_subject/sm/no_image.jpg';
        }

        // Create Post
        $post = new sub;
        $post->name = $request->input('name');
        $post->detail = $request->input('detail');
        // $post->user_id = auth()->user()->id;
        $post->sm_banner = $fileNameToStore;
        $post->xl_banner = 'cover_image_subject/xl/no_image.jpg';
        // $post->xl_banner = $fileNameToStore;
        $post->save();
        return redirect('/subject')->with('success', 'Subject Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = sub::find($id);
        $sub = $course;
        // dd($sub) ;
        return view('subject.show_sub')->with('courses', $course->courses)->with('sub', $sub);
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
            'name' => 'required',
            'detail' => 'required',
            'cover_image_sm' => 'image|nullable|max:1999',
            'cover_image_xl' => 'image|nullable|max:1999'

        ]) ;
        $post = sub::find($request->input('sub_id'));
        if($request->hasFile('cover_image_xl')){
            $imagePath = request('cover_image_xl')->store('cover_image_subject/xl','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1600,600);
            $image->save();
            $fileNameToStore =  $imagePath;
            $post->xl_banner = $fileNameToStore;

        }
        if($request->hasFile('cover_image_sm')){
            $imagePath = request('cover_image_sm')->store('cover_image_subject/sm','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,255);
            $image->save();
            $fileNameToStore =  $imagePath;
            $post->sm_banner = $fileNameToStore;

        }

        // Create Post

        $post->name = $request->input('name');
        $post->detail = $request->input('detail');
        // $post->user_id = auth()->user()->id;

        $post->save();
        return redirect('/subject')->with('success', 'Subject Update');
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
