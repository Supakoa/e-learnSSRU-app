@extends('admin-teach.webapp.content.Index')

@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@section('title')
{{$course->name}} - MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceModal.css')}}">
@endpush
@section('main-content')
<a href="{{url('/subject')}}">วิชา</a> / <a href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}}
</a>/ <a href="{{url('/course/'.$course->id)}}">{{$course->name}}</a>

<div class="main-content-header">
    <div class="row">
        <div class="col-md-4">
            <div class="text-left ml-5 mt-3">
                {{-- <i href="#" class="ml-5 btn-back"><i class="fas fa-chevron-left"></i></i> --}}
            </div>
        </div>
        <div class="col-md-4">
            <p id="your_course">{{$course->name}}</p>
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
            <button class="btn-edit send_ajax" onclick="edit_course('{{$course->id}}')">
                <i class="fas fa-cog    "></i></button>
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
                        <div class="col-md-6 row">
                            <div class="col-md-6 icon-status">
                                <button id="edit-btn" data-toggle="modal" data-target="#edit_lesson_Modal"
                                    onclick="edit_lesson({{$lesson}})">
                                    <i class="fas fa-pencil-alt    "></i>
                                </button>
                            </div>
                            <div class="col-md-6 icon-status">
                                <button id="trash-btn" onclick="delete_lesson('{{$lesson->id}}')" aria-hidden="true">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapse{{$lesson->id}}" class="container bg-gray collapse border p-5"
            aria-labelledby="heading{{$lesson->id}}" data-parent="#accordionExample">
            @foreach ($lesson->contents as $content)
            <div class="course-content-collapse shadow">
                <div class="course-collapse-body">
                    <div class="collapse-1">
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
                    <div class="collapse-2">
                        <button
                            onclick="window.location.href='{{url('content/'.$content->id)}}'">{{$content->name}}</button>
                    </div>
                    <div class="collapse-3">
                        <button onclick="delete_content('{{$content->id}}')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            <button class="add-content" data-toggle="modal" data-target="#Add_Modal_content"
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nameLession">ชื่อบทเรียน</label>
                            <input class="form-control" id="nameLession" type="text">
                        </div>
                    </div>
                </div>
                {{-- <form action="{{url('/lesson')}}" method="post" enctype='multipart/form-data' id="lesson_form">
                @csrf
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <div class="form-group">
                    <label for="name">lesson Name</label>
                    <input type="text" class="form-control" name="name" placeholder="lesson Name">
                </div>
                </form> --}}
            </div>
            <div class="modal-footer text-left">
                <div class="row">
                    <div class="col-md-12">
                            <button class="cebtn-save">บันทึก</button>
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
                                <input type="text" class="form-control" name="name" id="lesson_name" placeholder="lesson Name">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">ชื่อบทเรียน</label>
                                <input type="text" class="form-control"  id="nameLesson" name="name" placeholder="content Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="select-type">เลือกประเภทบทเรียน</label>
                            <div class="row" id="select-type">
                                <div class="col-md-4 text-center">
                                    <button class="btnVideo" type="button" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="false" aria-controls="collapseVideo">
                                        <i class="fas fa-video"></i>
                                    </button>
                                    <p class="p-2">วิดีโอ</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button class="btnText" type="button" data-toggle="collapse" data-target="#collapseText" aria-expanded="false" aria-controls="collapseText">
                                        <i class="fas fa-clipboard    "></i>
                                    </button>
                                    <p class="p-2">บทความ</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button class="btnQuestion" type="button" data-toggle="collapse" data-target="#collapseQuiz" aria-expanded="false" aria-controls="collapseQuiz">
                                        <i class="fas fa-question    "></i>
                                    </button>
                                    <p class="p-2">แบบฝึกหัด</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="collapse p-0" id="collapseVideo">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="youtubeLink">ลิงค์วิดีโอจากยูทูป</label>
                                                <input type="text" id="youtubeLink" class="form-control">
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
                                                        <label for="detailQuiz" style="font-size:15px">รายละเอียด</label>
                                                        <textarea class="form-control" name="" id="detailQuiz" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="setTimequiz" style="font-size:15px">ตั้งเวลาในการตอบคำถาม</label>
                                                        <input type="time" id="setTimequiz" name="setTimequiz"
                                                                   min="00:15" max="03:00" required>
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
                    {{-- <div class="form-group">
                        <label for="name">Content type</label>
                        <select name="type" id="content_type" class="form-control" required>
                            <option value="" disabled selected>Type</option>
                            <option value="1">Video</option>
                            <option value="2">Text</option>
                            <option value="3">Quiz</option>
                        </select>

                        <div id="typeVideo">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="videoType" id="videoTypeYoutube" value="youtube" >
                                <label for="videoTypeYoutube" class="custom-control-label">Youtube</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="videoType" id="videoTypeFile" value="file" >
                                <label for="videoTypeFile" class="custom-control-label">File</label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group" id="content_url">

                    </div> --}}

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="cebtn-save" form="content_form">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div id="div_modal"></div>
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

    // onchange to open video contentName
    // $('#content_url').hide();
    $('#content_type').change(function (e) {
        e.preventDefault();

        if ($(this).val() == '1') {
            $('#typeVideo').show();
            $('#content_url').show();
        } else {
            $('#typeVideo').hide();
            $('#content_url').hide();
        }
    });

    $('input[name=videoType]').change(function (e) {
        e.preventDefault();

        $('#content_url').show();

        let videoType = $('input[name=videoType]:checked').val();

        switch (videoType) {
            case 'youtube':
                $('#content_url').html(
                    '<label for="url">URL Video</label><input type="text" class="form-control" name="url" placeholder="content Name" required>'
                );
                break;

            case 'file':
                $('#content_url').html('<label for="url">File Video</label><input type="file" class="form-control" name="videoFile" id="videoFile" required>');
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
            title: 'Are you sure?',
            text: "All Contents in Lesson will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $('#form_del_lesson').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
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

</script>
@endsection
