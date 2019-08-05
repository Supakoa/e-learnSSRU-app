<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\newMail;
use Illuminate\Support\Facades\Mail;

class test_sumernote extends Controller
{
    public function index()
    {
        return view('admin-teach.webapp.login.LoginAT');
    }

}
