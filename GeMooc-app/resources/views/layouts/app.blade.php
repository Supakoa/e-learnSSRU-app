<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/appLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/switch.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEQuiz.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEProgress.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">
    <!-- CEFstyle -->
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEFstyle.css')}}">

    <!-- fontawesom -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- sweetalert2 naja --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    {{--
        messenger box
    --}}
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/message-box.css')}}">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body>
    <nav class="fixed-top">
        @guest
        <div class="logo">
            GE-Mooc E-Learning
        </div>
        @else
        <div class="burger2">
            <div class="line4"></div>
            <div class="line5"></div>
            <div class="line6"></div>
        </div>
        @endguest
        <ul class="nav-links">
            <!-- Authentication Links -->
            @guest
            <li>
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            {{-- @if (Route::has('register'))
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif --}}
            @else
            <li class="dropdown" style="display:flex">
                @if (auth()->user()->profile->image!=null)
                <img src="/storage/{{ auth()->user()->profile->image }}" alt="...">

                @else
                <img src="https://image.flaticon.com/icons/png/512/126/126327.png" alt="">
                @endif
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a style="color:black" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Log-out ') }}<i class="fas fa-sign-out-alt"></i>
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
    <div class="cebody">
        @guest
        @else
        <section>
            @php
            $both = auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'teach';
            $adminOnly = auth()->user()->type_user == 'admin';
            $teach = auth()->user()->type_user == 'teach';
            @endphp
            <ul class="nav-links2 ">
                {{-- <a href="{{ url('/home')}}">
                <li>
                    DashBoard
                </li>
                </a> --}}
                @if ($both)
                <a href="{{ url('/profile') }}">
                    <li>
                        Your Profile
                    </li>
                </a>
                @endif
                @if ($both)
                <a href="{{ url('/subject')}}">
                    <li>
                        Subject
                    </li>
                </a>
                @endif
                @if ($adminOnly)
                <a href="{{ url('/report')}}">
                    <li>
                        Report
                    </li>
                </a>
                @endif
                @if ($adminOnly)
                <a href="{{ url('/teach')}}">
                    <li>
                        Teach
                    </li>
                </a>
                @endif
                @if ($adminOnly)
                <a href="{{ url('/student')}}">
                    <li>
                        Student
                    </li>
                </a>
                @endif
                {{-- @if ($adminOnly)
                <a href="{{ url('/payment-setting')}}">
                <li>
                    Payment Setting
                </li>
                </a>
                @endif --}}
            </ul>
        </section>
        @endguest
        <div class="content container-fluid">
            @include('inc.alert')
            @yield('content')
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i
                    class="fas fa-arrow-circle-up    "></i></button>
        </div>
    </div>
    <div class="footer">
        <div class="text">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>
    </div>

    @yield('modal')
    <script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
    <script src="{{ asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('node_modules/popper.min.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/js/dist/util.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('node_modules/wow.js/dist/wow.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>

    <!-- CEFstyle -->
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
        $('form').submit(function (e) {

            $('button[type=submit]').attr('disabled', '');
            Swal.fire({
                title: 'Wait a minute !',
                // timer: 2000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                }
            });
        });
        $('.send_ajax').click(function (e) {
            var btn = $(this);
            btn.addClass('.ce-disable', true);
            // btn.prop('disabled',true);
            setTimeout(function () {
                btn.removeClass('.ce-disable', true);
                // btn.prop('disabled',false);
            }, 1000);

            // alert("123");
        });

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


        // window.onscroll = function() {scrollFunction()};

        // function scrollFunction() {
        //   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        //     document.getElementById("myBtn").style.display = "block";
        //   } else {
        //     document.getElementById("myBtn").style.display = "none";
        //   }
        // }
        // function topFunction() {
        //   document.body.scrollTop = 0;
        //   document.documentElement.scrollTop = 0;
        // }

    </script>
    @yield('js')
</body>

</html>
