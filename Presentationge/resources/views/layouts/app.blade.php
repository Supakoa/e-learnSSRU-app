<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presntation Ge-MOOC</title>
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/appLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/switch.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEQuiz.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEProgress.css')}}">
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

</head>

<body>
    <div class="ce-wrap">
        <nav class="fixed-top">
            <div class="logo">
                <a href="#banner">Presentation</a>
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#subject">Subject</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#fq">F&Q</a></li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>

        <div class="ce-content pt-5">
            @yield('content')
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i
                    class="fas fa-arrow-circle-up    "></i></button>
        </div>

        <div class="footer">
            <p>Footer</p>
        </div>
    </div>
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

        $(function () {
            $(".box").draggable();
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
        $('a[href*="#"]').on('click', function (e) {
            e.preventDefault()
            $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top,
                },
                400,
                'linear'
            )
        })

    </script>
</body>

</html>
