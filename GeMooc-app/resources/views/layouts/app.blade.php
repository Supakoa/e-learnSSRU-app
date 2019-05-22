<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">

    <!-- CEFstyle -->
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEFstyle.css')}}">
    <!-- fontawesom -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="fixed-top">
            @guest
            <div class="logo">
                GE-Admin
            </div>
            @else
            <div class="burger2">
                <div class="line4"></div>
                <div class="line5"></div>
                <div class="line6"></div>
            </div>
            @endguest
            <ul class="nav-links ">
                @guest
                @else
                <li>
                    <a href="#" class="nav-link">Supakit</a>
                </li>
                @endguest
                <!-- Authentication Links -->
                @guest
                <li>
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
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
        @guest
        @else
        <section>
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
        </section>
        @endguest

        <main class="content">
            @yield('content')
        </main>

        <div class="footer">
            <div class="text">
                <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('node_modules/popper.min.js')}}"></script>
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('node_modules/wow.js/dist/wow.min.js')}}"></script>
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

    </script>
</body>

</html>
