<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/appLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/switch.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEProgress.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/slick/slick/slick-theme.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('node_modules/3d-slider/style.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEChart.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEQuiz.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEindex.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">

    {{-- <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-responsive-dt/css/responsive.dataTables.css')}}">
    --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> --}}

    <!-- CEFstyle -->
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEF2style.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEFlogin.css')}}">
    <!-- fontawesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    {{--messenger box--}}
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/message-box.css')}}">
    <script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
    <script src="{{ asset('node_modules/slick/slick/slick.js')}}"></script>

</head>

<body>
    <div class="cebody">
        {{-- @guest --}}
        @yield('login')
        {{-- @else --}}
        @yield('index')
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i
            class="fas fa-arrow-circle-up    "></i></button>
        {{-- @endguest --}}
        @include('pagestudent.message-box.Message_box')
        <div class="footer">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>


    </div>


    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> --}}
    <script src="{{ asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    {{-- <script src="{{ asset('node_modules/datatables.net-responsive/js/dataTables.responsive.js')}}"></script> --}}
    <script src="{{ asset('node_modules/popper.min.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/js/dist/util.js')}}"></script>
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('node_modules/wow.js/dist/wow.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
    <script src="{{asset('node_modules/jQueryWaterwheelCarouselPlugin/js/jquery.waterwheelCarousel.min.js')}}"></script>
    <!-- CEFstyle -->
    {{-- <script src="{{ asset('CEFstyle/CEFstyle.js') }}"></script> --}}
    <script src="{{ asset('node_modules/CEFstyle/navrespone.js') }}"></script>
    {{-- <script src="{{ asset('node_modules/slick/slick/jq-migrate.min.js')}}"></script> --}}
    {{-- <script src="{{asset('node_modules/3d-slider/app.js')}}"></script> --}}
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
        $('button .btn-messageBox').click(f v.unction(e) {
            e.preventDefault();
            $('.messageBox-body').css('display', 'none');
        });

        $('.nav-links').fadeIn().delay(1500);
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

        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 35) {
                $('#myButton').animate({
                    'height': '4rem'
                }, 200);
                $('#myButton').css({
                    'background-color': '#ff99ff',
                    "border": "2px solid #fff"
                });
            } else {
                $('#myButton').css({
                    'background': 'rgb(0,0,0,.6)',
                    'border': 'none'
                }, 600);
                $('#myButton').stop().animate({
                    'height': '2rem',
                }, 80);
            }
        });

    </script>

    @yield('js')
</body>

</html>
