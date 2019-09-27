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
    <h3 class="m-5 text-center">กำลังเรียน...</h3>
    <div class="section1">
        <div class="row">
            <div class="col-md-12 p-5">



                @php
                $user = auth()->user();
                $courses = auth()->user()->courses;
                $percent = auth()->user()->progresses;
                @endphp
                @if ($courses->count() == 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    คุณยังไม่มีคอร์สเรียนในคณะนี้. <strong><a href="{{url('std_view/subject')}}">คลิกที่นี่ !</a></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @else
                <div class="yourCourse p-3">
                    @foreach (auth()->user()->courses as $course)
                    @php
                    $sum_course = 0;
                    $sum_lesson = 0;
                    $n_lessons = $course->lessons->count();
                    if($n_lessons){
                    foreach($course->lessons as $lesson){
                    $sum_progress = 0;
                    $n_contents = $lesson->contents->count();
                    if($n_contents){
                    foreach ($lesson->contents as $key=>$content) {
                    $progress = $content->progress_user($user->id)->orderBy('progresses.created_at','desc');
                    if($pro = $progress->first()){
                    if($pro = $pro->pivot->percent){
                    $sum_progress += $pro;
                    }else{
                    $sum_progress += 0;
                    }
                    }else{
                    $sum_progress += 0;
                    }
                    }
                    $sum_lesson += $sum_progress/$n_contents ;
                    }else{
                    $sum_lesson +=100;
                    }
                    }
                    $sum_course = $sum_lesson/$n_lessons;
                    }else{
                    $sum_course =0;
                    }

                    @endphp
                    <div class="my_course" onclick="my_course($(this))"
                        course_link="{{url('std_view/course/'.$course->id)}}" course_progress="{{$sum_course}}"
                        course_name="{{$course->name}}">
                        <p class="text-center">{{$course->name}}</p>
                        <img class="m-auto" src="{{url('storage/'.$course->image)}}" alt="" width="100%" height="100%">
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
        <h2 id="course_name" style="color:white"></h2>
        <div class="row progress-now">
            <div class="col-md-10 m-1">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar"
                        role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a class="btn btn-success" id="btn_to_course" href="#">เริ่มคอร์ส</a>
            </div>
        </div>
    </div>

    <h3 class="m-5 text-center">คอร์สที่เรียนสำเร็จ</h3>
    <div class="section2">
        <div class="row">
            <div class="col-md-12 p-5">
                        @if ($courses->count() == 0)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                คุณยังไม่มีคอร์สที่เรียนสำเร็จในคณะนี้.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @else
                        <div class="courseFinish p-3">

                        </div>
                        @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('.progress-now').hide();

    function my_course(my_course) {
        $('.progress-now').show();
        $('#btn_to_course').attr('href', my_course.attr('course_link'));
        $('#course_name').html(my_course.attr('course_name'));
        // $("#progress-bar").css('width', my_course.attr('course_progress')+'%');
        // alert(my_course.attr('course_progress')+'%')
        $("#progress_bar").css('width', my_course.attr('course_progress') + '%');
        $("#progress_bar").html(my_course.attr('course_progress') + '%')
    }

</script>
@endpush
