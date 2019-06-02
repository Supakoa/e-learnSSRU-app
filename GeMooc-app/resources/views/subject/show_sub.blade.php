@extends('layouts.app')

@section('content')
<div class="card ce-card h-100">
    <div class="justify-content-start mb-2">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <img src="/storage/{{$sub->xl_banner}}" alt="" style="width: 100%;height: auto;">
    <h1 class="ce-name">Subject : {{$sub->name}}</h1>
    <div class="ce-container">
        <div class="justify-content-end row mb-2">
            <div class="ce-card-btn">
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Add_Modal">Add</button>
                <button class="btn btn-outline-warning" data-toggle="modal" data-target="#Edit_Modal">Edit</button>
            </div>
        </div>

        @if ($courses->count() > 0)
        <div class="row mb-3 justify-content-center">
            @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card shadow" style="width: 18rem;">
                    <div class="ce-body-cog">
                        <a href="#" class="ce-cog-btn" onclick="edit_course({{$course}})"><i
                                class="fas fa-cogs"></i></a>
                        <img class="card-img-top" src="/storage/{{$course->sm_banner}}" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$course->name}}</h5>
                        <p class="card-text">{{$course->detail}}</p>
                        <div class="text-right ce-card-btn">
                            <a href="{{url('/course/'.$course->id)}}"
                                class="btn btn-md btn-block btn-outline-warning shadow">
                                <i class="fas fa-pencil-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Your course is empty !!!</strong> Can you click Add button for make your courses.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>
</div>
@endsection

@section('modal')
<div id="div_delete">

</div>

<div class="modal fade " id="Add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/course')}}" method="post" enctype='multipart/form-data' id="course_form">
                    @csrf
                    <input type="hidden" name="sub_id" value="{{$sub->id}}">
                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Course Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" placeholder="Course Detail">
                    </div>

                    <div class="form-group">
                        <label for="name">Cover Image</label>
                        <input type="file" class="form-control btn" style="padding:3px" name="cover_image"
                            placeholder="Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="course_form">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subject -> {{$sub->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="offset-md-8 col-md-2 text-right" style="margin-right:-20px">
                        <span>Online :</span>
                    </div>
                    <div class="col-md-1 ">
                        {{-- <label for="cb4">Online :</label> --}}
                        @php
                        $check = '';
                        if($sub->status!=0){
                            $check = 'checked';
                        }
                        @endphp
                        <input class="tgl tgl-flat" id="cb4" {{$check}} value="1" form="sub_form"  name = 'status'type="checkbox" />
                        <label class="tgl-btn" for="cb4"></label>

                    </div>
                    <div class="col-md-1 text-right">
                    <button onclick="delete_subject('{{$sub->id}}')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
                <form action="{{url('/subject/'.$sub->id)}}" method="POST" enctype='multipart/form-data' id="sub_form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="sub_id" value="{{$sub->id}}">

                    <div class="form-group">
                        <label for="name">Subject Name</label>
                        <input type="text" class="form-control" name="name" value="{{$sub->name}}"
                            placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" value="{{$sub->detail}}"
                            placeholder="Subject Detail">
                    </div>
                    <div class="form-group text-center">
                        <img src="/storage/{{$sub->sm_banner}}" alt="" width="100%" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="name">Cover Image (Small : 400*255) </label>
                        <input type="file" class="form-control" name="cover_image_sm" placeholder="Image">
                    </div>
                    <div class="form-group text-center">
                        <img src="/storage/{{$sub->xl_banner}}" alt="" width="100%" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="name">Cover Image (Large : 1600*600) </label>
                        <input type="file" class="form-control" name="cover_image_xl" placeholder="Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="sub_form" id="sub_btn">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div id="edit_course_div"></div>
@endsection

@section('js')
<script>
    function edit_course(course) {
        check = ''
        if(course.status!=0){
            check = 'checked'
        }
        modal = `
        <div class="modal fade " id="Edit_Course_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="offset-md-8 col-md-2 text-right" style="margin-right:-20px">
                                    <span>Online :</span>
                                </div>
                                <div class="col-md-1">
                                    {{-- <label for="cb4">Online :</label> --}}
                                    <input class="tgl tgl-flat" id="cb5" name='status' value='1' `+check+` form='course_edit_form' type="checkbox" />
                                    <label class="tgl-btn" for="cb5"></label>

                                </div>
                                <div class="col-md-1 text-right">
                                    <button onclick="delete_course('`+course.id+`')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        <form action="{{url('/course/` + course.id + `')}}" method="post" enctype='multipart/form-data'
                            id="course_edit_form">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input type="text" class="form-control" name="name" value="` + course.name + `"
                                    placeholder="Course Name">
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <input type="text" class="form-control" name="detail" value="` + course.detail + `"
                                    placeholder="Course Detail">
                            </div>
                            <div class="form-group text-center">
                                <img src="/storage/` + course.sm_banner + `" alt="" width="100%" srcset="">
                            </div>
                            <div class="form-group">
                                <label for="name">Cover Image (Small : 400*255) </label>
                                <input type="file" class="form-control btn" style="padding:3px" name="cover_image_sm"
                                    placeholder="Image">
                            </div>
                            <div class="form-group text-center">
                                <img src="/storage/` + course.xl_banner + `" alt="" width="100%" srcset="">
                            </div>
                            <div class="form-group">
                                <label for="name">Cover Image (Large : 1600*600) </label>
                                <input type="file" class="form-control btn" style="padding:3px" name="cover_image_xl"
                                    placeholder="Image">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="course_edit_form">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        `;
        $('#edit_course_div').html(modal);
        $('#Edit_Course_Modal').modal('show')
    }

    function delete_subject(id){
        form = `<form action="{{url('subject/` + id + `')}}" method="post" id='form_del_Subject'>
                        @csrf
                        @method('DELETE')
                    </form>`;
        $('#div_delete').html(form);
        Swal.fire({
            title: 'Are you sure?',
            text: "All Course in Subject will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $('#form_del_Subject').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });

    }

    function delete_course(id){
        form = `<form action="{{url('course/` + id + `')}}" method="post" id='form_del_Course'>
                        @csrf
                        @method('DELETE')
                    </form>`;
        $('#div_delete').html(form);
        Swal.fire({
            title: 'Are you sure?',
            text: "All Course in Course will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $('#form_del_Course').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    }
</script>
@endsection
