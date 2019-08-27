@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        @include('pagestudent.navs.navsLeft',[$now_content,$lessons])
    </div>
    <div class="sectionContent">
        <div class="head-text">
            <p>ชื่อวิดีโอ</p>
        </div>

        <div class="container">
                <div class="embed-responsive embed-responsive-16by9 mt-5">
                        <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
        </div>
    </div>
</div>
@endsection
