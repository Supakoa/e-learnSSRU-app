@extends('layouts.appLearning')

@section('login')
@include('pagestudent.navs.Navs_login')
{{-- ลืมรหัสผ่าน --}}
@include('pagestudent.login.Forget')
{{-- ลืมรหัสผ่าน --}}
{{-- ลงชื่อเข้าใช้ --}}
<div class="ce-bgimg" style="background-image:url('../../images/cebody-bg.jpeg');">
    <div class="body-login">
        <div class="forms-login">
            <div class="forms-login-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="forms-title">
                        <p>ลงชื่อเข้าใช้</p>
                        <img src="{{url('images/logo.png')}}" height="100%" width="100%" alt="">
                    </div>
                    <div class="forms-header">
                        <button id="facebook"><img src="{{url('images/f_logo_RGB-Hex-Blue_512.png')}}" alt=""
                                width="100%" height="100%"></button>
                        <button><img src="{{url('images/google.png')}}" alt="" width="100%" height="100%"
                                style="border-radius:20px;"></button>
                    </div>
                    <div class="forms-body">
                        <hr class="hr-text" data-content="OR">
                        <div name="input">
                            <input id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="อีเมลล์" value="{{ old('email') }}" type="email" autocomplete="email"
                                required>
                            @error('email')
                            <span class="invalid-feedback" style="border-radius:15px" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            {{-- <input type="text" class="form-control" placeholder="อีเมลล์"> --}}
                            <div class="input-group">
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="รหัสผ่าน"
                                    required autocomplete="current-password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" style="border-radius:15px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="forms-body-footer">
                            <a href="{{ url('std/login/forget-password')}}" class="btn-forget">ลืมรหัสผ่าน</a>
                            <a href="{{ url('std/login/register')}}" class="btn-regis">ลงทะเบียน</a>
                        </div>
                    </div>
                    <div class="forms-footer">
                        <button type="submit">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="switch-language">
        <p>TH/EN</p>
        <input type="checkbox" id="switch" />
        <label for="switch"></label>
    </div>
</div>
{{-- ลงชื่อเข้าใช้ --}}

{{-- แก้ไขโปรไฟล์ --}}
@include('pagestudent.profile.Profile')
{{-- แก้ไขโปรไฟล์ --}}

<div id="section2">
    <div class="container-header">
        คอร์สเรียนออนไลน์ฟรีที่สวนสุนันทา | www.mooc.ssru.ac.th
        <div class="container-underline"></div>
    </div>
    <div class="container-content">
        <p>
            มาร่วมฝึกทักษะ ความคิด ความสามารถ และสติปัญญา
        </p>
        <p>
            เพื่อพัฒนาศักยภาพของตนเอง
        </p>
    </div>
</div>



{{-- วิชา --}}
{{-- <div id="section3">
    <div class="bg-blur"></div>
    <nav>
        <div class="logo">
            <img src="{{url('images/logo.png')}}" alt="">
            <div class="log-underline-img"></div>
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
        </ul>
        <div class="user-id"></div>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <div class="section-header">
        <p>หลักสูตรที่เปิดสอน</p>
        <div class="section-underline"></div>
    </div>
    <div class="section-content">
        <div class="container">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div> --}}
{{-- วิชา --}}

@endsection

@section('js')
<script>
    $('.btn-forget').click(function (e) {
        e.preventDefault();
        $('.forms-forget-modal').css('margin-left', '0');
        // $('nav').css('display', 'none');
    });
    // $(document).ready(function () {
    //     $('.your-class').slick({
    //         centerMode: true
    //     });
    // });
    $('.forms-forget-close').click(function (e) {
        e.preventDefault();
        $('.forms-forget-modal').css('margin-left', '-100%');
        // $('nav').css('display', 'flex');
    });
    $('.center').click(function (e) {
        e.preventDefault();
        var currentSlide = $('.center').slick('slickCurrentSlide');
        // currentSlide.css('width:','100px');
        // alert(currentSlide);
        //  $(this).find( "[data-slick-index="+currentSlide+"]" ).css( "padding", "80px" );
    });
    $('.center').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var CurrentSlideDom = $(slick.$slides.get(currentSlide));
        var NextSlideDom = $(slick.$slides.get(nextSlide));
        console.log(CurrentSlideDom.html());

    });
    $(document).ready(function () {
        $('.center').slick({
            centerMode: true,
            centerPadding: '140px',
            slidesToShow: 1,
            dots: true,
            infinite: true,
            slidesToScroll: 1,
            focusOnSelect: true,
            touchMove: true,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '60px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '60px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>
@endsection
