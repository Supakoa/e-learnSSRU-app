<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myProfile(){
        return view('admin-teach.yourprofile.Yourprofile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(auth()->user());
        if(auth()->user()->type_user == 'student'){
            return view('std_viewer.std_home.index');

        }
        return view('dashboard.home');
    }
}
