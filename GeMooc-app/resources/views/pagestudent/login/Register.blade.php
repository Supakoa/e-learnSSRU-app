@extends('layouts.appLearning')

@section('login')
<div class="ce-bgimg" style="background-image:url('../../images/bg-register.jpg');">
    <div class="body-register">
        <div class="forms-register">
            <div class="register-title">
                ลงทะเบียนเข้าสู่ระบบ
                <div class="underline-title"></div>
            </div>
            <div class="register-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">ชื่อ</label>
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="lname">นามสกุล</label>
                        <input type="text" class="form-control" name="" id="lname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="Email">อีเมลล์</label>
                        <i class="far fa-envelope"></i>
                        <input type="email" class="form-control" name="" id="Email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="pass">รหัสผ่าน</label>
                        <i class="fab fa-expeditedssl"></i>
                        <input type="text" class="form-control" name="" id="pass">
                    </div>
                    <div class="col-md-6">
                        <label for="re-pass">ยืนยันรหัสผ่าน</label>
                        <input type="text" class="form-control" name="" id="re-pass">
                    </div>
                </div>
                <div class="row" id="gen">
                    <div class="col-xs-6">
                        <label class="ck-container">เพศชาย
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-xs-6">
                        <label class="ck-container">เพศหญิง
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="register-footer">
                <button>ลงทะเบียน</button>
            </div>
        </div>
    </div>
</div>
@endsection
