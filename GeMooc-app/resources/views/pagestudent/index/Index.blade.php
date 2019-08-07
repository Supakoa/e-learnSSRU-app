@extends('layouts.appLearning')

@section('index')
<nav>
    <div class="logo">
        <img src="{{url('images/logo.png')}}" alt="">
        <h5>SSRU</h5>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#">วิชา</a>
            <div class="li-underline"></div>
        </li>
        <li>
            <a href="#">คู่มือการใช้งาน</a>
            <div class="li-underline"></div>
        </li>
        <li>
            <a href="#">คำถาม</a>
            <div class="li-underline"></div>
        </li>
        <li class="dropdown" style="display:flex;padding-top: 0;">
            @if (auth()->user()->profile->image!=null)
                <img src="{{url('/storage/'.auth()->user()->profile->image) }}" id="imageProfile" alt="...">
            @else
                <img src="data:image/png;base64,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">
            @endif
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">แก้ไขโปรไฟล์</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">ออกจากระบบ</a>
            </div>
        </li>
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>
<div class="index-body"
    style="background-image: url('https://cdn.pixabay.com/photo/2015/03/26/09/40/forest-690075_960_720.jpg')">
    <div class="bg-blur"></div>
    <div class="index-content">
        <div class="container">
            <div class="your-course">
                <div class="your-course-header">
                    <p>กำลังเรียน...</p>
                </div>
                <div class="your-course-body">
                    <div class="container">
                        <div class="your-course-slide" style="color:#fff">
                            @php
                                $user = auth()->user();

                                $courses = $user->courses;

                            @endphp
                            @foreach ($courses as $course)
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
                            <div class="course_progress" course_id="{{$course->id}}" progress ="{{$sum_course}}">
                            <p>{{$course->name}}</p>
                                <img src="{{url('storage/'.$course->sm_banner)}}"
                                    height="150" width="150" class="rounded">
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="your-course-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="progress">
                                <div class="progress-bar" id ="progress_bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a id="btn_course" href="#"><button  >เริ่มคอร์ส</button></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="finish-course">
                <div class="finish-course-header">
                    <p>คอร์สที่เรียนสำเร็จ</p>
                </div>
                <div class="finish-course-body">
                    <div class="container">
                        <div class="your-course-slide" style="color:#fff">
                            <div>
                                <button>ผลลัพธ์</button>
                                <img src="https://images.unsplash.com/photo-1497316730643-415fac54a2af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                    height="150" width="150" class="rounded ">
                            </div>
                            <div>
                                <button>ผลลัพธ์</button>
                                <img src="https://images.unsplash.com/photo-1497316730643-415fac54a2af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                    height="150" width="150" class="rounded ">
                            </div>
                            <div>
                                <button>ผลลัพธ์</button>
                                <img src="https://images.unsplash.com/photo-1497316730643-415fac54a2af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                    height="150" width="150" class="rounded ">
                            </div>
                            <div>
                                <button>ผลลัพธ์</button>
                                <img src="https://images.unsplash.com/photo-1497316730643-415fac54a2af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                    height="150" width="150" class="rounded ">
                            </div>
                            <div>
                                <button>ผลลัพธ์</button>
                                <img src="https://images.unsplash.com/photo-1497316730643-415fac54a2af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                    height="150" width="150" class="rounded ">
                            </div>
                            <div>
                                <button>ผลลัพธ์</button>
                                <img src="https://images.unsplash.com/photo-1497316730643-415fac54a2af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                    height="150" width="150" class="rounded ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('.your-course-slide').slick({
        dots: true,
        infinite: false,
        respondTo: 'window',
        centerPadding:'60px',
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
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

    $('.course_progress').click(function (e) {
        e.preventDefault();
        id = $(this).attr('course_id')
        // alert(id)
        progress = $(this).attr('progress')
        // alert(progress)

        $('#progress_bar').css('width', progress+'%')
        $('#btn_course').attr('href','eiei/'+id)

    });
</script>
@endsection
