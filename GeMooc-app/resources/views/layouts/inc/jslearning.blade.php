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
