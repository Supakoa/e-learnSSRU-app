@extends('layouts.appViewer')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/video/navProgress/nav.css')}}">
@endpush

@section('content')
<div class="row">
    @php
        // decode json
        $content = json_decode($content);
        $video = json_decode($video);
        $userId = json_decode($userId);
        $issetRecord = json_decode($issetRecord);
        $record = json_decode($record);
    @endphp
    <div class="col-md-2 p-0">
        {{-- @include('std_viewer.nav-left.Nav-left',[$now_content,$lessons]) --}}
    </div>
    <div class="col-md-10">
        <div class="card ce-card">
            <div class="justify-content-center p-0">
                <div class="ce-conainer">
                    <h1 class="ce-name">Video : {{$content->name}}</h1>

                    <label>{{ $content->detail }}</label><br>
                    <div class="conatiner" id="text">record here..</div>

                    {{-- old video [delete] --}}

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
    <form action="/record" method="post">
        @csrf
        @method('post')
        <input id="recordItem" name="muuwan" type="hidden" value="sutima">
        <button onclick="takeRecord()" type="button" class="btn btn-outline-primary">takeRecord</button>
        <button type="submit" class="btn btn-outline-primary">send</button>
    </form>

</div>
@endsection

@push('script')
<script>
    // starting variable [Global]
    let issetRecord = {!! json_encode($issetRecord) !!};
    let content = {!! json_encode($content) !!}
    let userId = {!! json_encode($userId) !!}
    let video = {!! json_encode($video) !!};
    let record = {!! json_encode($record) !!};
</script>
<script src="{{ asset('node_modules/CEFstyle/video/view/index.js')}}"></script>
@endpush
