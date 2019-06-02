<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class student extends Controller
{
    public function Student(){
        $user = DB::table('users')->where('type_user','student')->get();
        return view('student.Student',compact('user'));
    }

    public function createStudent()
    {
        $data = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $sekai = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'type_user' => 'student',
            'password' => Hash::make($data['password']),
        ]);


        $user = DB::table('users')->where('type_user','student')->get();

        return view('teach.teach',compact('user'));

    }

    public function deleteStudent()
    {
        $data = 'a';

        $user = DB::table('users')->where('type_user','student')->get();

        dd($user);

        return view('teach.teach',compact('user'));
    }

}
