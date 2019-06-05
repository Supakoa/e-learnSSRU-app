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

    {{-- sweetalert2 naja --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

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
            <li>
                <img src="https://www.shareicon.net/download/2015/09/18/103157_man_512x512.png" alt="...">
            </li>
            <li class="dropdown">
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
            <ul class="nav-links2 ">
                <a href="{{ url('/home')}}">
                    <li>
                        DashBoard
                    </li>
                </a>
                <a href="{{ url('/subject')}}">
                    <li>
                        Subject
                    </li>
                </a>
                <a href="{{ url('/report')}}">
                    <li>
                        Report
                    </li>
                </a>
                <a href="{{ url('/teach')}}">
                    <li>
                        Teach
                    </li>
                </a>
                <a href="{{ url('/student')}}">
                    <li>
                        Student
                    </li>
                </a>
                <a href="{{ url('/payment-setting')}}">
                    <li>
                        Payment Setting
                    </li>
                </a>
            </ul>
        </section>
        @endguest
        <div class="content container-fluid">
            @include('inc.alert')
            @yield('content')
        </div>
    </div>
    <div class="footer">
        <div class="text">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
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
    <script src="{{ asset('node_modules/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> --}}
    {{-- <script src="{{ asset('node_modules/bootstrap-select/dist/js/i18n/defaults-*.min.js')}}"></script> --}}

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
        $('form').submit(function (e) {

            $('button[type=submit]').attr('disabled','');
        });
        $('.send_ajax').click(function (e) {
            var btn = $(this);
            btn.prop('disabled',true);
            setTimeout(function(){
                btn.prop('disabled',false);
            },1000);

            // alert("123");
         });

    </script>
    @yield('js')
</body>

</html>
