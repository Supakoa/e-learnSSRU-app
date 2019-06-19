<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/appLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/switch.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEProgress.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEChart.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEQuiz.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">

    {{-- <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-responsive-dt/css/responsive.dataTables.css')}}">
    --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> --}}

    <!-- CEFstyle -->
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEFstyle.css')}}">
    <!-- fontawesom -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{--
        messenger box
    --}}
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/message-box.css')}}">

</head>

<body>
    <div class="wrap">
        <nav class="fixed-top">
            <div class="logo">
                GE-Mooc E-Learning
            </div>
            <ul class="nav-links">
                <!-- Authentication Links -->
                @guest
                <li>
                    <a class="nav-link" href="#">{{ __('Login') }}</a>
                </li>
                @else
                <li>
                    <a href="{{ url('/std_view/subject') }}" class="nav-link"><i class="fas fa-book-open    "></i></a>
                </li>
                <li>
                    <a href="{{ url('/std_view/home') }}" class="nav-link"><i class="fas fa-home"></i></a>
                </li>
                <li class="dropdown" style="display:flex">
                    <img src="https://www.shareicon.net/download/2015/09/18/103157_man_512x512.png" alt="...">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}</i><span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a style="color:black;" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                            {{ __('Log-out ') }} <i class="fas fa-sign-out-alt"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>

        <div class="content container-fluid">

            @yield('content')
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i
                    class="fas fa-arrow-circle-up    "></i></button>

        </div>

    </div>

    <div class="footer">
        <div class="text">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>

        <button class="open-button" id="myButton" onclick="$('#myForm').show();$('#myButton').hide();">send problem <i class="far fa-paper-plane"></i></<i></button>

        <div class="form-popup" id="myForm">
            <form action="/action_page.php" class="form-container">
                <h2>Send Problem</h2>
                <h1><i class="far fa-envelope"></i></h1>
                <hr style="border:3px solid #ddd">

                <label for="email"><b>Topic</b></label>
                <input type="text" placeholder="Enter Email" name="topic" id="topic" required>

                <label for="psw"><b>Description</b></label>
                <textarea class="form-control" name="description" id="description" cols="10" rows="3" required></textarea><hr>

                <button type="submit" class="btn">send <i class="fas fa-paper-plane"></i></button>
                <button type="button" class="btn cancel" onclick="$('#myForm').hide();$('#myButton').show();">close <i class="fas fa-times"></i></button>
            </form>
        </div>

    </div>

    @yield('modal')

    <script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> --}}
    <script src="{{ asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    {{-- <script src="{{ asset('node_modules/datatables.net-responsive/js/dataTables.responsive.js')}}"></script> --}}
    <script src="{{ asset('node_modules/popper.min.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/js/dist/util.js')}}"></script>
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('node_modules/wow.js/dist/wow.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>

    <!-- CEFstyle -->
    {{-- <script src="{{ asset('CEFstyle/CEFstyle.js') }}"></script> --}}
    <script src="{{ asset('node_modules/CEFstyle/navrespone.js') }}"></script>
    <script>
        wow = new WOW({
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0, // default
            mobile: true, // default
            live: true // default
        })
        wow.init();

        function goBack() {
            window.history.back();
        }

    </script>
    <script>
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
                $('#myBtn').fadeIn(200); // Fade in the arrow
            } else {
                $('#myBtn').fadeOut(200); // Else fade out the arrow
            }
        });
        $('#myBtn').click(function () { // When arrow is clicked
            $('body,html').animate({
                scrollTop: 0 // Scroll to top of body
            }, 1800);
        });

    </script>
    @yield('js')
</body>

</html>
