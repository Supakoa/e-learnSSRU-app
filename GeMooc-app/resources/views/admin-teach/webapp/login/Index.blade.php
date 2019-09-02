@extends('layouts.appBackEnd')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/CEFstyle3.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/CEFlogIn.css')}}">
@endpush

@section('wrap-body')
@include('pagestudent.navs.Navs_login')

@include('admin-teach.webapp.login.LoginAT')
{{-- @include('') --}}
@endsection

@push('js')
<script>
    // $('.btn-forget').click(function (e) {
    //     e.preventDefault();
    //     $('.forms-forget-modal').css('margin-left', '0');
    //     // $('nav').css('display', 'none');
    // });
    $(document).ready(function () {
        $('.your-class').slick({
            centerMode: true
        });
    });
    // $('.forms-forget-close').click(function (e) {
    //     e.preventDefault();
    //     $('.forms-forget-modal').css('margin-left', '-100%');
    //     // $('nav').css('display', 'flex');
    // });

</script>
@endpush
