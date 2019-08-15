@extends('admin-teach.webapp.content.Index')
@section('title')
{{$video->name}} - MOOC SSRU
@endsection
@section('background')
{{url('storage/'.$course->image)}}\
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceVideo.css')}}">
@endsection

@section('main-content')
<div class="card p-4">
        @php
        $course = $video->content->lesson->course;
    @endphp
    <div>
<a href="{{url('/subject')}}">วิชา</a> / <a href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}} </a> / <a href="{{url('/course/'.$course->id)}}">{{$course->name}}</a> / <a href="{{url('/course/'.$course->id)}}">{{$video->content->lesson->name}}</a> / <a href="{{url('/video/'.$video->id)}}">{{$video->content->name}}</a>
</div>
    <div class="row" style="border-bottom:2px solid #707070">
        <div class="col-md-4">
            <div class="text-left">
                <a class="btn-back" href="#"><i class="fas fa-chevron-left"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <h4>{{$video->name}}</h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="text-right mb-3">
            <button class="btn-edit-video"><i class="fas fa-cog    "></i></button>
        </div>
        {{-- owl iframe --}}
        {{-- <div class="container-video">
            <div class="embed-responsive embed-responsive-16by9 ce-video-content">
                <iframe id="showVideo" class="embed-responsive-item" src="" allowfullscreen></iframe>
            </div>
        </div> --}}
        <div class="container-video">
            <div class="row justify-content-center mb-5">
                <div class="col">
                    <div class="plyr__video-embed" id="player">
                        <iframe id="showVideo" src="" allowfullscreen allowtransparency
                            allow="autoplay"></iframe>
                    </div>
                    <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="aSQwI3rDETk"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    let typeVideo = '{!! $video->type !!}';
    let dataVideo = '{!! $video->data !!}';

    let videoId = getId(dataVideo);
    let iframeMarkup = '//www.youtube.com/embed/' + videoId;

    let inputSrc;

    function getId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);

        if (match && match[2].length == 11) {
            return match[2];
        } else {
            return 'error';
        }
    }

    if (typeVideo == 'file') {
        inputSrc = dataVideo;
    }else{
        inputSrc = iframeMarkup;
    }
    $('#showVideo').attr('src', inputSrc);

</script>
@endsection
