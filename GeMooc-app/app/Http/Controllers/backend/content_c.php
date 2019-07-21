<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\content as content;
use App\adjust as adjust;
use App\article as article;
use App\quiz as quiz;
use Illuminate\Http\Request;

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
        $this->validate($request,[
            'name' => 'required',
            'type' => 'required'
        ]) ;

        // Create content
        $content = new content;
        $content->name = $request->input('name');
        $content->type = $request->input('type');
        $content->lesson_id = $request->input('lesson_id');
        $content->save();
        if($content->type=='1'){
            $content->detail = $request->input('url');
        }elseif($content->type=='2'){
            $article = new article;
            $article->rawdata = "กรุณาเพิ่มเนื้อหา";
            $article->content_id = $content->id;
            $article->save();
            $content->detail = $article->id;
        }else{
            $quiz = new quiz;
            $quiz->name = $request->input('name');
            $quiz->detail = 'กรุณาใส่รายละเอียด.';
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
        return redirect('/course/'.$request->input('course_id'))->with('success', 'Content Created');
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
                // return redirect('video/'.$content->detail);
                return view('admin-teach.webapp.content.subject.courses.coursecontent.editor.Videocontent');
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
}
