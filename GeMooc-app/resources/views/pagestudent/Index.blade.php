@extends('layouts.appLearning')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEindex.css')}}">
@endpush

@section('index')

<div class="bg-blur"></div>
@include('pagestudent.include.navbar')

<div class="index-body">
    <div class="index-content">
        @include('inc.alert')
        @yield('mainContent')
    </div>
</div>
@endsection

@section('js')

@endsection
