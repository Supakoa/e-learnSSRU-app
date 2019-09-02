@extends('admin-teach.webapp.content.Index')

@section('title')
ตั้งค่าคำถามที่พบบ่อย | MOOC SSRU
@endsection

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/guidebook/view/index.css')}}">
@endpush

@section('main-content')
<div class="offset-md-4 col-md-4">
    <div class="text-center">
        <h2 class="t-shadow" style="border-bottom:2px solid gray;padding:10px;color:white">จัดการรูปภาพในสไลด์</h2>
    </div>
</div>

<div class="card bg-card">
    <div class="container" display="inline">
        <div class="text-center">
            <h2>คำถามที่พบบ่อย</h2>
        </div>
        <div class="row">


            {{-- main --}}
            @if (isset($faq))
            @for ($i = 0; $i< sizeof($faq); $i++) <div class="col-3">
                <img src="{{ $faq[$i]->image }}" class="mt-5" id="imageShow" width='100%' height="auto" />
        </div>

        @endfor
        @endif
    </div>
    <hr>
    <div class="text-center">
            <h2>ข่าวประชาสัมพันธ์</h2>
        </div>
    <div class="row">


        {{-- main --}}
        @if (isset($news))
        @for ($i = 0; $i< sizeof($news); $i++) <div class="col-3">
            <img src="{{ $news[$i]->image }}" class="mt-5" id="imageShow" width='100%' height="auto" />
    </div>

    @endfor
    @endif
</div>
<hr>
<form action="/image_slide" enctype="multipart/form-data" method="post">
    @csrf
    @method('POST')
    <select name="type" id="">
        <option value="" disabled selected>เลือกประเภทของภาพ</option>
        <option value="news">ข่าวประชาสัมพันธ์</option>
        <option value="faq">คำถามที่พบบ่อย</option>
    </select>
    <input type="file" name="image" id="" accept="image/x-png,image/gif,image/jpeg" />
    <button type="submit" class="btn btn-primary" btn-lg btn-block>save</button>
</form>
</div>
</div>
@endsection

@push('script')
<script src="{{ asset('node_modules/CEFstyle/guidebook/view/index.js')}}"></script>
@endpush
