<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\newMail;
use Illuminate\Support\Facades\Mail;

use App\video as video;
use App\content as content;

// report
use App\report as report;

class test_sumernote extends Controller
{
    public function index()
    {
        $videos = video::first();
        return view('test')->with('videos', $videos);
    }
}
