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
                    <div class="forms-title pt-5">
                        <img class="m-auto" src="{{url('images/newLogoborder.png')}}"  alt="">
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
                        <div class="forms-footer w-100 p-4">
                            <button class="btn-block" type="submit">เข้าสู่ระบบ</button>
                        </div>
                        <div class="forms-body-footer pl-4 pr-4">
                        <a href="{{url('/forget')}}" class="btn-forget">ลืมรหัสผ่าน</a>
                            <a href="{{ url('/register')}}" class="btn-regis">ลงทะเบียน</a>
                        </div>
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
        <blockquote class="blockquote container p-5">
                <p class="mb-0 text-center">คอร์สเรียนออนไลน์ฟรีที่สวนสุนันทา | www.mooc.ssru.ac.th</p>
                <hr>
                <footer class="blockquote-footer pl-4">มาร่วมฝึกทักษะ ความคิด ความสามารถ และสติปัญญา <cite title="Source Title">เพื่อพัฒนาศักยภาพของตนเอง</cite></footer>
        </blockquote>
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

                    <div class="carousel-item {{$key==0 ? 'active' : ''}} w-100 h-100 rounded">
                            <a href="{{$news->url}}" target="_blank">
                            <img src="{{url(''.$news->image)}}" class="d-block rounded" width="100%" height="700px"  alt="...">
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
