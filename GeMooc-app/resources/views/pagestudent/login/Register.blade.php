@extends('layouts.appBackEnd')

@push('links')
<style>
    .wrap-footer{
        display: none;
    }
    /* forms register */
    @media screen and (max-width:760px) {
        .register-title {
            font-size: 12px;
        }

        .register-body .row {
            margin-bottom: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .forms-register {
            height: 100% !important;
            width: 100% !important;
            padding: 10px !important;
            top: 0 !important;
            left: 0 !important;
            transform: none !important;
            position: relative !important;
            padding: 10px 0px 25px 0px !important;
        }

        .register-body #fnaphoneNumber .register-body #lname,
        .register-body #re-pass,
        .register-body #fname,
        .register-body #phoneNumber,
        .register-body #email,
        .register-body #pass {
            padding-left: 10px !important;
        }

        .register-body i {
            display: none;
        }

        .checkmark {
            height: 25px;
            width: 25px;
        }

        #gen {
            /* display: flex; */
            position: relative;
        }

        .ck-container {
            margin-left: 15px;
        }

    }

    @media screen and (max-width: 450px) {
        .register-title {
            font-size: 10px;
        }
    }


    .body-register {
        margin: 0px;
        padding: 0px;
        width: 100%;
        height: 100%;
        background: rgb(0, 0, 0, 0.6);
        min-height: 100vh;
    }

    .register-title {
        text-align: center;
        justify-content: center;
        font-size: 20px;
        letter-spacing: 3px;
        /* color: #fff; */
    }

    .underline-title {
        border-bottom: 2px solid #9D9998;
        width: 30%;
        margin-left: 50%;
        transform: translate(-50%, -50%);
    }

    .forms-register {
        background: #DADADA;
        border: none;
        border-radius: 35px;
        box-shadow: 4px 4px 4px #818078;
        padding: 15px;
        width: 750px;
        height: 650px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -55%);
    }

    .register-body {
        padding: 15px;
    }

    .register-body i {
        position: absolute;
        background: #F17474;
        border-radius: 25px;
        font-size: 19px;
        margin-left: 7px;
        padding: 10px;
        left: 0;
        bottom: 0;
        border: none;
        color: #fff;
    }

    .register-body #fname,
    .register-body #phoneNumber,
    .register-body #email,
    .register-body #pass {
        padding-left: 34px;
        border: none;
        border-radius: 25px;
    }

    .register-body #lname,
    .register-body #fname,
    .register-body #phoneNumber,
    .register-body #re-pass {
        border: none;
        border-radius: 25px;
    }

    .register-body .row {
        margin-bottom: 6px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .register-body #name,
    .register-body #email,
    .register-body #pass,
    .register-body #lname,
    .register-body #fname,
    .register-body #phoneNumber,
    .register-body #re-pass {
        background: #9D9998;
        color: #ffffff;
    }

    .ck-container {
        display: block;
        position: relative;
        padding-left: 45px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 18px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .ck-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .ck-container {
        margin-left: 30px;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        border-radius: 20px;
        top: 0;
        left: 0;
        height: 35px;
        width: 35px;
        background-color: #061665;
    }

    /* On mouse-over, add a grey background color */
    .ck-container:hover input~.checkmark {
        background-color: #F17474;
    }

    /* When the checkbox is checked, add a blue background */
    .ck-container input:checked~.checkmark {
        background-color: #F17474;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .ck-container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .ck-container .checkmark:after {
        left: 12px;
        top: 2px;
        width: 13px;
        height: 30px;
        border: solid #000;
        border-width: 0 4px 4px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .register-footer {
        text-align: center;
    }

    .register-footer button {
        color: #fff;
        background: #061665;
        font-size: 24px;
        border: none;
        border-radius: 20px;
        padding: 5px;
        width: 50%;
    }

    /* forms register */
</style>
@endpush

@section('wrap-body')
<div class="ce-bgimg" style="background-image:url('../../images/bg-register.jpg');">
    <div class="body-register">

        @include('inc.alert')
        <div class="forms-register">
            <a href="{{url("/")}}" type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
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
