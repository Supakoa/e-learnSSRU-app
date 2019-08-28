@extends('pagestudent.Index')
@section('title')
{{$quiz->name}} | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/ceQuiz.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        What the Fuck {{-- @include('pagestudent.navs.navsLeft',[$lessons]) --}}
    </div>
    <div class="containerQuiz">
        <div class="cardPreview p-3">
            <h4 class="text-center border-bottom w-50 m-auto border-dark p-1" >
                Subject name.
            </h4>
            <dl class="row p-2" style="bottom:0;">
                <dd class="col-md-12 text-center">
                    คำถามมีทั้งหมด 10 ข้อ<br>
                    เวลาในการทำ 10 นาที
                </dd>
            </dl>
            <br><br>
            <dl class="row">
                <dd class="text-center col-md-8 offset-md-2">
                    <small>**เมื่อกดเริ่มจะไม่สามารถออกจากหน้าทำแบบฝึกหัดได้จนกว่าจะทำแบบฝึกหัดจนหมดเลา</small>
                </dd>
            </dl>
        </div>
        <div class="text-center">
            <a id="startQuiz" class="btn">
                เริ่ม
            </a>
        </div>
    </div>
</div>
@endsection
