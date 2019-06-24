@extends('layouts.appLearning')

@section('login')
<div class="body-login">
    <div class="forms-login">
        <div class="forms-login-content">
            <form action="POST">
                <div class="forms-title">ลงชื่อเข้าใช้ MOOC</div>
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
                        <a href="#" class="btn-forget">ลืมรหัสผ่าน</a>
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
@endsection
