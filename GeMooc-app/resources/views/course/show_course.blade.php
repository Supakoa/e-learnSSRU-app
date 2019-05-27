@inject('content', 'App\content')
@inject('lesson_class', 'App\lesson')

@extends('layouts.app')

@section('content')
<div class="card ce-card h-100">
    <h1 class="ce-name">
        Course : {{$course->name}}
    </h1>
    <div class="row justify-content-end">
        <div class="ce-card-btn">
            <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_Modal"> <i
                    class="fas fa-folder-plus"></i> </button>
            <button href="#" class="btn btn-md btn-outline-warning" data-toggle="modal" data-target="#Edit_Modal"> <i
                    class="fas fa-cog"></i></button>
        </div>
    </div>
    <div class="row ce-container">
        <div class="col-md-12">
            @if ($lessons->count() > 0)
            <div class="accordion" id="accordionExample">
                @foreach ($lessons as $lesson)
                <div class="card">
                    <div class="card-header" id="heading{{$lesson->lesson_id}}">
                            <button class="btn btn-block btn-text text-left" type="button" data-toggle="collapse"
                                data-target="#collapse{{$lesson->lesson_id}}" aria-expanded="true"
                                aria-controls="collapseOne">
                                {{$lesson->name}}
                            </button>
                    </div>
                </div>
                <div id="collapse{{$lesson->lesson_id}}" class="collapse"
                    aria-labelledby="heading{{$lesson->lesson_id}}" data-parent="#accordionExample">
                    <div class="card-body">
                        @php
                        $names = $content::where('lesson_id',$lesson->lesson_id)->get();
                        @endphp
                        @if ($names->count()>0)
                        @foreach ($names as $name)
                        <a href="#">
                            <h4> {{$name->name}}</h4>
                        </a>

                        @endforeach
                        @else
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Now,Have have a Content !!!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
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
                <form action="{{url('/content')}}" method="post" enctype='multipart/form-data' id="content_form">
                    @csrf
                    <input type="hidden" name="lesson_id" id="lesson_id" value="">
                    <input type="hidden" name="course_id" value="{{$course->course_id}}">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="content_form">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    function add_content(lesson) {
        $('#lesson_id').val(lesson.lesson_id);
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

</script>
@endsection
