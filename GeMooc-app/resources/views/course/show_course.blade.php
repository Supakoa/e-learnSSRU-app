@inject('content', 'App\content')
@inject('lesson_class', 'App\lesson')
@inject('DB', 'Illuminate\Support\Facades\DB')

@extends('layouts.app')

@section('content')
<div class="card ce-card h-100">
    <div class="justify-content-start">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="row justify-content-center">
        <div class="mb-3">
            <img src="/storage/{{$course->xl_banner}}" class="img-fluid" width="100%" height="auto"
                alt="Responsive image">
        </div>
    </div>
    <h1 class="ce-name">
        Course : {{$course->name}}
    </h1>
        <div class="row mb-3">
            <div class="col-md-2 text-left">
                <button href="#" class="btn btn-md btn-outline-success btn-block">
                    <i class="fas fa-users"></i> Teacher
                </button>
            </div>
            <div class="col-md-10 text-right">
                <div class="ce-card-btn">
                    <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal"
                        data-target="#Add_Modal"> <i class="fas fa-folder-plus"></i> </button>
                    <button href="#" class="btn btn-md btn-outline-warning send_ajax "
                        onclick="edit_course('{{$course->id}}')"> <i class="fas fa-cog"></i></button>
                </div>
            </div>
        </div>
    <div class="row ce-container">
        <div class="col-md-12">
            @if ($lessons->count() > 0)
            <div class="accordion" id="accordionExample">
                @foreach ($lessons as $lesson)
                <div class="card shadow">
                    <div class="card-header " id="heading{{$lesson->id}}">
                        <div class="row">
                            <div class="col-md-8 text-left">
                                <button class="btn btn-block btn-text text-left" type="button" data-toggle="collapse"
                                    data-target="#collapse{{$lesson->id}}" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <span>{{$lesson->name}}: </span>
                                </button>
                            </div>
                            <div class="col-md-3 text-left">
                                <span>
                                    <i class="fas fa-video"> </i>
                                    {{$video = $content::where([['type','1'],['lesson_id',$lesson->id]])->count()}}
                                </span>
                                <span>
                                    <i class="far fa-clipboard"> </i>
                                    {{$article = $content::where([['type','2'],['lesson_id',$lesson->id]])->count()}}
                                </span>
                                <span>
                                    <i class="fas fa-question"> </i>
                                    {{$quiz = $content::where([['type','3'],['lesson_id',$lesson->id]])->count()}}
                                </span>
                            </div>
                            <div class="col-md-1 text-right">
                                <button onclick="delete_lesson('{{$lesson->id}}')"
                                    class="btn btn-block btn-outline-danger btn-md ">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="collapse{{$lesson->id}}" class="collapse border-left border-right border-bottom"
                    aria-labelledby="heading{{$lesson->id}}" data-parent="#accordionExample">
                    <div class="card-body">
                        @php
                        // $names = $content::where('lesson_id',$lesson->id)->get();
                        $names = $lesson->contents;

                        @endphp
                        <ul class="list-group">
                            @if ($names->count()>0)
                            @foreach ($names as $name)
                            @if ($name->type=="1")
                            <li class="list-group-item text-left">
                                <div class="row">
                                    <div class="col-md-1">
                                        <i class="fas fa-video"></i> {{$name->count()}}
                                    </div>
                                    <div class="col-md-9">
                                        <a class="btn btn-block text-left pl-5" href="{{$name->detail}}">
                                            <h4>{{$name->name}}</h4>
                                        </a>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <a href="#" class="btn btn-block btn-outline-danger btn-md ">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @elseif ($name->type=="2")
                            <li class="list-group-item text-left">
                                <div class="row">
                                    <div class="col-md-1">
                                        <i class="far fa-clipboard"></i> {{$name->count()}}
                                    </div>
                                    <div class="col-md-9">
                                        <a class="btn btn-block text-left pl-5"
                                            href="{{url('article/'.$name->detail)}}">
                                            <h4> {{$name->name}}</h4>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#" class="btn btn-block btn-outline-danger btn-md ">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            @else
                            <li class="list-group-item text-left">
                                <div class="row">
                                    <div class="col-md-1">
                                        <i class="fas fa-question"></i> {{$name->count()}}
                                    </div>
                                    <div class="col-md-9">
                                        <a class="btn btn-block text-left pl-5" href="{{url('quiz/'.$name->detail)}}">
                                            <h4> {{$name->name}}</h4>
                                        </a>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <a href="#" class="btn btn-block btn-outline-danger btn-sm ">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                            @else
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Now,Have have a Content !!!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </ul>
                        @endif
                    </div>
                    <hr>
                    <div class=" text-right">
                        <button class=" btn btn-success btn-sm mb-3 mr-3" data-toggle="modal"
                            data-target="#Add_Modal_content" onclick="add_content({{$lesson}})"><i
                                class="fas fa-plus-circle"></i></button>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Now, Not have Lession !!!</strong> Can you click Add button for make new Lession.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
</div>
<div id="div_delete">
</div>
@endsection

@section('modal')
{{-- Add_Modal Lesson --}}
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

{{-- Edit_Modal Content --}}


{{-- Add_Modal Content --}}
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
        $('#lesson_id').val(lesson.id);
        $('#add_content_header').html('Create Content : ' + lesson.name);
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
