@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/CEFlogIn.css')}}">
@endpush
{{-- ลงชื่อเข้าใช้ --}}
<div class="ce-bgimg" style="background-image:url('../../images/cebody-bg.jpeg');">
    <div class="body-login">
        <div class="forms-login">
            <div class="forms-login-content">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="forms-title ">
                        <img class="m-auto" src="{{url('images/newLogotwo.png')}}"  alt="">
                    </div>
                    <div class="forms-body">
                        {{-- <hr class="hr-text" data-content="OR"> --}}
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
                                <div  class="input-group-append">
                                    <span id="showpassword" class="input-group-text"><i class="fas fa-eye"></i></span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" style="border-radius:15px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="forms-body-footer">
                        <a href="{{url('/forget')}}" class="btn-forget">ลืมรหัสผ่าน</a>
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
    {{-- <div class="switch-language">
        <p>TH/EN</p>
        <input type="checkbox" id="switch" />
        <label for="switch"></label>
    </div> --}}
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
{{-- แก้ไขโปรไฟล์ --}}
{{-- @include('pagestudent.profile.Profile') --}}
{{-- แก้ไขโปรไฟล์ --}}

@php
$news = DB::table('image_slides')->where('type', 'news')->get();
    // dd($news);
@endphp
    <div class="container-fluid p-2">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                    @foreach ($news as$key=>$news)

                    <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                            <a href="{{$news->url}}" target="_blank">
                            <img src="{{url(''.$news->image)}}" class="d-block w-100" alt="...">
                        </a>
                  <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
                  </div>
                </div>

                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
{{-- วิชา --}}

@push('script')
    <script>
        $("#showpassword").click(function (e) {
            e.preventDefault();
            console.log("in");

            if($("#password").attr("type")=="password"){
                $("#password").attr("type","text");
            }else{
                $("#password").attr("type","password");
            }
        });
    </script>
@endpush
