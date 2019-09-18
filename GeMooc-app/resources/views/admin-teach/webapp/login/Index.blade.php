@extends('layouts.appBackEnd')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/mobile/mobileLogin.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/CEFstyle3.css')}}">
@endpush

@section('wrap-body')
@include('pagestudent.navs.Navs_login')

@include('admin-teach.webapp.login.LoginAT')
{{-- @include('') --}}
@endsection

@push('js')
<script>

    $(document).ready(function () {
        $('.your-class').slick({
            centerMode: true
        });
    });
</script>
@endpush
