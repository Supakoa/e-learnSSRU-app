<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{url('/images/newLogothree.PNG')}}">
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

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/switch.css')}}">

    @stack('css')

    <title>Present Page</title>
</head>
<body>
    @yield('index')


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

    @stack('js')
</body>
</html>


