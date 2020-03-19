@extends('pagestudent.Index')

@section('background')
{{url('storage/'.$subject->image)}}\
@endsection

@section('title')
{{$subject->name}} | MOOC SSRU
@endsection

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/subject_info.css')}}">
@endpush
{{-- {{dd($subject->video)}} --}}
@section('mainContent')
@if ($subject->video!=null)
@php

    function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "https://www.youtube.com/embed/$2",
        $string
    );
}
$subject_video =$subject->video;
if($subject->type_video!='file'){
    $subject_video = convertYoutube($subject->video);
}
@endphp
<div class="sectionVideo">
        <div class="container p-5">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$subject_video}}"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endif


<div class="sectionTable">
    <div class="container-fluid p-5">
            @if ($subject->courses->where('status','1')->count())
            @foreach ($subject->courses->where('status','1') as $course)
            <div class="row">
                <div class="col-md-4">
                    <img class=" rounded" src="{{url('storage/'.$course->image)}}" alt="" width="100%" height="auto">
                </div>
                <div class="col-md-8 table-responsive p-2">
                    <table class="bg-light table rounded table-striped">
                        <thead>
                            <tr>
                                <th colspan="3" style="font-size:26px">ข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="border-right pl-4">ชื่อคอร์ส</th>
                                <td>{{$course->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="border-right pl-4">บทเรียน</th>
                                <td>{{$course->lessons->count()}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="border-right pl-4">เกณฑ์การผ่าน</th>
                                <td>ต้องมีคะแนนไม่ต่ำกว่าร้อยละ 80</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
            <div class="p-3">
                <div class="text-center">
                    <a href="{{url('std_view/course/'.$course->id)}}" class="btn btn-success">ไปที่คอร์ส</a>
                </div>
                @else
                <div class="alert alert-warning" role="alert">
                    ไม่มีคอสที่เปิดสอน
                </div>
                @endif
            </div>

    </div>
</div>
<div class="sectionInfo">
    <div class="container-fluid p-5">
        <h4>รายละเอียดเกี่ยวกับรายวิชา</h4>
        <dl class="row">
            <dd class="col-md-12">
                <p class=" text-justify">{{$subject->detail}}</p>
            </dd>
        </dl>
        <hr>
        <h4>ผู้สอน</h4>
        <div class="row">
            @php
            $users = collect();
            $union = collect();
            foreach($courses as $course){
                foreach($course->users_main as $user){
                    $temp = collect();
                    $temp->push($user->profile->only(['image']));
                    $temp->push($user->only(['name']));
                    $users->prepend($temp->flatten());
                }
            }

            $users = $users->unique();

            @endphp
            @foreach ($users as $key => $user)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="p-4 text-center">
                    <img class="m-auto bg-success rounded-circle" width="200" height="200"
                        src="{{url('storage/'.$user->first())}}" alt="">
                    <h5 class="m-auto">{{$user->last()}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('node_modules/CEFstyle/subject/info/index.js')}}"></script>
@endpush
