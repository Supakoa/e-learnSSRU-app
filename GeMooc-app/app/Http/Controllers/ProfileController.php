<?php

namespace App\Http\Controllers;

use App\profile as profile;
use \App\User as user;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileDescription = auth()->user()->profile->description;
        $profileImage = auth()->user()->profile->image;

        $profileO = array(
            'description' => $profileDescription,
            'image' => $profileImage,
        );
        return view('admin-teach.webapp.content.profile.Profile')
                ->with('profile', json_encode($profileO));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile)
    {
        $validate = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'con_email' => 'required',
            'phone_number' => 'required',
        ]);

        // $d2 = request()->validate([
        //     'description' => 'required',
        // ]);
        if($validate['email']==$validate['con_email']){
            if($validate['email']!=auth()->user()->email){
                if(auth()->user()->isUniqueEmail($validate['email'])){
                    $user = auth()->user()->update([
                        'name' => $validate['name'],
                        'email' => $validate['email'],
                        'phone_number' => $validate['phone_number'],
                    ]);
                }else{
                    return redirect()->back()->with('error', 'อีเมลนี้ไม่สามารถใช้ได้.');

                }

            }else{
                $user = auth()->user()->update([
                    'name' => $validate['name'],
                    'phone_number' => $validate['phone_number'],
                ]);
            }


            // $b = auth()->user()->profile->update([
            //     'description' => $d2['description'],
            // ]);

            return redirect()->back()->with('success', 'แก้ไขข้อมูลสำเร็จ.');
        }else{
            return redirect()->back()->with('error', 'อีเมลไม่ตรงกัน.');
        }


    }

    public function updatePhoto(Request $request)
    {
        $data = request()->validate([
            'upload' => '',
        ]);

        if (request('upload'))
        {
            $imagePath = request('upload')->store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
        }

        auth()->user()->profile->update([
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'upload image profile successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}
