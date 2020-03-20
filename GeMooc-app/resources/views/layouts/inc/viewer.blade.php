<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/switch.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEProgress.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEChart.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEQuiz.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">
    @stack('links')
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

    {{--
        plyr .js
    --}}
    <script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />

    @include('inc.google_analytics');
    <script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>





    <script>
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
