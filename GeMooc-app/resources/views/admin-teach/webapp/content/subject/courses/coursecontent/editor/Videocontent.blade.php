@extends('admin-teach.webapp.content.Index')

@section('title')
{{$video->name}} - MOOC SSRU
@endsection

@section('background')
{{url('storage/'.$course->image)}}\
@endsection

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceVideo.css')}}">
@endpush

@section('main-content')
<div class="card p-4">
    @php
        $course = $video->content->lesson->course;
    @endphp

    <div>
        <a class="badge badge-dark" href="{{url('/subject')}}">วิชา</a> / <a class="badge badge-dark" href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}} </a> / <a class="badge badge-dark" href="{{url('/course/'.$course->id)}}">{{$course->name}}</a> / <a class="badge badge-dark" href="{{url('/course/'.$course->id)}}">{{$video->content->lesson->name}}</a> / <a class="badge badge-dark" href="{{url('/video/'.$video->id)}}">{{$video->content->name}}</a>
    </div>
        <div class="row" style="border-bottom:2px solid #707070">
            <div class="offset-md-4 col-md-4">
                <div class="text-center">
                    <h4>{{$video->name}}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="text-right mb-3">
                <button data-toggle="modal" data-target="#editVideo" class="btn-edit-video"><i class="fas fa-cog    "></i></button>
            </div>
            {{-- owl iframe --}}
            {{-- <div class="container-video">
                <div class="embed-responsive embed-responsive-16by9 ce-video-content">
                    <iframe id="showVideo" class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
            </div> --}}

            @if ( $video->type == 'url' )
            {{--
                youtube
            --}}
            <div class="plyr__video-embed" id="player">
                <iframe
                    id="showVideo" height="720" width="1280"
                    src=""
                    allowfullscreen
                    allowtransparency
                    allow="autoplay"
                ></iframe>
            </div>
            @else
            {{--
                file video
            --}}
            <video height="720" width="1280" id="player" controls crossorigin playsinline>
                <source src="{{ url('').$video->data }}" type="video/mp4" />
                {{-- <source src="{{ $video->data }}" type="video/webm" /> --}}
                <!-- Captions are optional -->
                <track kind="captions" label="English captions" srclang="en" default />
            </video>

            @endif


        </div>
    </div>
@endsection

@section('modal')

    <!-- Modal -->
    <div class="modal fade" id="editVideo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขวีดีโอ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <form action="{{url('/video/'.$video->id)}}" id="editFormVideo" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="name">ชื่อวิดีโอ</label>
                                    <input type="text" class="form-control" name="name" value="{{$video->content->name}}" id="name" aria-describedby="helpId" placeholder="ชื่อวิดีโอ">
                                    <small id="helpId" class="form-text text-muted">กรุณากรอกชื่อวิดีโอ</small>
                                </div>
                            </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button form="editFormVideo" type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Add_Modal_content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="course-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="">แก้ไขเนื้อหา</h5>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{url('/content')}}" method="post" enctype='multipart/form-data' id="content_form">
                    @csrf
                    <input type="hidden" name="lesson_id" id="lesson_id" value="">
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="type" id="content_type" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">ชื่อเนื้อหา</label>
                                <input type="text" class="form-control"  id="nameLesson" name="name" placeholder="content Name" value="{{ $video->name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="select-type">เลือกประเภทเนื้อหา</label>
                            <div class="row" id="select-type center">
                                <div class="col-md-4 text-center">
                                    <button class="btnTypeContent" type="button" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="true" aria-controls="collapseVideo" disabled>
                                        <i class="fas fa-video"></i>
                                    </button>
                                    <p class="p-2">วิดีโอ</p>
                                </div>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        @if ( $video->type == 'url' )
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" type="radio" name="videoType" id="videoTypeYoutube" value="youtube" checked required>
                                                <label for="videoTypeYoutube" class="custom-control-label">Youtube</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" type="radio" name="videoType" id="videoTypeFile" value="file" required>
                                                <label for="videoTypeFile" class="custom-control-label">File</label>
                                            </div>
                                        @else
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" type="radio" name="videoType" id="videoTypeYoutube" value="youtube" required>
                                                <label for="videoTypeYoutube" class="custom-control-label">Youtube</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" type="radio" name="videoType" id="videoTypeFile" value="file" checked required>
                                                <label for="videoTypeFile" class="custom-control-label">File</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="setPercent()" type="submit"  class="btn btn-outline-primary" form="content_form">บันทึก</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const player = new Plyr('#player');
    const player2 = $('#my-video');

    let typeVideo = '{!! $video->type !!}';
    let dataVideo = '{!! $video->data !!}';
    let video = '{!! $video !!}';

    let videoId = getId(dataVideo);
    let iframeMarkup = 'https://www.youtube.com/embed/' + videoId;

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

        // fileVideo source setter
        // player.source = {
        //     type: 'video',
        //     title: video.name,
        //     sources: [
        //         {
        //             src: '/path/to/movie.mp4',
        //             type: 'video/mp4',
        //             size: 720,
        //         },
        //         {
        //             src: '/path/to/movie.webm',
        //             type: 'video/webm',
        //             size: 1080,
        //         },
        //     ],
            // tracks: [
            //     {
            //         kind: 'captions',
            //         label: 'English',
            //         srclang: 'en',
            //         src: '/path/to/captions.en.vtt',
            //         default: true,
            //     },
            //     {
            //         kind: 'captions',
            //         label: 'French',
            //         srclang: 'fr',
            //         src: '/path/to/captions.fr.vtt',
            //     },
            // ],
        // };
    }else{
        inputSrc = iframeMarkup;

        // youtube source setter
        player.source = {
            type: 'video',
            sources: [
                {
                    src: videoId,
                    provider: 'youtube',
                },
            ],
        };
    }
    $('#showVideo').attr('src', inputSrc);

</script>
@endsection
