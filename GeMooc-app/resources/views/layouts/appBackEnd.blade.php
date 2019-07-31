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
    <!-- CEFstyle -->
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEFstyle.css')}}"> --}}

    <!-- CEFstyle -->
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/CEFstyle3.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceMain.css')}}">
    @yield('links')

    {{-- google font --}}
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

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

    {{--
        plyr .js
    --}}
    <script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />

    {{-- edit profile --}}
    @stack('styleEditProfile')
    @stack('scriptEditProfile')

    <script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
</head>

<body>
    <div class="wrap-container">
        <div class="wrap-body">
            <div class="ce-bgimg" style = 'background-image:url("@yield('background','https://www.beartai.com/wp-content/uploads/2016/12/bg-hero.png')")'>
                <div class="bg-blur"></div>
                    @yield('wrap-body')
            </div>
        </div>
        <div class="wrap-footer">
                <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>
    </div>


    @yield('modal')
    <script src="{{ asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('node_modules/popper.min.js')}}"></script>
    <script src="https://unpkg.com/scrollreveal@4"></script>
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
            // alert("123");

            var btn = $(this);
            // btn.addClass('.ce-disable', true);
            btn.prop('disabled',true);
            setTimeout(function () {
                // btn.removeClass('.ce-disable', true);
                btn.prop('disabled',false);
            }, 1000);

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
