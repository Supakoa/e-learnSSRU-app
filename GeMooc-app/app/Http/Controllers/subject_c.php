<?php

namespace App\Http\Controllers;
use App\course as course;
use App\subject as sub;
use App\adjust as adjust;

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
            'cover_image' => 'image|nullable|max:10000'
        ]) ;

        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('cover_image_subject/sm','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,225);
            $image->save();
            $fileNameToStore =  $imagePath;
        } else {
            $fileNameToStore =  'cover_image_subject/sm/no_image.jpg';
        }

        // Create subject
        $subject = new sub;
        $subject->name = $request->input('name');
        $subject->detail = $request->input('detail');
        // $subject->user_id = auth()->user()->id;
        $subject->sm_banner = $fileNameToStore;
        $subject->xl_banner = 'cover_image_subject/xl/no_image.jpg';
        // $subject->xl_banner = $fileNameToStore;
        $subject->save();
        $now = new adjust;
        $now->user_id = auth()->user()->id;
        $now->detail = "Create Subject : ID ====> || ".$subject->id." ||";
        $now->save();
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
            'cover_image_sm' => 'image|nullable|max:10000',
            'cover_image_xl' => 'image|nullable|max:10000'

        ]) ;

        $detail = '';
        // dd($request);
        $subject = sub::find($request->input('sub_id'));
        if($request->has('status')){
            $subject->status = $request->input('status');
        }else{
            $subject->status = 0;

        }
        if($request->hasFile('cover_image_xl')){
            $imagePath = request('cover_image_xl')->store('cover_image_subject/xl','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1600,600);
            $image->save();
            $detail .= '|XL_Banner : '.$subject->xl_banner.' ====> '.$imagePath.'|';
            $subject->xl_banner = $imagePath;

        }
        if($request->hasFile('cover_image_sm')){
            $imagePath = request('cover_image_sm')->store('cover_image_subject/sm','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,255);
            $image->save();
            $detail .= '|SM_Banner : '.$subject->sm_banner.' ====> '.$imagePath.'|';
            $subject->sm_banner = $imagePath;

        }

        // Create subject
        if( $subject->name != $request->input('name')){
            $detail .= '|Name : '.$subject->name.' ====> '.$request->input('name').'|';
        }
        $subject->name = $request->input('name');
        if( $subject->detail != $request->input('detail')){
            $detail .= '|Detail : '.$subject->detail.' ====> '.$request->input('detail').'|';
        }
        $subject->detail = $request->input('detail');
        // $subject->user_id = auth()->user()->id;

        $subject->save();
        if($detail != ''){
            $now = new adjust;
            $now->user_id = auth()->user()->id;
            $now->detail = 'Edit Subject ID ==> '.$subject->id.' |'.$detail;
            $now->save();
        }
        return redirect('/subject/'.$subject->id)->with('success', 'Subject Update');
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
        $subject = sub::find($id);
        $subject->delete();
        return redirect('/subject')->with('success', 'Subject Deleted');

    }

   public function modal_edit(Request $request)
   {
        $id = $request->id;
        $subject = sub::find($id);
        return view('subject.modal.edit')->with('sub', $subject);
   }
}
