<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','MOOC SSRU')</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/wow.js/css/libs/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-dt/css/jquery.dataTables.css')}}">
    <!-- CEFstyle -->
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEFstyle.css')}}"> --}}

    {{-- css --}}
    @stack('links')

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

    {{-- messenger box --}}
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/message-box.css')}}">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    {{-- plyr .js --}}
    <script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />

    {{-- edit profile
        @stack('styleEditProfile')
        @stack('scriptEditProfile') --}}

    {{-- new-subject
            @stack('styleNewSubject')
            @stack('scriptNewSubject') --}}

    <script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
</head>

<body>
    <style>
        .bg-blur {
            background-image: url("@yield('background','https://data.1freewallpapers.com/download/pine-forest-path.jpg')");

        }

    </style>
    <div class="bg-blur"></div>
    <div style=" position: absolute;top: 0%;left: 0%;width: 100%;">
        @yield('wrap-body')
        <div class="wrap-footer">
            <p>Copyright © 2019, by CEFstyle ,All rights reserved.</p>
        </div>
    </div>

    {{-- test percent --}}
    <input type="hidden" name="percent" id="percent" value="">

    {{--
            <div class="wrap-container">
                <div class="wrap-body">
                    <div class="ce-bgimg" style = 'background-image:'>
                        <div class="bg-blur"></div>
                        @yield('wrap-body')
                    </div>
                </div>

            </div> --}}

            <script>
                $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM

                });
            </script>


    <!-- Modal -->
    <div class="modal fade" id="uploadingFile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Now uploading</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar"
                            style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            <div id="success"></div>
                    </div>
                </div>
                <div class="modal-footer" id="closeUploadFile">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
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
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!-- CEFstyle -->
    <script src="{{ asset('node_modules/CEFstyle/navrespone.js') }}"></script>
    <script>
        $(document).ready(function () {
            // $('#uploadingFile').modal('show');
        $('#uploadingFile').modal({backdrop: 'static', keyboard: false,show:false});

            $('#closeUploadFile').hide();

        });

        $('form').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar').text('Uploaded');
          $('.progress-bar').css('width', '100%');
          $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          $('#success').append(data.image);
        }
      }
    });



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

        // loading modal [Sweet Alert]
        $('form').submit(function (e) {
            $('button[type=submit]').attr('disabled', '');
            if ($('#percent').val() != '') {
                // alert('51230')
                $('#Add_Modal_content').modal('hide');


                $('#uploadingFile').modal('show');
            }else{
                Swal.fire({
                    title: 'Wait a minute !',
                    // timer: 2000,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });
            }
            $('#percent').val('');
        });

        $('.send_ajax').click(function (e) {
            // alert("123");

            var btn = $(this);
            // btn.addClass('.ce-disable', true);
            btn.prop('disabled', true);
            setTimeout(function () {
                // btn.removeClass('.ce-disable', true);
                btn.prop('disabled', false);
            }, 1000);

        });

    </script>

    {{--
        script file to here
    --}}
    @stack('script')

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
