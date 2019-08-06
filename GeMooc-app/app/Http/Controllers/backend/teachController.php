<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class teachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = DB::table('users')->where('type_user','teach')->get();
        $users = User::all()->where('type_user', 'teach');
        return view('admin-teach.webapp.content.teacher.Teach',compact('users'));
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
            'type_user' => 'teach',
            'password' => Hash::make($data['password']),
        ]);

        profile::create([
            'user_id' => $sekai->id,
        ]);

        // auth()->user()->create([
        //     'name' => $data(['username']),
        //     'type_user' => 'teach',
        //     'email' => $data(['email']),
        //     'username' => $data(['username']),
        //     'password' => Hash::make($data['password']),
        // ]);

        return redirect('/teach');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        $teachUser = User::find($request->id);
        // $user = DB::table('users')->where('id',$reques->id)->get();
        // return view('teach.modal.editTeach')->with('user',$teachUser);
        return view('admin-teach.webapp.content.teacher.modal.editTeach')->with('user',$teachUser);
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
        return redirect('/teach');
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

        return redirect('/teach');
    }
}
