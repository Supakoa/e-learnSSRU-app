@extends('layouts.app')

@section('content')

<div class="container">
    <button id="battle" onclick="checkMe('fuck Me')">check</button>
</div>

<div class="plyr__video-embed" id="player">
    <iframe src="https://www.youtube.com/embed/JytX3FX_nNg" allowfullscreen allowtransparency allow="autoplay"></iframe>
</div>
<div id="player" data-plyr-provider="youtube" data-plyr-embed-id="JytX3FX_nNg"></div>

<div class="conatiner" id="text"></div>

@endsection

@section('js')
<script>
    const player = new Plyr(document.getElementById('player'));

    if(player.play){
        let progress = new Array(player.duration);
        // console.log(progress.length);
    }

    function checkMe(array) {
        alert(array);
    }

    /**
        Omega magneto hello function
    */
    var i = j = 1;
    var buffer = new Array(player.duration);
    let videoRecord = {
        "content_id": "1",
        "user_id": "{{ auth()->user()->id }}",
        "record": buffer,
    }
    let jsonRecord;
    $("body").on("ready", function () {
        console.log('ready..');
        console.log(player.duration);
        buffer[0] = 0;
    });
    $("#player").on("playing", function () {
        var timer = setInterval(function(){
            j = i;
            i = Math.floor(player.currentTime);
            if(player.playing){
                var tim = Math.floor(player.currentTime);
                buffer[tim] = tim;
                videoRecord.record = buffer;
                $("#text").text(JSON.stringify(videoRecord));
            }else{
                console.log('stop..');
                clearInterval(timer);
            }
            if(i != j){
                clearInterval(timer);
            }
            console.log((i++)+" : "+j);
        }, 1000)
    });

</script>
@endsection
