@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/video/navProgress/nav.css')}}">
@endpush

@section('mainContent')
<div class="containerContent row">
    @php
        // decode json
        $content = json_decode($content);
        $video = json_decode($video);
        $userId = json_decode($userId);
        $issetRecord = json_decode($issetRecord);
        $record = json_decode($record);
    @endphp
    <div class="sectionNavs col-xl-3">
        @include('pagestudent.navs.navsLeft',[$now_content,$lessons])
    </div>
    <div class="sectionContent col-xl-9">
        <div class="head-text">
            <p class="text-justify text-center">{{ $video->name }}</p>
        </div>
        <div class="container mt-5">
            @if ( $video->type == 'youtube' )
            {{--
                youtube
            --}}
            <div class="plyr__video-embed" id="player1">
                <iframe id="showVideo"  src="" allowfullscreen allowtransparency
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
        {{-- <ul class="navProgress" id="navProgress"></ul> --}}
        <div class="navProgress"></div>

            {{-- record bar --}}
            <ul class="navProgress" id="navProgress"></ul>
        </div>
    </div>
</div>
@endsection

@section('title')
{{$now_content->name}} | MOOC SSRU
@endsection

@push('script')
<script>
    $('#tag').val($('#tag'));

    // starting variable [Global]
    let issetRecord = {!! json_encode($issetRecord) !!};
    let content = {!! json_encode($content) !!}
    let userId = {!! json_encode($userId) !!}
    let video = {!! json_encode($video) !!};
    let record = {!! json_encode($record) !!};
    let urlRecord = '{{ url('/record') }}';
    let callRecord = '{{ url('/callRecordBar') }}';
</script>
<script src="{{ asset('node_modules/CEFstyle/video/view/index.js')}}"></script>
@endpush
