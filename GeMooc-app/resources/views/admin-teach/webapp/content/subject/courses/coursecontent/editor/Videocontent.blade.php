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
    <a href="{{url('/subject')}}">วิชา</a> / <a href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}} </a> / <a href="{{url('/course/'.$course->id)}}">{{$course->name}}</a> / <a href="{{url('/course/'.$course->id)}}">{{$video->content->lesson->name}}</a> / <a href="{{url('/video/'.$video->id)}}">{{$video->content->name}}</a>
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

            {{--
                youtube
            --}}
            <div class="container-video">
                <div class="row justify-content-center mb-5">
                    <div class="col">
                        <div class="plyr__video-embed" id="player">
                            <iframe id="showVideo" height="720" width="1280" src="" allowfullscreen allowtransparency
                                allow="autoplay"></iframe>
                        </div>
                        <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="aSQwI3rDETk"></div>
                    </div>
                </div>
            </div>

            {{--
                file video
            --}}
            <video poster="/path/to/poster.jpg" id="player" playsinline controls>
                <source src="{{ $video->data }}" type="video/mp4" />

                <!-- Captions are optional -->
                <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
            </video>

        </div>
    </div>
@endsection

@section('modal')

    <!-- Modal -->
    <div class="modal fade" id="editVideo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eidt Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">

                        @if ($video->type == 'url')
                            {{--
                                if $video->type == 'url'
                            --}}
                            <form action="/video/{{ $video->id }}" id="editFormVideo" method="post">
                                @csrf
                                @method('PATCH')

                                <label for="">Youtube url</label>
                                <input type="text" class="form-control" name="newUrl" id="newUrl" aria-describedby="placeHolder" value="{{ $video->data }}">
                            </form>
                        @else
                            {{--
                                if $video->type == 'file'
                            --}}
                            <form action="/video/{{ $video->id }}" method="post">
                                <div class="form-group">
                                  <label for=""></label>
                                  <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
                                  <small id="fileHelpId" class="form-text text-muted">Help text</small>
                                </div>
                            </form>
                        @endif

                      <small id="placeHolder" class="form-text text-muted">Place new url youtube here.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button form="editFormVideo" type="submit" class="btn btn-primary">Save</button>
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
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button onclick="setPercent()" type="submit"  class="btn btn-outline-primary" form="content_form">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    // $('#Add_Modal_content').modal('show');

    const player = new Plyr('#player');
    const players = Plyr.setup('.js-player');

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
