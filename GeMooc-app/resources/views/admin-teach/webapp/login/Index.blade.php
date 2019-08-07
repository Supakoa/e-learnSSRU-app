@extends('layouts.appBackEnd')

@section('wrap-body')
    @include('pagestudent.navs.Navs_login')
    {{-- ลืมรหัสผ่าน --}}
    @include('pagestudent.login.Forget')
    {{-- ลืมรหัสผ่าน --}}
    @include('admin-teach.admin.login.LogInAT')
@endsection

@section('js')
<script>
    $('.btn-forget').click(function (e) {
        e.preventDefault();
        $('.forms-forget-modal').css('margin-left', '0');
        // $('nav').css('display', 'none');
    });
    $(document).ready(function () {
        $('.your-class').slick({
            centerMode: true
        });
    });
    $('.forms-forget-close').click(function (e) {
        e.preventDefault();
        $('.forms-forget-modal').css('margin-left', '-100%');
        // $('nav').css('display', 'flex');
    });

</script>
@endsection
