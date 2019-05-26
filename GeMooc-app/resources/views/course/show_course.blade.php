@inject('content', 'App\content')
@inject('lesson_class', 'App\lesson')



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h2>Course : {{$course->name}}</h2>
                    <div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#Add_Modal">Add
                            Lesson</button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#Edit_Modal">Edit
                            Course</button>
                    </div>
                </div>
                {{-- <div class="card-header">{{$course_name}}
            </div> --}}

            <div class="card-body">
                {{-- {{dd($courses)}} --}}
                <div class="accordion" id="accordionExample">

                @foreach ($lessons as $lesson)
                    <div class="card">
                        <div class="card-header" id="heading{{$lesson->lesson_id}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$lesson->lesson_id}}" aria-expanded="true" aria-controls="collapseOne">
                                {{$lesson->name}}
                                </button>
                                <div class="text-right">
                                <button class=" btn btn-success btn-sm " data-toggle="modal" data-target="#Add_Modal_content" onclick="add_content({{$lesson}})">Add Content</button>
                                </div>

                            </h2>

                        </div>

                        <div id="collapse{{$lesson->lesson_id}}" class="collapse" aria-labelledby="heading{{$lesson->lesson_id}}" data-parent="#accordionExample">
                            <div class="card-body">


                                    @php
                                        $names = $content::where('lesson_id',$lesson->lesson_id)->get();
                                    @endphp

                                    @foreach ($names as $name)
                                       <a href="#"><h4> {{$name->name}}</h4></a>

                                    @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <input type="hidden" name="course_id" value="{{$course->course_id}}">
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
<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/course/'.$course->course_id)}}" method="post" enctype='multipart/form-data'
                    id="course_form">
                    @csrf
                    @method('PATCH')
                    {{-- <input type="hidden" name="sub_id" value="{{$sub->subject_id}}"> --}}

                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" class="form-control" name="name" value="{{$course->name}}"
                            placeholder="Course Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" value="{{$course->detail}}"
                            placeholder="Course Detail">
                    </div>

                    {{-- <div class="form-group">
                    <label for="name">Cover Image</label>
                    <input type="file" class="form-control" name="cover_image" placeholder="Image">
                </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="course_form">Save changes</button>
            </div>
        </div>
    </div>
</div>

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
                <form action="{{url('/lesson')}}" method="post" enctype='multipart/form-data' id="lesson_form">
                    @csrf
                    <input type="hidden" name="lesson_id" id = "lesson_id_con" value="">
                    <div class="form-group">
                        <label for="name">Content Name</label>
                        <input type="text" class="form-control" name="name" placeholder="lesson Name">
                    </div>
                    <div class="form-group">
                            <label for="name">Content type</label>
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

@endsection

@section('js')
    <script>
        function add_content(lesson) {
            $('#lesson_id_con').val(lesson.lesson_id);
            $('#add_content_header').html('Create Content : '+lesson.name);
        }
    </script>
@endsection
