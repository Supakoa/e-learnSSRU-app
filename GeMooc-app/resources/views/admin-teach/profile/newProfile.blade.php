{{-- layouts.appBackend -> * --}}
@extends('admin-teach.webapp.content.Index')

{{--
    push style and script this side
--}}
@push('styleEditProfile')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/profile/edit.css') }}">
@endpush
@push('scriptEditProfile')
<script src="{{ asset('node_modules/CEFstyle/profile/edit.js') }}"></script>
@endpush

@section('main-content')
<div class="main-content-header">
    <p>แก้ไขโปรไฟล์</p>
    <div class="underline-title"></div>
</div>

<div class="container-fluid" id="layerPage">
    <div id="layer1">
        <input type="file" name="uploadProfile" id="uploadProfile">

        @if (auth()->user()->profile->image!=null)
        <img src="{{url('/storage/'.auth()->user()->profile->image) }}" id="imageProfile" alt="...">
        @else
        <img
            id="imageProfile" src="data:image/png;base64,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">
        @endif
    </div>
    <div id="layer2">
        <div>
            <h5>ชื่อ</h5>
            <input type="text" name="firstName" id="firstName" value="{{ auth()->user()->name }}">
        </div>

        <div>
            <h5>นามสกุล</h5>
            <input type="text" name="lastName" id="lastName" value="{{ auth()->user()->name }}">
        </div>

        <div>
            <h5>รหัสผ่าน</h5>
            <input type="password" name="pass" id="pass" value="{{ auth()->user()->password }}">
        </div>

        <div>
            <h5>ยืนยันรหัสผ่าน</h5>
            <input type="password" name="confPass" id="confPass" value="{{ auth()->user()->password }}">
        </div>

        <div>
            <h5>อีเมล</h5>
            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}">
        </div>

        <div >
            <hr>
            <h5 id="status">สถานะ {{ auth()->user()->type_user }}</h5>
            <h5 id="routine">ประจำวิชา</h5>
            <h5 id="sex">เพศ</h5>
        </div>

        <div>
            <h5>อธิบายเพิ่มเติม</h5>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
    </div>
</div>
<form action="" method="post" id="form" enctype="multipart/form-data">
    <button type="submit" id="save-btn"><i class="fas fa-download"></i> บันทึก</button>
</form>
@endsection
