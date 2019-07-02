@extends('layouts.appLearning')

@section('login')
@include('pagestudent.navs.Navs_login')
{{-- ลืมรหัสผ่าน --}}
<div class="forms-forget-modal"
    style="background-image:url('https://www.sociopoolindia.com/wp-content/uploads/2014/04/work-bg.jpg')">
    <div class="forms-forget-header">
        <img src="{{url('images/logo.png')}}" alt="">
        <div class="forms-forget-close"><i class="fas fa-times    "></i></div>
    </div>
    <div class="forms-forget-password">
        <form action="" method="POST">
            <label for="forget-password">รีเซ็ตรหัสผ่าน</label>
            <div class="forms-input">
                <i class="fas fa-envelope"></i>
                <input class="form-control" type="email" name="" id="forget-password" placeholder="อีเมล">
                <button type="submit" class="forms-forget-btn">รีเซ็ตรหัสผ่าน</button>
            </div>
        </form>
    </div>
</div>
{{-- ลืมรหัสผ่าน --}}
{{-- ลงชื่อเข้าใช้ --}}
<div class="ce-bgimg" style="background-image:url('../../images/cebody-bg.jpeg');">
    <div class="body-login">
        <div class="forms-login">
            <div class="forms-login-content">
                <form action="POST">
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
                            <input type="text" class="form-control" placeholder="อีเมลล์">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="รหัสผ่าน">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                </div>
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
<div id="section3">
    <div class="bg-blur"></div>
    <div class="section-navs">
        <ul>
            <li style="display:flex">
                <img src="{{url('images/logo.png')}}" class="img-fluid d-block" alt=""> SSRU
            </li>
            <li>
                <a href="#">วิชา</a>
            </li>
            <li>
                <a href="#">คู่มือการใช้งาน</a>
            </li>
            <li>
                <a href="#">คำถาม</a>
            </li>
            {{-- <li>username <img src="" alt=""></li> --}}
        </ul>
    </div>
    <div class="section-header">
        <p>หลักสูตรที่เปิดสอน</p>
        <div class="section-underline"></div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="center">
                <div class="boxs">
                    <img src="https://i.ytimg.com/vi/-qagpwPP-VU/maxresdefault.jpg" alt="1">
                    <p>
                        ตอนที่ 1
                    </p>
                    <p style="color:lawngreen">
                        เปิดรับสมัคร
                    </p>
                    <div class="let-course">
                        <button>เริ่มหลักสูตร</button>
                    </div>
                </div>
                <div class="boxs">
                    <img src="https://i.ytimg.com/vi/zH54sNsjuOE/maxresdefault.jpg" alt="2">
                    <p>
                        ตอนที่ 2
                    </p>
                    <p style="color:lawngreen">
                        เปิดรับสมัคร
                    </p>
                    <div class="let-course">
                        <button>เริ่มหลักสูตร</button>
                    </div>
                </div>
                <div class="boxs">
                    <img src="https://i.ytimg.com/vi/TT_nFrsTers/maxresdefault.jpg" alt="3">
                    <p>
                        ตอนที่ 3
                    </p>
                    <p style="color:lawngreen">
                        เปิดรับสมัคร
                    </p>
                    <div class="let-course">
                        <button>เริ่มหลักสูตร</button>
                    </div>
                </div>
                <div class="boxs">
                    <img src="https://i.ytimg.com/vi/rilFfbm7j8k/maxresdefault.jpg" alt="4">
                    <p>
                        ตอนที่ 4
                    </p>
                    <p style="color:lawngreen">
                        เปิดรับสมัคร
                    </p>
                    <div class="let-course">
                        <button>เริ่มหลักสูตร</button>
                    </div>
                </div>
                <div class="boxs">
                    <img src="https://i.ytimg.com/vi/tDURYzS9y2k/maxresdefault.jpg" alt="5">
                    <p>
                        ตอนที่ 5
                    </p>
                    <p style="color:lawngreen">
                        เปิดรับสมัคร
                    </p>
                    <div class="let-course">
                        <button>เริ่มหลักสูตร</button>
                    </div>
                </div>
                <div class="boxs">
                    <img src="https://i.ytimg.com/vi/ekyho8DoTqg/maxresdefault.jpg" alt="6">
                    <p>
                        ตอนที่ 6
                    </p>
                    <p style="color:lawngreen">
                        เปิดรับสมัคร
                    </p>
                    <div class="let-course">
                        <button>เริ่มหลักสูตร</button>
                    </div>
                </div>
            </div>
            {{-- <div class="let-course">
                <button>เริ่มหลักสูตร</button>
            </div> --}}
        </div>
    </div>
</div>
{{-- วิชา --}}

@endsection

@section('js')
<script>
    $('.btn-forget').click(function (e) {
        e.preventDefault();
        $('.forms-forget-modal').css('margin-left', '0');
        // $('nav').css('display', 'none');
    });
    $(document).ready(function () {
        $('.your-class').slick({
            centerMode: true
        });
    });
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
            // autoplay: true,
            // autoplaySpeed: 3000,
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
