@extends('layouts.appViewer')

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

                    <div class="container">
                        <div class="row justify-content-center mb-5">
                            <div class="col">
                                <div class="plyr__video-embed" id="player">
                                    <iframe src="https://www.youtube.com/embed/JytX3FX_nNg" allowfullscreen allowtransparency allow="autoplay"></iframe>
                                </div>
                                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="JytX3FX_nNg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Now, this page Empty!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const player = new Plyr(document.getElementById('player'));

    /**
        Omega magneto hello function
    */
    var i = j = 0;
    var click = false;
    var doubleClick = false;
    var buffer = new Array(player.duration);
    let videoRecord = {
        "content_id": "{{ $now_content->id }}",
        "user_id": "{{ auth()->user()->id }}",
        "record": buffer,
    }
    let jsonRecord;
    $("body").on("ready", function () {
        console.log('ready..');
        console.log(player.duration);
        buffer[0] = 0;
    });
    $("#player").on("dblclick", function () {
        doubleClick = true;
        console.log('double click..');
    });
    $("#player").on("click", function () {
        if (!doubleClick) {
            console.log('fucking click..');
            click = true;
            var timer = setInterval(function(){
                j = i;
                i = Math.floor(player.currentTime);
                if(player.playing){
                    const tim = Math.floor(player.currentTime);
                    buffer[tim] = tim;
                    videoRecord.record = buffer;
                    $("#text").text(JSON.stringify(videoRecord));
                    if( i != j  && click){
                        console.log('skip..');
                        clearInterval(timer);
                    }
                }else{
                    console.log('stop..');
                    clearInterval(timer);
                }
                console.log((i++)+" : "+j);
                click = false;
            }, 1000);
        }else{
            doubleClick = false;
        }
    });

</script>
@endsection
