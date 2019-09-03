@extends('pagestudent.index')
@section('title')
{{$course->name}} | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        @include('pagestudent.navs.navsLeft',[$lessons])
    </div>
    <div class="sectionContent">
        <div class="card">
            <div class="head-card">
                <p>{{$course->name}}</p>
            </div>
            <div class="card-body">
                    @if ($course->video!=null)
                    @php

                        function convertYoutube($string) {
                        return preg_replace(
                            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                            "https://www.youtube.com/embed/$2",
                            $string
                        );
                    }
                    $course_video =$course->video;
                    if($course->type_video!='file'){
                        $course_video = convertYoutube($course->video);
                    }
                    @endphp
                    <div class="sectionVideo">
                            <div class="container p-5">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{$course_video}}"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
