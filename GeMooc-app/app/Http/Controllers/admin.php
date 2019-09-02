<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('type_user', 'admin');
        return view('admin-teach.webapp.content.admin.Admin',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = request()->validate([
            'name' => 'required',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'email' => 'required|required_with:confirmEmail|same:confirmEmail',
        ]);

        $sekai = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type_user' => 'admin',
            'password' => Hash::make($data['password']),
        ]);

        profile::create([
            'user_id' => $sekai->id,
        ]);

        return redirect('/admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'email' => 'required|required_with:confirmEmail|same:confirmEmail',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type_user' => 'admin',
            'gender' => $data['gender'],
            'phone_number' => $data['phoneNumber'],
            'password' => Hash::make($data['password']),
        ]);

        profile::create([
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'เพิ่มข้อมูลผู้ใช้สำเร็จ.');
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
        return view('admin-teach.webapp.content.admin.modal.editAdmin')->with('user',$user);
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
            'name' => 'required',
            // 'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'email' => 'required|required_with:confirmEmail|same:confirmEmail',
        ]);
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        return redirect()->back()->with('success', 'แก้ไขข้อมูลผู้ใช้สำเร็จ.');
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

        return redirect()->back()->with('success', 'ลบข้อมูลผู้ใช้สำเร็จ.');
    }
}
