@extends('admin-teach.webapp.content.Index')

@section('background')
background-image:url("{{url('storage/'.$course->image)}}")
@endsection

@section('links')

@endsection
@section('main-content')
<div class="main-content-header">
    <div class="row">
        <div class="col-md-4">
            <div class="text-left ml-5 mt-3">
                <a href="#" class="ml-5"><i class="fas fa-chevron-left"></i></a>
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
            <button class="btn-edit send_ajax" onclick="edit_course('{{$course->id}}')"><i
                    class="fas fa-cog    "></i></button>
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
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fas fa-video"></i>
                                    {{$lesson->contents->where('type','1')->count()}}
                                </label>
                            </div>
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fas fa-clipboard-list"></i>
                                    {{$lesson->contents->where('type','2')->count()}}
                                </label>
                            </div>
                            <div class="col-md-4 icon-status">
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
                            onclick="window.location.href='{{url('content/'.$content->id.'editor')}}'">{{$content->name}}</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Create lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/lesson')}}" method="post" enctype='multipart/form-data' id="lesson_form">
                    @csrf
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <div class="form-group">
                        <label for="name">lesson Name</label>
                        <input type="text" class="form-control" name="name" placeholder="lesson Name">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="lesson_form">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_lesson_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_lesson_text">Edit Lesson Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_lesson" action="" method="post" enctype='multipart/form-data' id="lesson_form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="lesson_id" id="lesson_id_edit" value="">
                    <div class="form-group">
                        <label for="name">lesson Name</label>
                        <input type="text" class="form-control" name="name" id="lesson_name" placeholder="lesson Name">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form_edit_lesson">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Add_Modal_content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_content_header"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/content')}}" method="post" enctype='multipart/form-data' id="content_form">
                    @csrf
                    <input type="hidden" name="lesson_id" id="lesson_id" value="">
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <div class="form-group">
                        <label for="name">Content Name</label>
                        <input type="text" class="form-control" name="name" placeholder="content Name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Content type</label>
                        <select name="type" id="content_type" class="form-control" required>
                            <option value="" disabled selected>Type</option>
                            <option value="1">Video</option>
                            <option value="2">Text</option>
                            <option value="3">Quiz</option>
                        </select>
                        {{-- <input type="text" class="form-control" name="name" placeholder="content Name"> --}}
                    </div>
                    <div class="form-group" id="content_url">

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary" form="content_form">Save changes</button>
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

    });



    function add_content(lesson) {
        // alert(lesson)
        $('#lesson_id').val(lesson.id);
        $('#add_content_header').html('Create Content : ' + lesson.name);
    }

    function edit_lesson(lesson) {
        // alert(lesson)
        $('#form_edit_lesson').attr('action', '{{url('')}}/lesson/'+lesson.id);
        $('#lesson_id_edit').val(lesson.id);
        $('#lesson_name').val(lesson.name);

        $('#edit_lesson_text').html('Edit : ' + lesson.name);
    }
    // $('#content_url').hide();
    $('#content_type').change(function (e) {
        e.preventDefault();

        if ($(this).val() == '1') {
            $('#content_url').html(
                '<label for="url">URL Video</label><input type="text" class="form-control" name="url" placeholder="content Name" required>'
            );
        } else {
            $('#content_url').html('');
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
