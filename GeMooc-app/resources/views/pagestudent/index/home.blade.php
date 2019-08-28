@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/homeIndex.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/slick/slick/slick.css')}}">
<link rel="stylesheet" href="{{asset('node_modules/slick/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEProgress.css')}}">
@endpush

@push('js')
<script src="{{ asset('node_modules/slick/slick/jq-migrate.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.yourCourse').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
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
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
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
    });


    $('.course_progress').click(function (e) {
        e.preventDefault();
        id = $(this).attr('course_id')
        // alert(id)
        progress = $(this).attr('progress')
        // alert(progress)

        $('#progress_bar').css('width', progress + '%')
        $('#btn_course').attr('href', 'eiei/' + id)

    });

</script>

@endpush

@section('mainContent')
<div class="container">
    <h3 class="m-5 text-center">กำลังเรียน...</h3>
    <div class="section1">
        <div class="row">
            <div class="col-md-12 p-5">
                <div class="yourCourse p-3">
                    @foreach (auth()->user()->courses as $course)
                        <div class="m-5">
                            <img class="my_course" src="{{url('storage/'.$course->image)}}" alt="" width="100%" height="100%" >
                        </div>
                    @endforeach

                    {{-- <div>your content</div>
                    <div>your content</div>
                    <div>your content</div>
                    <div>your content</div>
                    <div>your content</div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="progress">
                    <div class="progress-bar" id="progress_bar" role="progressbar" style="width: 25%;"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%"
                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
            </div>
            <div class="col-md-2">
                <button>เริ่มคอร์ส</button>
            </div>
        </div>
    </div>

    <h3 class="m-5 text-center">คอร์สที่เรียนสำเร็จ</h3>
    <div class="section2">
        <div class="row">
            <div class="col-md-12 p-5">
                    <div class="courseFinish p-3">
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                            <div>your content</div>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
