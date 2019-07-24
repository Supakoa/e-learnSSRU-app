<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->where('type_user','student')->get();
        return view('admin-teach.webapp.content.student.Student',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        profile::create([
            'user_id' => $sekai->id,
        ]);

        return redirect('/student');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('student.modal.editStudent')->with('user',$user);
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
        $data = request()->validate([
            'username' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->save();
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $result = DB::table('users')->where('id', '=', $id)->delete();

        return redirect('/student');
    }
}
