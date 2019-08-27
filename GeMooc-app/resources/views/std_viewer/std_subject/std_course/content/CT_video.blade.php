@extends('layouts.appViewer')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/video/navProgress/nav.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col-md-2 p-0">
        {{-- @include('std_viewer.nav-left.Nav-left',[$now_content,$lessons]) --}}
    </div>
    <div class="col-md-10">
        <div class="card ce-card">
            <div class="justify-content-center p-0">
                <div class="ce-conainer">
                    <h1 class="ce-name">Video : {{$now_content->name}}</h1>

                    <label>{{ $now_content->detail }}</label><br>
                    <div class="conatiner" id="text">record here..</div>

                    {{-- <div class="container">
                        <div class="row justify-content-center mb-5">
                            <div class="col">
                                <div class="plyr__video-embed" id="player">
                                    <iframe src="" allowfullscreen allowtransparency allow="autoplay"></iframe>
                                </div>
                                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="JytX3FX_nNg"></div>
                            </div>
                        </div>
                    </div> --}}
                    @if ( $video->type == 'youtube' )
                    {{--
                        youtube
                    --}}
                    <div class="plyr__video-embed" id="player1">
                        <iframe id="showVideo" src="" allowfullscreen allowtransparency
                            allow="autoplay"></iframe>
                    </div>
                    @else
                    {{--
                        file video
                    --}}
                    <video height="720" width="1280" id="player2" controls crossorigin playsinline>
                        <source src="{{ url('').$video->data }}" type="video/mp4" />
                        {{-- <source src="{{ $video->data }}" type="video/webm" /> --}}
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" srclang="en" default />
                    </video>
                    @endif

                    {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Now, this page Empty!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}

                    <ul class="navProgress" id="navProgress">
                    </ul>

                </div>
            </div>
        </div>
    </div>

    {{--
        [test cast] send form refresh
    --}}
    {{-- <form action="/record" method="post">
        @csrf
        @method('post')
        <input id="recordItem" name="muuwan" type="hidden" value="sutima">
        <button onclick="takeRecord()" type="button" class="btn btn-outline-primary">takeRecord</button>
        <button type="submit" class="btn btn-outline-primary">send</button>
    </form> --}}


</div>
@endsection

@section('js2')
<script>

    $('[data-toggle="tooltip"]').tooltip();

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#player1').on('ready', function () {
        /**
            Omega magneto hello function
        */
        let i = j = 0;
        let click = false;
        let doubleClick = false;
        let buffer = new Array(player.duration);

        // creat new record bar
        for (let i = 0; i < player.duration; i++) {
            var second = parseInt(i % 60);
            var minute = parseInt(i / 60);
            (second < 10) ? second = '0' + second : second ;
            (minute < 10) ? minute = '0' + minute : minute ;
            var newLi = document.createElement('div');
            newLi.className = 'recordSlot';
            newLi.style.width = ( $('#player1').width() ) / player.duration + 'px';
            newLi.setAttribute('at_record', i);
            newLi.setAttribute('status', 'undefind');
            newLi.setAttribute('data-toggle', 'tooltip');
            newLi.setAttribute('data-placement', 'bottom');
            newLi.setAttribute('title', minute + ':' + second );
            newLi.onclick = function (){
                console.log('currentTime: '+i);
                player.currentTime = i;
            }
            console.log('object :'+ ( $('#player1').width() ) );
            document.getElementById('navProgress').appendChild(newLi);
        }

        // check player duration
        console.log('duration: '+player.duration);

        let videoRecord = {
            "content_id": "{{ $now_content->id }}",
            "user_id": "{{ auth()->user()->id }}",
            "record": buffer,
            "percent": 0,
        }
        // if have in record take to videoRecord
        @if( isset( $record ) )
            console.log('have record..');
            videoRecord = {
                "content_id": record.content_id,
                "user_id": record.user_id,
                "record": JSON.parse(record.record),
                "percent": record.percent,
            }

            // take record to buffer
            buffer = JSON.parse(record.record);
            // console.log('record: '+videoRecord.record);
        @endif

        // show videoRecord
        $("#text").text(JSON.stringify(videoRecord));

        // oneRady start interval
        $("body").on("ready", function () {
            console.log('ready..');
            buffer[0] = 0;
            var recorder = setInterval(function () {
                $.post("/record", {
                        'muuwan': JSON.stringify(videoRecord)
                    },
                    function (data, textStatus, jqXHR) {
                        console.log('store ..' + data);
                        // alert(data);
                    },
                );
            }, 5000);
        });
        $("#player1").on("dblclick", function () {
            doubleClick = true;
            console.log('double click..');
        });
        $("#player1").on("click", function () {
            if (!doubleClick) {
                console.log('fucking click..');
                click = true;
                var timer = setInterval(function () {
                    j = i;
                    i = Math.floor(player.currentTime);
                    if (player.playing) {
                        const tim = Math.floor(player.currentTime);
                        buffer[tim] = tim;
                        videoRecord.record = buffer;
                        videoRecord.percent = Math.floor( ( ( buffer.filter(String).length )  / player.duration) * 100);
                        $("#text").text(JSON.stringify(videoRecord));
                        if (i != j && click) {
                            console.log('skip..');
                            clearInterval(timer);
                        }
                    } else {
                        console.log('stop..');
                        clearInterval(timer);
                    }
                    console.log((i++) + " : " + j);
                    click = false;
                }, 1000 / player.speed);
            } else {
                doubleClick = false;
            }
        });
    });

    video = {!! $video !!};
    record = {!! $record !!};

    let videoId = getId(video.data);
    let iframeMarkup = 'www.youtube.com/embed/' + videoId;
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

        if (video.type == 'file') {
            inputSrc = dataVideo;
        } else {
            inputSrc = iframeMarkup;
        }

        // set into src iframe
        $('#showVideo').attr('src', 'https://'+inputSrc);

        if (video.type == 'youtube') {
         player = new Plyr(document.getElementById('player1'));
         console.log('youtube');

        } else {
            player = new Plyr(document.getElementById('player2'));
            console.log('file');
        }


    // test send record
    function takeRecord() {
        $("#recordItem").val(JSON.stringify(videoRecord));
    }

    $('.recordSlot').on('click', function () {
        alert('a');
        alert($('.recordSlot').attr('at_record'));
    });

</script>
@endsection
