<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - @yield('title')</title>
    <base href="{{ URL::asset('/')}}" target="_blank">
    <link rel="stylesheet" href="{{ URL::asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">

    <!-- CEFstyle -->
    <link rel="stylesheet" href="{{ URL::asset('node_modules/CEFstyle/CEFstyle.css')}}">
    <!-- fontawesom -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>
    <nav class="fixed-top">
        <div class="burger2">
            <div class="line4"></div>
            <div class="line5"></div>
            <div class="line6"></div>
        </div>
        <ul class="nav-links ">
            <li>
                <a href="#">Supakit</a>
            </li>

            <li>
                <a href="#">Log-out</a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <ul class="nav-links2 list-group">
        <li>
            <a href="#">DashBroad</a>
        </li>
        <li>
            <a href="#">Subject</a>
        </li>
        <li>
            <a href="#">Teach</a>
        </li>
        <li>
            <a href="#">Student</a>
        </li>
        <li>
            <a href="#">Payment Setting</a>
        </li>
        <li>
            <a href="#">Report</a>
        </li>
    </ul>
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>


    <div class="footer">
        <div class="text">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>
    </div>

    <script src="{{ URL::asset('node_modules/jquery/dist/jquery.js')}}"></script>
    <script src="{{ URL::asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('node_modules/popper.js/dist/popper.min.js')}}"></script>
    <script src="{{ URL::asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ URL::asset('node_modules/wow.js/dist/wow.min.js')}}"></script>
    <!-- CEFstyle -->
    {{-- <script src="{{ URL::asset('CEFstyle/CEFstyle.js') }}"></script> --}}
    <script src="{{ URL::asset('node_modules/CEFstyle/navrespone.js') }}"></script>
    <script>
        wow = new WOW({
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0, // default
            mobile: true, // default
            live: true // default
        })
        wow.init();

    </script>
</body>

</html>
