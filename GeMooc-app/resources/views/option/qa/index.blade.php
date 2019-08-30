@extends('admin-teach.webapp.content.Index')

@section('title')
ตั้งค่าคำถามที่พบบ่อย | MOOC SSRU
@endsection

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/qa/view/index.css')}}">
@endpush

@section('main-content')
<div class="offset-md-4 col-md-4">
    <div class="text-center">
        <h2 style="border-bottom:2px solid gray;padding:10px;color:white;">ตั้งค่าคำถามที่พบบ่อย</h2>
    </div>
</div>

@php
$qas = json_decode($qa);
@endphp
<div class="card bg-card">
    <div class="container" display="inline">
        {{-- main --}}
        <div class="row">
        @if ($qas)
        @for ($i = 0; $i < sizeof($qas); $i++)
        <div class="col-3">
            <img src="{{ $qas[$i]->image }}" id="imageShow" class="mt-5" width='100%' height="auto" />
        </div>
        @endfor
        @endif
        </div>
        <hr>
        <form action="/qaOption" enctype="multipart/form-data" method="post">
            @csrf
            @method('POST')

            <input type="file" name="newQa" id="newQa" accept="image/x-png,image/gif,image/jpeg" />
            <button type="submit" class="btn btn-primary" btn-lg btn-block>save</button>
        </form>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('node_modules/CEFstyle/qa/view/index.js')}}"></script>
@endpush
