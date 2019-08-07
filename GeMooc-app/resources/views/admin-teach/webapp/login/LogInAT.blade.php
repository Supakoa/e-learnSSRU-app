
@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/CEFlogIn.css')}}">
@endsection
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
                            <a href="{{ url('/register')}}" class="btn-regis">ลงทะเบียน</a>
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
    {{-- แก้ไขโปรไฟล์ --}}
    @include('pagestudent.profile.Profile')
    {{-- แก้ไขโปรไฟล์ --}}
    <div class="section-header">
        <p>หลักสูตรที่เปิดสอน</p>
        <div class="section-underline"></div>
    </div>
    <div class="section-content">
        <div class="container">
            
        </div>
    </div>
</div>
{{-- วิชา --}}
