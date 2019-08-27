@extends('layouts.appLearning')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/video/navProgress/nav.css')}}">
@endpush

@section('content')
<div class="container">

    <div class="conatiner" id="text">record here..</div>

    <div class="plyr__video-embed" id="player">
        <iframe id="showVideo" height="720" width="1280" src="" allowfullscreen allowtransparency
            allow="autoplay"></iframe>
    </div>

    <ul class="navProgress">
        <li><a></a></li>
    </ul>

    <button  type="button" class="btn btn-primary">duration</button>

</div>
@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {

         video = {!! $video !!};
         record = {!! $record !!};
         user = {!! auth()->user()->id !!};
         videoId = getId(video.data);
         iframeMarkup = 'https://www.youtube.com/embed/' + videoId;

        $('#showVideo').attr('src', iframeMarkup);

         player = new Plyr(document.getElementById('player'));
    });



    function getId(url) {
         regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
         match = url.match(regExp);

        if (match && match[2].length == 11) {
            return match[2];
        } else {
            return 'error';
        }
    }



    /**
        Omega magneto hello function
    */
     i = j = 0;
     click = false;
     doubleClick = false;
     buffer = new Array(player.duration);
     videoRecord = {
        "content_id": "{{ $now_content->id }}",
        "user_id": "{{ auth()->user()->id }}",
        "record": buffer,
        "percent": 0,
    }

    @if(isset($record))
    console.log('have in record..');
    videoRecord = {
        "content_id": {{ $record->content_id }},
        "user_id": {{ $record->user_id }},
        "record": {{ $record->record }},
        "percent": {{ $record->percent }},
    }
    buffer = {{ $record->record }};
    console.log(videoRecord.record);

    @endif

    $("#text").text(JSON.stringify(videoRecord));
    var jsonRecord;
    $("body").on("ready", function () {
        console.log('ready..');
        console.log(player.duration);
        console.log(JSON.stringify(videoRecord));


        buffer[0] = 0;
         recorder = setInterval(function () {
            $.post("{{url("/record")}}", {
                    'muuwan': JSON.stringify(videoRecord)
                },
                function (data, textStatus, jqXHR) {
                    console.log('store ..' + data);
                    // alert(data);
                },
            );
        }, 5000);
    });
    $("#player").on("dblclick", function () {
        doubleClick = true;
        console.log('double click..');
    });
    $("#player").on("click", function () {
        if (!doubleClick) {
            console.log('fucking click..');
            click = true;
             timer = setInterval(function () {
                j = i;
                i = Math.floor(player.currentTime);
                if (player.playing) {
                    const tim = Math.floor(player.currentTime);
                    buffer[tim] = tim;
                    videoRecord.record = buffer;
                    videoRecord.percent = Math.floor(((buffer.length - (buffer.length - buffer.filter(
                        String).length)) / player.duration) * 100);
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

    function takeRecord() {
        $("#recordItem").val(JSON.stringify(videoRecord));
    }

</script>
@endsection
