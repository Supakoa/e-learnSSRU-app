<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class teach extends Controller
{
    public function Teach()
    {
        $user = DB::table('users')->where('type_user','teach')->get();
        return view('teach.teach',compact('user'));
    }

    /**
     * @param  array  $data
     * @return \App\User
     */
    public function createTeach()
    {
        $data = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $sekai = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'type_user' => 'teach',
            'password' => Hash::make($data['password']),
        ]);

        // auth()->user()->create([
        //     'name' => $data(['username']),
        //     'type_user' => 'teach',
        //     'email' => $data(['email']),
        //     'username' => $data(['username']),
        //     'password' => Hash::make($data['password']),
        // ]);

        $user = DB::table('users')->where('type_user','teach')->get();

        return view('teach.teach',compact('user'));
    }

}
