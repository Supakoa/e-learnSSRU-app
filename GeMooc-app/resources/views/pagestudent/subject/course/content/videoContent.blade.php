@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/video/navProgress/nav.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    @php
        // decode json
        $content = json_decode($content);
        $video = json_decode($video);
        $userId = json_decode($userId);
        $issetRecord = json_decode($issetRecord);
        $record = json_decode($record);
        // $now_content = json_decode($now_content);
        // $lessons = json_decode($lesson);
        // $course = json_decode($course);
    @endphp
    <div class="sectionNavs">
        @include('pagestudent.navs.navsLeft',[$now_content,$lessons])
    </div>
    <div class="sectionContent">
        <div class="head-text">
            <p>{{ $video->name }}</p>
        </div>

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

        {{-- record bar --}}
        <ul class="navProgress" id="navProgress"></ul>

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
</div>
@endsection

@section('title')
{{$now_content->name}} | MOOC SSRU
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
