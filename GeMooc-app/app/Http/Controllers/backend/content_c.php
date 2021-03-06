<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\content as content;
use App\lesson as lesson;

use App\adjust as adjust;
use App\article as article;
use App\quiz as quiz;
use App\video as video;
use Illuminate\Http\Request;
use Validator;
class content_c extends Controller
{
    public function goto_content($id)
    {
        //
        return $id;
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
        // $this->validate($request,[
        //     'name' => 'required',
        //     'type' => 'required'
        // ]);
        $rules = array(
            'name' => 'required',
            'type' => 'required',
            'videoFile'  => 'max:3072000|mimes:mp4'
           );

           $error = Validator::make($request->all(), $rules);

           if($error->fails())
           {
            return response()->json(['errors' => $error->errors()->all()]);
           }

        // Create content
        $content = new content;
        $content->name = $request->input('name');
        $content->type = $request->input('type');
        $content->lesson_id = $request->input('lesson_id');
        $allcontent = lesson::find($request->input('lesson_id'));
        $content->order=$allcontent->contents->count();
        $content->save();

        if($content->type=='1'){
            $newVideo = new video;
            $newVideo->name = $request->name;
            $newVideo->type = $request->videoType;
            $newVideo->content_id = $content->id;

            if ($request->videoType == 'youtube') {
                $newVideo->data = $request->url;
            } else {
                $file = $request->file('videoFile');
                $filename = $file->getClientOriginalName();
                $path = public_path()."\storage"."\\"."videos";
                $file->move($path, $filename);

                $newVideo->data = '/storage/videos/'.$filename;
            }
            $newVideo->poster = '';
            $newVideo->save();
            $content->detail = $newVideo->id;
        }elseif($content->type=='2'){
            $article = new article;
            $article->rawdata = "กรุณาเพิ่มเนื้อหา";
            $article->content_id = $content->id;
            $article->save();
            $content->detail = $article->id;
        }else{
            $quiz = new quiz;
            $quiz->name = $request->input('name');
            $quiz->time= $request->input('time');
            $quiz->detail = $request->input('detail');
            // $quiz->status = 0;
            $quiz->content_id = $content->id;
            $quiz->save();
            $content->detail = $quiz->id;
        }
        // $content->user_id = auth()->user()->id;
        // $content->sm_banner = $fileNameToStore;
        // $content->subject_id = $request->input('sub_id');

        $content->save();
        $now = new adjust;
        $now->user_id = auth()->user()->id;
        $now->detail = "Create Content : ID ====> || ".$content->id." ||";
        $now->save();
        $output = array(
            'success' => 'successfully'
           );

           return response()->json($output);
        // dd($content->content_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = content::find($id);
        switch ($content->type) {
            case 1:
                return redirect('video/'.$content->detail);
                // return view('admin-teach.webapp.content.subject.courses.coursecontent.editor.Videocontent');
                break;
            case 2:
                return redirect('article/'.$content->detail);
                break;
            case 3:
                return redirect('quiz/'.$content->detail);
                break;
            default:

                break;
        }
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
        $content = content::find($id);
        $content->delete();
        return redirect()->back()->with('success', 'Content Deleted');
    }
    public function order_update(Request $request)
    {
        $i = 0 ;
        foreach($request->order as $order){
            $content =  content::find($order);
            $content->order = "".$i++;
            $content->save();
        }
        if($i==count($request->order)){
            return "Success";
        }else{
            return $request;
        }
    }
}
