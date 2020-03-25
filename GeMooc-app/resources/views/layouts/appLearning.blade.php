<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @include('layouts.inc.learning')
    @stack('css')
    <style>
        .bg-blur {
            background-image: url("@yield('background',url('images/BG.jpg'))");

        }
    </style>
</head>

<body>
    <div class="bg-blur" style="background-image: url('')"></div>
    <div class="cebody">
        @yield('index')
        <button id="myBtn" title="Go to top"><i
            class="fas fa-arrow-circle-up    "></i></button>
        @include('pagestudent.message-box.Message_box')
        <div class="footer">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>
    </div>

    @include('layouts.inc.jslearning')
    @stack('js')
    @stack('script')
    @yield('js')
</body>

</html>
