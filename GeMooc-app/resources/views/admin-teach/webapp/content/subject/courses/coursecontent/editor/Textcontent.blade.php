@extends('admin-teach.webapp.content.Index')
@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@section('links')

@endsection
@section('main-content')

<div class="card p-4">
        @php
        $course = $article->content->lesson->course;
    @endphp
    <div>
<a href="{{url('/subject')}}">วิชา</a> / <a href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}} </a> / <a href="{{url('/course/'.$course->id)}}">{{$course->name}}</a> / <a href="{{url('/course/'.$course->id)}}">{{$article->content->lesson->name}}</a> / <a href="{{url('/article/'.$article->id)}}">{{$article->content->name}}</a>
</div>
<br>
        <div class="row" style="border-bottom:2px solid #707070">

                <div class="col-md-4">
                    <div class="text-left">
                            <a class="btn-back" href="#"><i class="fas fa-chevron-left"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                    <h4>{{$article->content->name}}</h4>
                    </div>
                </div>
            </div>
    <div class="card-body">
        <div class="text-right mb-4">
            <button onclick="window.location.href='{{url('/article/'.$article->id.'/edit')}}'" class="btn-edit"> <i
                    class="fas fa-cog"></i></button>
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
