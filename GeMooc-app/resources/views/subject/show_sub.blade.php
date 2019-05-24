@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-baseline">
                            <h2>Course : {{$sub->name}}</h2>
                            <div>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#Add_Modal">Add Course</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#Edit_Modal">Edit Subject</button>
                            </div>
                    </div>
                <div class="card-body">
                    {{-- {{dd($courses)}} --}}
                    @foreach ($courses as $course)
                        <a href="{{url('/course/'.$course->course_id)}}">
                            {{$course->name}}
                        </a>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="Add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <input type="hidden" name="sub_id" value="{{$sub->subject_id}}">
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
                        <input type="file" class="form-control" name="cover_image" placeholder="Image">
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Subject -> {{$sub->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/subject')}}" method="post" enctype='multipart/form-data' id="sub_form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Subject Name</label>
                    <input type="text" class="form-control" name="name" value="{{$sub->name}}" placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" value="{{$sub->detail}}" placeholder="Subject Detail">
                    </div>
                    <div class="form-group">
                        <img src="" alt="" sizes="" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="name">Cover Image</label>
                        <input type="file" class="form-control" name="cover_image" placeholder="Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sub_btn">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection


