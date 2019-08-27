<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\newMail;
use Illuminate\Support\Facades\Mail;

use App\video as video;
use App\content as content;
use App\record as record;

// report
use App\report as report;

class test_sumernote extends Controller
{
    public function index()
    {
        $content = content::find(4);

        $record = record::where('content_id', $content->id)->where('user_id', auth()->user()->id)->first();
        $video = $content->video->first();

        if($record == null){
            return view('std_viewer.std_subject.std_course.content.CT_video')->with('now_content', $content)->with('video', $video);
        }else{
            return view('std_viewer.std_subject.std_course.content.CT_video')->with('now_content', $content)->with('video', $video)->with('record', $record);
        }

        // return view('test')->with('video', $video)->with('content', $content);
    }
}
