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
                @php
                    $both = auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'teach';
                    $adminOnly = auth()->user()->type_user == 'admin';
                @endphp
                @if ($adminOnly)
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Add_Modal">Add</button>
                @endif
                @if ($adminOnly)
                <button class="btn btn-outline-warning send_ajax" onclick="edit_subject({{$sub->id}})">Edit</button>
                @endif
                {{-- <button class="btn btn-outline-warning" data-toggle="modal" data-target="#Edit_Modal">Edit</button> --}}
            </div>
        </div>

        @if ($courses->count() > 0)
        <div class="row mb-3 justify-content-center">
            @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card shadow" style="width: 18rem;">
                    <div class="ce-body-cog">
                        @if ($adminOnly)
                        <a class="ce-cog-btn send_ajax" onclick="edit_course({{$course->id}})"><i
                            class="fas fa-cogs"></i></a>
                        @endif
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
<div id="div_modal"></div>
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

    function edit_course(id) {
        $.ajax({
                type: "post",
                url: "{{url('course/modal/edit')}}",
                data: {id :id},
                dataType: "html",
                success: function (response) {
                $('#div_modal').html(response);
                $('#Edit_Course_Modal').modal("show");
                }
            });
    }
    function edit_subject(id) {
            $.ajax({
                type: "post",
                url: "{{url('subject/modal/edit')}}",
                data: {id :id},
                dataType: "html",
                success: function (response) {
                $('#div_modal').html(response);
                $('#Edit_Modal').modal("show");
                }
            });
        }

</script>
@endsection
