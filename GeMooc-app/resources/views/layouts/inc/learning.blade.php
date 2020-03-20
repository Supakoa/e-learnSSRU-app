<link rel="shortcut icon" href="{{url('/images/newLogothree.PNG')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
{{-- <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}"> --}}
<link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/switch.css')}}">


{{-- <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-responsive-dt/css/responsive.dataTables.css')}}">--}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> --}}

@stack('links')

<!-- CEFstyle -->
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/CEF2style.css')}}">
{{-- <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/CEFlogin.css')}}"> --}}
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEFlogin.css')}}">
<!-- fontawesom -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

{{--messenger box--}}
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/message-box.css')}}">
<script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
<script src="{{ asset('node_modules/slick/slick/slick.js')}}"></script>

{{-- plyr --}}
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
<script src="https://cdn.plyr.io/3.5.6/plyr.polyfilled.js"></script>


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
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
<!-- CEFstyle -->
{{-- <script src="{{ asset('CEFstyle/CEFstyle.js') }}"></script> --}}
{{-- <script src="{{ asset('node_modules/CEFstyle/navrespone.js') }}"></script> --}}
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
    // $('button .btn-messageBox').click(f v.unction(e) {
    //     e.preventDefault();
    //     $('.messageBox-body').css('display', 'none');
    // });

    // $('.nav-links').fadeIn().delay(1500);
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