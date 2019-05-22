<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class maincontroller extends Controller
{
    function Login(){
        return view('Login');
    }
    function Home(){
        return view('admin');
    }
}
