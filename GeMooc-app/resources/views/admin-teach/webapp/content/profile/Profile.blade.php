@extends('admin-teach.webapp.content.Index')
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceProfile.css')}}">
@endpush

@section('main-content')
<div class="container-profile">
    <div class="forms-profile-header">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>แก้ไขโปรไฟล์</h3>
            </div>
        </div>
    </div>
    <div class="forms-profile-body">
        <div class="forms-profile-picture">
            <img src="" alt="...">
            <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
        <div class="forms-profile-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">ชื่อ</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastName">นามสกุล</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pass">รหัสผ่าน</label>
                            <input type="text" class="form-control" id="pass">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confermPass">ยืนยันรหัสผ่าน</label>
                            <input type="text" class="form-control" id="confermPass">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="eMail">อีเมล</label>
                            <input type="text" class="form-control" id="eMail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted">สถานะ ผู้ดูแลระบบ</small><br>
                        <small class="text-muted">เพศ ชาย</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
