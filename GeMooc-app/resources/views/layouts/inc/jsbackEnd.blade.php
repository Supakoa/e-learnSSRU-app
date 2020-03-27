
<script src="{{ asset('node_modules/jquery/dist/jquery.js')}}"></script>
<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
<script src="{{ asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('node_modules/popper.min.js')}}"></script>
<script src="https://unpkg.com/scrollreveal@4"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('node_modules/bootstrap/js/dist/util.js')}}"></script>
<script src="{{ asset('node_modules/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<!-- CEFstyle -->
<script src="{{ asset('node_modules/CEFstyle/navrespone.js') }}"></script>
<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script src="//vjs.zencdn.net/7.3.0/video.min.js"></script>

<script>
    $(document).ready(function () {
        // $('#uploadingFile').modal('show');
    $('#uploadingFile').modal({backdrop: 'static', keyboard: false,show:false});

        $('#closeUploadFile').hide();

    });

    $('form').submit(function (e) {
        console.log('เข้าาาาา');

        $('button[type=submit]').attr('disabled', '');
        setTimeout(function () {
            $('button[type=submit]').removeAttr('disabled');
        }, 1000);
        if ($('#percent').val() != '') {
            $('#Add_Modal_content').modal('hide');
            $('#uploadingFile').modal('show');
        }else{
            Swal.fire({
                title: 'กำลังโหลด (now loading)',
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });
        }
        $('#percent').val('');
    });

    $('.send_ajax').click(function (e) {
        var btn = $(this);
        btn.prop('disabled', true);
        setTimeout(function () {
            btn.prop('disabled', false);
        }, 1000);

    });

</script>

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

</script>
