<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
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
        $adminOnly = auth()->user()->type_user == 'admin';
        $teacherOnly = auth()->user()->type_user == 'teach';
        if($adminOnly){
            $sub = sub::all();
        }elseif($teacherOnly){
            $sub = collect();
            $courses = auth()->user()->courses;
            foreach ($courses as $course) {
                $subject = $course->subject;
                $sub = $sub->push($subject);
            }
        }
        return view('admin-teach.webapp.content.subject.Subject')->with('subjects', $sub);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // //
        // $sub = sub::all();

        // return view('subject.create')->with('sub', $sub);
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
            'cover_image' => 'image|nullable|max:10000',
            'videoFile' => 'max:204800|mimes:mp4|',
        ]) ;
            // dd($request->File('cover_image'));
        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('cover_image_subject','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $fileNameToStore =  $imagePath;
        } else {
            $fileNameToStore =  'cover_image_subject/no_image.jpg';
        }

        // Create subject
        $subject = new sub;
        $subject->name = $request->input('name');
        $subject->detail = $request->input('detail');
        // $subject->user_id = auth()->user()->id;
        $subject->image = $fileNameToStore;

        if($request->hasFile('videoFile')){
            if ($request->videoType == 'youtube') {
                $subject->video = $request->url;
                $subject->type_video = 'youtube';
            } else {
                $file = $request->file('videoFile');
                $filename = $file->getClientOriginalName();
                $path = public_path()."\storage"."\\"."videos";
                $file->move($path, $filename);

                $subject->video = '/storage/videos/'.$filename;
                $subject->type_video = 'file';
            }
        }
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
        $subject = sub::find($id);
        $adminOnly = auth()->user()->type_user == 'admin';
        $teacherOnly = auth()->user()->type_user == 'teach';
        if($adminOnly){
            $courses = $subject->courses;
        }elseif($teacherOnly){

                $courses_user = auth()->user()->courses;
                $courses_subject = $subject->courses;

                $sum = $courses_subject->intersect($courses_user);

            if($sum->count()==0){
                return redirect('/subject')->with('error', 'Noooooo');
            }else{
                $courses = auth()->user()->courses;
            }
        }

        return view('admin-teach.webapp.content.subject.courses.Course')->with('courses', $courses)->with('subject', $subject);
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
            'cover_image' => 'image|nullable|max:10000'
        ]) ;

        $detail = '';
        // dd($request);
        $subject = sub::find($request->input('sub_id'));

        if($request->has('status')){
            $subject->status = $request->input('status');
        }else{
            $subject->status = 0;
        }

        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('cover_image_subject','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $detail .= '|cover_image : '.$subject->image.' ====> '.$imagePath.'|';
            $subject->image = $imagePath;

        }
        if($request->hasFile('videoFile')){
            if ($request->videoType == 'youtube') {
                $subject->video = $request->url;
                $subject->type_video = 'youtube';
            } else {
                $file = $request->file('videoFile');
                $filename = $file->getClientOriginalName();
                $path = public_path()."\storage"."\\"."videos";
                $file->move($path, $filename);

                $subject->video = '/storage/videos/'.$filename;
                $subject->type_video = 'file';
            }
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
        return redirect()->back()->with('success', 'Subject Update');
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
        return view('admin-teach.webapp.content.subject.modal.edit')->with('sub', $subject);
   }
}
