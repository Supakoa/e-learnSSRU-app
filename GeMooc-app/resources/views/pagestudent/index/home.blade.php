@extends('pagestudent.Index')
@section('title')
คอร์สของฉัน | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{asset('node_modules/CEFstyle/cssStudent/homeIndex.css')}}">
<link rel="stylesheet" href="{{asset('node_modules/slick/slick/slick.css')}}">
<link rel="stylesheet" href="{{asset('node_modules/slick/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{asset('node_modules/CEFstyle/CEProgress.css')}}">
@endpush

@push('js')
<script src="{{ asset('node_modules/slick/slick/jq-migrate.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.yourCourse').slick({
            lazyLoad: 'ondemand',
            dots: true,
            infinite: true,
            centerPadding: '60px',
            slidesToShow: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $('.courseFinish').slick({
            dots: true,
            lazyLoad: 'ondemand',
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });

</script>
@endpush

@section('mainContent')
<div class="container">
    <h3 class="m-2 text-center">กำลังเรียน...</h3>
    <div class="section1">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @php
                $user = auth()->user();
                $coursesFinish= auth()->user()->courses()->wherePivot("status",1)->get();
                $coursesUnFinish = auth()->user()->courses()->wherePivot("status",0)->get();
                $percent = auth()->user()->progresses;
                @endphp
                @if ($coursesUnFinish->count() == 0)
                <div class="alert alert-danger text-light fade show" style="letter-spacing:2px;" role="alert">
                    คุณยังไม่มีคอร์สเรียนในคณะนี้. <strong><a href="{{url('std_view/subject')}}">คลิกที่นี่
                            !</a></strong>
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                @else
                <div class="yourCourse p-1">
                    @foreach ($coursesUnFinish as $course)
                    <div class="my_course" onclick="my_course_unfinish($(this))"
                        course_link="{{url('std_view/course/'.$course->id)}}"
                        course_progress="{{$course->pivot->percent}}" course_name="{{$course->name}}">
                        <p class="text-center">{{$course->name}}</p>
                        <img class="m-auto" src="{{url('storage/'.$course->image)}}" alt="" width="100%" height="100%">
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
        <h2 id="course_name-unfinish" style="color:white"></h2>
        <div class="row progress-now-unfinish">
            <div class="col-md-9 m-1">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar-unfinish"
                        role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a class="btn btn-success" id="btn_to_course" href="#">เริ่มคอร์ส</a>
            </div>
        </div>
    </div>

    <h3 class="m-2 text-center">คอร์สที่เรียนสำเร็จ</h3>
    <div class="section2">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @if ($coursesFinish->count() == 0)
                <div class="alert alert-warning text-light alert-dismissible fade show" style="letter-spacing:2px;"  role="alert">
                    คุณยังไม่มีคอร์สที่เรียนสำเร็จในคณะนี้.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @else
                <div class="courseFinish">
                    @foreach ($coursesFinish as $course)
                    <div class="my_course" onclick="my_course_finish($(this))"
                        course_link="{{url('std_view/course/'.$course->id)}}"
                        course_progress="{{$course->pivot->percent}}" course_name="{{$course->name}}">
                        <p class="text-center">{{$course->name}}</p>
                        <img class="m-auto" src="{{url('storage/'.$course->image)}}" alt="" width="100%" height="100%">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

        </div>
        <h2 id="course_name-finish" style="color:white"></h2>
        <div class="row progress-now-finish">
            <div class="col-sm-8 col-md-10 col-lg-10">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar-finish"
                        role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-2 col-lg-2">
                <a class="btn btn-success" id="btn_to_course" href="#">เริ่มคอร์ส</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('.progress-now-unfinish').hide();

    function my_course_unfinish(my_course) {
        $('.progress-now-unfinish').show();
        $('#btn_to_course').attr('href', my_course.attr('course_link'));
        $('#course_name-unfinish').html(my_course.attr('course_name'));
        $("#progress_bar-unfinish").css('width', my_course.attr('course_progress') + '%');
        $("#progress_bar-unfinish").html(my_course.attr('course_progress') + '%')
    }

    $('.progress-now-finish').hide();

    function my_course_finish(my_course) {
        $('.progress-now-finish').show();
        $('#btn_to_course').attr('href', my_course.attr('course_link'));
        $('#course_name-finish').html(my_course.attr('course_name'));
        $("#progress_bar-finish").css('width', my_course.attr('course_progress') + '%');
        $("#progress_bar-finish").html(my_course.attr('course_progress') + '%')
    }

</script>
@endpush
