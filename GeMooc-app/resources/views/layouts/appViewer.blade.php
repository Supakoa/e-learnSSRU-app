<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @include('layouts.inc.viewer')

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
                    <a href="{{ url('/std_view/subject') }}" class="nav-link"><i class="fas fa-book-open"></i></a>
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

        <button class="open-button" id="myButton"
            onclick="$('#myForm').show();$('#myButton').hide();$('#myBtn').hide();"><i
                class="far fa-paper-plane"></i></button>

        <div class="form-popup" id="myForm">
            <form action="/report" method="POST">
                @csrf
                @method('POST')
                <div class="ce-close">
                    <i onclick="$('#myForm').hide();$('#myButton').show();$('#myBtn').show()" class="fas fa-times"></i>
                </div>
                <div class="form-container">
                    <div class="head-popup pb-3">Send Problem <i class="far fa-envelope"></i></div>

                    {{-- hidden item --}}
                    <input type="hidden" name="from_page" id="from_page" value="{{ url()->current() }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">

                    <label for="email" id="a"><b>Topic</b></label>
                    <input type="text" placeholder="Enter Topic" name="topic" id="topic" required>

                    <label for="psw"><b>Description</b></label>
                    <textarea class="form-control" placeholder="Enter Description" name="description" id="description"
                        cols="10" rows="3" required></textarea>

                    <div class="row text-center">
                        <div class="col-md-6 text-right">
                            <button type="submit"  id="sendBtn">send <i
                                    class="fas fa-paper-plane"></i></button>
                        </div>
                        <div class="col-md-6 ">
                            <button type="button" class="cancel"
                                onclick="$('#myForm').hide();$('#myButton').show();$('#myBtn').show()">close <i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    @yield('modal')

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



    @yield('js')
    @yield('js2')

    {{-- script on CEFstyle on node_module --}}
    @stack('script')

</body>

</html>
