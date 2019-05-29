@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <div class="justify-content-start">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="ce-content">
        <h1 class="ce-name">{{$content->name}}</h1>
        <div class="text-right mb-3">
            {{-- <a href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_Modal"> <i
                                class="fas fa-folder-plus"></i> </a> --}}
            <a href="{{url('/article/'.$article->id.'/edit')}}" class="btn btn-md btn-outline-warning"> <i
                    class="fas fa-cog"></i></a>
        </div>
        @if ($article->rawdata == "กรุณาเพิ่มเนื้อหา")
        <div id="summernote">
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong>{!!$article->rawdata!!}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @else
        <div id="summernote">{!!$article->rawdata!!}</div>
        @endif
    </div>
</div>
@endsection
