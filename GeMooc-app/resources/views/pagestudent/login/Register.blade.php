@extends('layouts.appLearning')

@section('index')
<div class="ce-bgimg" style="background-image:url('../../images/bg-register.jpg');">
    <div class="body-register">
        @include('inc.alert')
        <div class="forms-register">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="register-title">
                    ลงทะเบียนเข้าสู่ระบบ
                    <div class="underline-title"></div>
                </div>
                <div class="register-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="fname">ชื่อ</label>
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-control" name="fname" id="fname" required
                                autocomplete="fname" value="{{ old('fname') }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="lname">นามสกุล</label>
                            <input type="text" class="form-control" name="lname" id="lname" required
                                autocomplete="lname" value="{{ old('lname') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-lx-12">
                            <label for="Email">อีเมลล์</label>
                            <i class="far fa-envelope"></i>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-lx-12">
                            <label for="phoneNumber">เบอร์โทรศัพท์</label>
                            <i class="far fa-envelope"></i>
                            <input type="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror"
                                name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber') }}" required
                                autocomplete="phoneNumber">
                            @error('phoneNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="pass">รหัสผ่าน</label>
                            <i class="fab fa-expeditedssl"></i>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" id="pass">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="re-pass">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" name="password_confirmation" required
                                autocomplete="new-password" id="re-pass">
                        </div>
                    </div>
                    <div class="row" id="gen">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label class="ck-container">เพศชาย
                                <input name='gender' value="male" type="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label class="ck-container">เพศหญิง
                                <input name='gender' value="female" type="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="register-footer">
                    <button>ลงทะเบียน</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
