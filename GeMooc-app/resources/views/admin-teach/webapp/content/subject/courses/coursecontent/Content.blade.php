@extends('admin-teach.webapp.content.Index')

@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@section('title')
{{$course->name}} | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceModal.css')}}">
@endpush
@section('main-content')
<a class="badge badge-dark" href="{{url('/subject')}}">วิชา</a> / <a class="badge badge-dark" href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}}
</a>/ <a class="badge badge-dark" href="{{url('/course/'.$course->id)}}">{{$course->name}}</a>

<div class="main-content-header">
    <div class="row">
        <div class="col-md-4">
            <div class="text-left ml-5 mt-3">
                {{-- <i href="#" class="ml-5 btn-back"><i class="fas fa-chevron-left"></i></i> --}}
            </div>
        </div>
        <div class="col-md-4">
            <p class="t-shadow" id="your_course">{{$course->name}}</p>
            <div class="underline-title"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row m-3">
        <div class="col-md-4">
            <button class="btn-add" onclick=" window.location.href = ' {{url('course/'.$course->id.'/users')}} '">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </button>
        </div>
        <div class="col-md-4 offset-md-4 text-right">
            <button class="btn-add" data-toggle="modal" data-target="#Add_Modal"><i
                    class="fas fa-folder-plus"></i></button>
                    @php
                    $both = auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'teach';
                    $adminOnly = auth()->user()->type_user == 'admin';
                    @endphp
                    @if (  $adminOnly)
            <button class="btn-edit send_ajax" onclick="edit_course('{{$course->id}}')">
                <i class="fas fa-cog    "></i></button>
                @endif
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        @foreach ($lessons as $key=>$lesson)
        <div class="course-content shadow" id="heading{{$lesson->id}}">
            <div class="content">
                <div class="content-header" data-toggle="collapse" data-target="#collapse{{$lesson->id}}"
                    aria-expanded="true" aria-controls="collapse{{$lesson->id}}">
                    <p>บทที่ {{($key+1).' '.$lesson->name}} </p>
                </div>
                <div class="content-tail">
                    <div class="row">
                        <div class="col-md-6 row">
                            <div class="col-md-4 icon-status" id="ics">
                                <label>
                                    <i class="fas fa-video"></i>
                                    {{$lesson->contents->where('type','1')->count()}}
                                </label>
                            </div>
                            <div class="col-md-4 icon-status" id="ics">
                                <label>
                                    <i class="fas fa-clipboard-list"></i>
                                    {{$lesson->contents->where('type','2')->count()}}
                                </label>
                            </div>
                            <div class="col-md-4 icon-status" id="ics">
                                <label>
                                    <i class="fa fa-question" aria-hidden="true"></i>
                                    {{$lesson->contents->where('type','3')->count()}}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 row justify-content-center">
                            <div class="col-md-5 icon-status p-1">
                                <button id="edit-btn" data-toggle="modal" data-target="#edit_lesson_Modal"
                                    onclick="edit_lesson({{$lesson}})">
                                    <i class="fas fa-pencil-alt    "></i>
                                </button>
                            </div>
                            <div class="col-md-5 icon-status p-1">
                                <button id="trash-btn" onclick="delete_lesson('{{$lesson->id}}')" aria-hidden="true">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button class="add-content rounded-circle" style="top:40%" data-toggle="modal" data-target="#Add_Modal_content" onclick="add_content({{$lesson}})">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapse{{$lesson->id}}" class="container bg-gray collapse border"
            aria-labelledby="heading{{$lesson->id}}" data-parent="#accordionExample">
            <script>
                    $(document).ready(function () {
                        var el = document.getElementById('sortable{{$lesson->id}}');
                        var sortable = Sortable.create(el,{
                            onUpdate: function(evt) {
                            var order = sortable.toArray();
                            // console.log(order);
                            change_order("{{$lesson->id}}",order)
                            }
                        });
                    });

                </script>
            <div class="container" id="sortable{{$lesson->id}}">

                @foreach ($lesson->contents as $content)
                <div class="course-content-collapse shadow" data-id = "{{ $content->id}}">
                    <div class="course-collapse-body">
                        <div class="row h-100 m-auto">
                            <div class="col-lg-1 collapse-1">
                                <label>
                                    @switch($content->type)
                                    @case(1)
                                    <i class="fas fa-video"></i>
                                    @break
                                    @case(2)
                                    <i class="fas fa-clipboard-list"></i>
                                    @break
                                    @case(3)
                                    <i class="fa fa-question" aria-hidden="true"></i>
                                    @break
                                    @default

                                    @endswitch
                                </label>
                            </div>
                            <div class="collapse-2 col-lg-8 ">
                                <a href="#" class="btn btn-block p-2"
                                    onclick="window.location.href='{{url('content/'.$content->id)}}'">{{$content->name}}</a>
                            </div>
                            <div class="collapse-3 col-lg-3">
                                <button onclick="delete_content('{{$content->id}}')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="add-content rounded-circle" data-toggle="modal" data-target="#Add_Modal_content"
                onclick="add_content({{$lesson}})"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        @endforeach
    </div>
</div>
<div id="div_delete">
</div>
@endsection
@section('modal')
<div class="modal fade" id="Add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="course-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">สร้างบทเรียน</h5>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{url('/lesson')}}" method="post" enctype='multipart/form-data' id="lesson_form">
                    @csrf
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nameLession">ชื่อบทเรียน</label>
                                <input class="form-control" id="nameLession" name="name" type="text" placeholder="ชื่อบทเรียน">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-left">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" form="lesson_form" class="cebtn-save">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_lesson_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="course-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="">เปลี่ยนชื่อบทเรียน</h5>
                </div>
            </div>
            <div class="modal-body">
                <form id="form_edit_lesson" action="" method="post" enctype='multipart/form-data' id="lesson_form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="lesson_id" id="lesson_id_edit" value="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="lesson_name"
                                    placeholder="lesson Name">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="cebtn-save" form="form_edit_lesson">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Add_Modal_content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="course-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="">เพิ่มเนื้อหาในบทเรียน</h5>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{url('/content')}}" method="post" enctype='multipart/form-data' id="content_form">
                    @csrf
                    <input type="hidden" name="lesson_id" id="lesson_id" value="">
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="type" id="content_type" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">ชื่อบทเรียน</label>
                                <input type="text" class="form-control" id="nameLesson" name="name"
                                    placeholder="content Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="select-type">เลือกประเภทบทเรียน</label>
                            <div class="row" id="select-type">
                                <div class="col-md-4 text-center">
                                    <button class="btnTypeContent" type="button" data-toggle="collapse"
                                        data-target="#collapseVideo" onclick="typeVideo()" aria-expanded="true"
                                        aria-controls="collapseVideo">
                                        <i class="fas fa-video"></i>
                                    </button>
                                    <p class="p-2">วิดีโอ</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button class="btnTypeContent" type="button" data-toggle="collapse"
                                        data-target="#collapseText" onclick="$('#content_type').val(2).change()"
                                        aria-expanded="true" aria-controls="collapseText">
                                        <i class="fas fa-clipboard    "></i>
                                    </button>
                                    <p class="p-2">บทความ</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button class="btnTypeContent" type="button" data-toggle="collapse"
                                        data-target="#collapseQuiz" onclick="$('#content_type').val(3).change()"
                                        aria-expanded="true" aria-controls="collapseQuiz">
                                        <i class="fas fa-question    "></i>
                                    </button>
                                    <p class="p-2">แบบฝึกหัด</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 collapse-hide">
                                    <div class="collapse p-0" id="collapseVideo">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div id="typeVideo">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio"
                                                            name="videoType" id="videoTypeYoutube" value="youtube"
                                                            required>
                                                        <label for="videoTypeYoutube"
                                                            class="custom-control-label">Youtube</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" type="radio"
                                                            name="videoType" id="videoTypeFile" value="file" required>
                                                        <label for="videoTypeFile"
                                                            class="custom-control-label">File</label>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="content_url">

                                                </div>
                                                {{-- <label for="youtubeLink">ลิงค์วิดีโอจากยูทูป</label>
                                                <input type="text" id="youtubeLink" class="form-control"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse" id="collapseText">
                                        <div class="card-body">
                                            Next to Text page >>
                                        </div>
                                    </div>
                                    <div class="collapse p-0" id="collapseQuiz">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="detailQuiz"
                                                            style="font-size:15px">รายละเอียด</label>
                                                        <textarea class="form-control" name="detail" id="detailQuiz"
                                                            rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="setTimequiz"
                                                            style="font-size:15px">ตั้งเวลาในการตอบคำถาม</label>
                                                        <input type="number"style="width :80%"  id="setTimequiz" name="time" required>
                                                        <small>นาที</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button onclick="setPercent()" type="submit" class="btn btn-outline-primary" form="content_form">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

<div id="div_modal"></div>

<!-- Modal -->
<div class="modal fade" id="uploadingFile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
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
                    <br><br>

                </div>

                <div id="success"></div>
            </div>
            <div class="modal-footer" id="closeUploadFile">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#typeVideo').hide();
        $('.btnTypeContent').click(function () {
            $('.collapse-hide .collapse').collapse('hide');
            // $('.collapse-hide .collapse').hide();

            // $(this).collapse('show');
            // $(this).collapse('show');

        });
    });

    function add_content(lesson) {
        // alert(lesson)
        $('#lesson_id').val(lesson.id);
        $('#add_content_header').html('Create Content : ' + lesson.name);
    }

    function edit_lesson(lesson) {
        // alert(lesson)
        $('#form_edit_lesson').attr('action', '{{url('')}}/lesson/' + lesson.id);
        $('#lesson_id_edit').val(lesson.id);
        $('#lesson_name').val(lesson.name);

        $('#edit_lesson_text').html('Edit : ' + lesson.name);
    }
    function change_order(lesson_id,order){
        console.log(lesson_id +" : " + order);
        $.ajax({
            type: "post",
            url: "{{url('content/order_update')}}",
            data: {
                id: lesson_id,
                order :order
            },
            dataType: "html",
            success: function (response) {
                Swal.fire(
                    'Updated!',
                    response,
                    'success'
                )
            }
        });

    }
    function setPercent() {
        if ($('input[name=videoType]:checked').val() == 'file') {
            $('#percent').val('0%');
            console.log($('#videoFile'));
        }
    }
    // onchange to open video contentName
    // $('#content_url').hide();
    $('#content_type').change(function (e) {

        e.preventDefault();
        // $('.collapse-hide .collapse').hide();
        // alert($(this).val());
        switch ($(this).val()) {
            case '1':
                $('#videoTypeYoutube').removeAttr('disabled');
                $('#videoTypeFile').removeAttr('disabled');
                $('#setTimequiz').attr('disabled', 'true')
                break;
            case '2':
                // $('.collapse-hide #collapseText').show();
                $('#videoTypeYoutube').attr('disabled', 'true')
                $('#videoTypeFile').attr('disabled', 'true')
                $('#setTimequiz').attr('disabled', 'true')
                break;
            case '3':
                $('#videoTypeYoutube').attr('disabled', 'true')
                $('#videoTypeFile').attr('disabled', 'true')
                $('#setTimequiz').removeAttr('disabled');


                break;

            default:
                break;
        }
    });

    function typeVideo() {
        $('#content_type').val(1).change();
        $('#typeVideo').show();
        $('#content_url').show();
    }

    $('input[name=videoType]').change(function (e) {
        e.preventDefault();

        $('#content_url').show();

        let videoType = $('input[name=videoType]:checked').val();

        switch (videoType) {
            case 'youtube':
                $('#content_url').html(
                    '<label for="url">URL Video</label><input type="text" class="form-control input-modal" name="url" placeholder="content Name" required>'
                );
                break;

            case 'file':
                $('#content_url').html(
                    '<label for="url">File Video</label><input type="file" class="form-control input-modal" name="videoFile" id="videoFile" required>'
                    );
                break;
        }
    });

    function delete_lesson(id) {
        form = `<form action="{{url('lesson/` + id + `')}}" method="post" id='form_del_lesson'>
                        @csrf
                        @method('DELETE')
                    </form>`;
        $('#div_delete').html(form);
        Swal.fire({
            title: 'ยืนยันการลบ?',
            text: "ข้อมูลจะถูกลบออกจากฐานข้อมูล",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ลบ',
            cancelButtonText: 'ยกเลิก',
        }).then((result) => {
            if (result.value) {

                $('#form_del_lesson').submit();

            }
        });
    }

    function delete_content(id) {
        form = `<form action="{{url('content/` + id + `')}}" method="post" id='form_del_content'>
                        @csrf
                        @method('DELETE')
                    </form>`;

        $('#div_delete').html(form);
        Swal.fire({
            title: 'Are you sure?',
            text: "Contents will be deleted. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $('#form_del_content').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    }

    function edit_course(id) {
        $.ajax({
            type: "post",
            url: "{{url('course/modal/edit')}}",
            data: {
                id: id
            },
            dataType: "html",
            success: function (response) {
                $('#div_modal').html(response);
                $('#Edit_Course_Modal').modal("show");
            }
        });
    }


    $('#content_form').ajaxForm({

        beforeSend: function () {
            $('#success').empty();

        },
        uploadProgress: function (event, position, total, percentComplete) {
            $('.progress-bar').text(percentComplete + '%');
            $('.progress-bar').css('width', percentComplete + '%');
        },
        success: function (data) {
            if (data.success) {
                Swal.fire({
                    type: 'success',
                    title: 'สำเร็จ',
                    text: '' + data.success,
                    timer: 1500
                }).then((result) => {
                    location.reload();

                })

            }
            if (data.errors) {
                $('.progress-bar').text('0%');
                $('.progress-bar').css('width', '0%');
                $('#success').html('<span class="text-danger"><b>' + data.errors + '</b></span>');
            }



        },
        error: function (data) {
            Swal.fire(
                'เกิดข้อผิดพลาด',
                ' ' + data,
                'error'
            ).then((result) => {
                location.reload();
            })

        },

    });

</script>
@endsection
