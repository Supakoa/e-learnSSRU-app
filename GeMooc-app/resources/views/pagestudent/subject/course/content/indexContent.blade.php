@extends('pagestudent.index')
@section('title')
{{$course->name}} | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        @include('pagestudent.navs.navsLeft',[$lessons])
    </div>
    <div class="sectionContent">
        <div class="card">
            <div class="head-card">
                <p>{{$course->name}}</p>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection
