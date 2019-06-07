<?php

namespace App\Http\Controllers;
use App\course as course;
use App\lesson as lesson;
use App\adjust as adjust;

use App\content as content;
use App\user as user;



use Illuminate\Http\Request;
// use \Illuminate\Database\Eloquent\Collection as Collection;
use Intervention\Image\Facades\Image;

class course_c extends Controller
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
        return redirect('/subject');
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
            'name' => 'required',
            'detail' => 'required',
            'cover_image' => 'image|nullable|max:10000'
        ]) ;
        if($request->hasFile('cover_image')){
            $imagePath = request('cover_image')->store('cover_image_course/sm','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,225);
            $image->save();
            $fileNameToStore =  $imagePath;
        } else {
            $fileNameToStore =  'cover_image_course/sm/no_image.jpg';
        }

        // Create course
        $course = new course;
        $course->name = $request->input('name');
        $course->detail = $request->input('detail');
        // $course->user_id = auth()->user()->id;
        $course->sm_banner = $fileNameToStore;
        $course->xl_banner = 'cover_image_course/xl/no_image.jpg';
        $course->subject_id = $request->input('sub_id');

        $course->save();

        $now = new adjust;
        $now->user_id = auth()->user()->id;
        $now->detail = "Create Course : ID ====> || ".$course->id." ||";
        $now->save();
        return redirect('/subject/'.$request->input('sub_id'))->with('success', 'Course Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = course::findorfail($id);
        $course_name = $lesson;
        return view('course.show_course')->with('lessons', $lesson->lessons)->with('course', $course_name);
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
        $course = course::find($id);

        if($request->has('status')){
            $course->status = $request->input('status');
        }else{
            $course->status = 0;
        }

        if($request->hasFile('cover_image_xl')){
            $imagePath = request('cover_image_xl')->store('cover_image_course/xl','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1600,600);
            $image->save();
            $detail .= '|XL_Banner : '.$course->xl_banner.' ====> '.$imagePath.'|';
            $fileNameToStore =  $imagePath;
            $course->xl_banner = $fileNameToStore;

        }
        if($request->hasFile('cover_image_sm')){
            $imagePath = request('cover_image_sm')->store('cover_image_course/sm','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,255);
            $image->save();
            $detail .= '|SM_Banner : '.$course->sm_banner.' ====> '.$imagePath.'|';
            $fileNameToStore =  $imagePath;
            $course->sm_banner = $fileNameToStore;

        }

        // Create course
        if( $course->name != $request->input('name')){
            $detail .= '|Name : '.$course->name.' ====> '.$request->input('name').'|';
        }
        $course->name = $request->input('name');
        if( $course->detail != $request->input('detail')){
            $detail .= '|Detail : '.$course->detail.' ====> '.$request->input('detail').'|';
        }
        $course->detail = $request->input('detail');
        // $course->user_id = auth()->user()->id;
        // $course->sm_banner = $fileNameToStore;
        // $course->course_id = $request->input('sub_id');

        $course->save();
        if($detail != ''){
            $now = new adjust;
            $now->user_id = auth()->user()->id;
            $now->detail = 'Edit Course ID ==> '.$course->id.' |'.$detail;
            $now->save();
        }
        return redirect('/course/'.$id)->with('success', 'Course Updated');
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
        $course = course::find($id);
        $subject = $course->subject;
        $course->delete();
        return redirect('/subject/'.$subject->id)->with('success', 'Course Deleted');
    }
    public function modal_edit(Request $request)
    {
         $id = $request->id;
         $course = course::find($id);

         return view('course.modal.edit')->with('course', $course);
    }
    public function users(course $course)
    {

        // $user_teacher = user::whereDoesntHave('courses')->orWhereHas('courses', function ($query) use ($course) {
        //     // dd($query->get);
        //     $query->where('course_id', '!=', $course->id)->where('user_id', '!=', $query->user.id);
        // })->get();
        $user_teacher = $course->not_users();
        // dd( $user_teacher);
        $user_teacher = $user_teacher->where('type_user','teach');
       $course_user =  $course->users;
       $teachers = $course_user->where('type_user','teach');
       $students= $course_user->where('type_user','student');
         return view('course.users')->with('teachers',$teachers)->with('students',$students)->with('users',$user_teacher)->with('course',$course);
    }

    public function add_user(course $course,Request $request){
        $course->users()->attach($request->user,['role'=>1]);
        return redirect('/course/'.$course->id.'/users')->with('success', 'Add Success');


    }
    public function delete_user(course $course,Request $request)
    {
        $course->users()->detach($request->user);
        return redirect('/course/'.$course->id.'/users')->with('success', 'Delete Success');
    }
    public function update_role(course $course,Request $request)
    {
        $course->users()->attach($request->user);
        return redirect('/course/'.$course->id.'/users')->with('success', 'Delete Success');
    }
}
