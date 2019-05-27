@extends('layouts.app')

@section('content')
<div class="card ce-card h-100">
    <h1 class="ce-name">Subject : {{$sub->name}}</h1>
    <div class="ce-container">
        <div class="justify-content-end row mb-3">
            <div class="ce-card-btn">
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Add_Modal">Add</button>
                <button class="btn btn-outline-warning" data-toggle="modal" data-target="#Edit_Modal">Edit</button>
            </div>
        </div>

        @if ($courses->count() > 0)
        @foreach ($courses as $course)
        <ul class="list-group shadow">
            <li class="list-group-item">
                    <a class="btn btn-block" href="{{url('/course/'.$course->course_id)}}">
                        {{$course->name}}
                    </a>
            </li>
        </ul>
        @endforeach
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
                <form action="{{url('/subject/'.$sub->subject_id)}}" method="POST" enctype='multipart/form-data'
                    id="sub_form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="sub_id" value="{{$sub->subject_id}}">

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
                        <img src="/storage/cover_images/{{$sub->sm_banner}}" alt="" width="100%" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="name">Cover Image</label>
                        <input type="file" class="form-control" name="cover_image" placeholder="Image">
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
@endsection
