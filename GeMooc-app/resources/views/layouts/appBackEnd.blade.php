<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','MOOC SSRU')</title>
    @include('layouts.inc.backend')

</head>

<body>
    <style>
        .bg-blur {
            background-image: url("@yield('background',url('images/BG.jpg'))");

        }

    </style>

    <div class="bg-blur"></div>

    <div id="bodyLearning" style=" position: absolute;top: 0%;left: 0%;width: 100%;">
        @yield('wrap-body')
        <div class="wrap-footer">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>
    </div>

    {{-- test percent --}}
    <input type="hidden" name="percent" id="percent" value="">


@yield('modal')

@include('layouts.inc.jsbackEnd')

    @yield('js')
</body>
</html>
