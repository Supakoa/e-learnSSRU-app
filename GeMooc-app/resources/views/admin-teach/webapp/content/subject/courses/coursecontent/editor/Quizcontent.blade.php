@extends('admin-teach.webapp.content.Index')
@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush
@section('title')
{{$quiz->name}} - MOOC SSRU
@endsection
@section('main-content')

<div class="card p-4 pb-4" style="background:#F8F8F8;min-height:120vh;max-height:100%">
    @php
    $course = $quiz->content->lesson->course;
    @endphp
    <div>
        <a class="badge badge-dark" href="{{url('/subject')}}" class="">วิชา</a> / <a class="badge badge-dark"
            href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}} </a> / <a class="badge badge-dark"
            href="{{url('/course/'.$course->id)}}">{{$course->name}}</a> / <a class="badge badge-dark"
            href="{{url('/course/'.$course->id)}}">{{$quiz->content->lesson->name}}</a> / <a class="badge badge-dark"
            href="{{url('/quiz/'.$quiz->id)}}">{{$quiz->content->name}}</a>
    </div>
    <br>
    <div class="row" style="border-bottom:2px solid #707070">
        <div class="offset-md-4 col-md-4">
            <div class="text-center">
                <h4>แบบทดสอบ : {{$quiz->name}}</h4>
            </div>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4 col-xl-6">
            <button class="btn-dashboard" onclick="window.location.href = '{{url('/quiz/'.$quiz->id.'/dashboard')}}'">
                <i class="fas fa-tachometer-alt"></i>
            </button>
        </div>
        <div class="col-xs-11 col-sm-10 col-md-8 col-lg-8 col-xl-6 offset-lg-0 offset-md-2 text-right">
            <button class="btn-edit-quiz " data-toggle="modal" data-target="#edit_Modal">
                <i class="fas fa-pencil-alt"></i>
            </button>

            <button class="btn-add-quiz" data-toggle="modal" data-target="#Add_Modal">
                <i class="fas fa-folder-plus"></i>
            </button>

            <a href="{{url('quiz/export/'.$quiz->id)}}"><button class="btnExport">Export</button></a>
            <button class="btn-import-quiz btnImport " data-toggle="modal" data-target="#import_Modal">
                Import
            </button>
        </div>
    </div>
    <div class="text-center">
        <h3>คำถาม</h3>
    </div>
    <div class="quiz-content overflow-auto">
        @foreach ($quiz->questions as $key=>$question)
        <div id="accordion">
            <div class="card rounded-top rounded-bottom rounded-left rounded-right">
                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#quiz{{$key}}" aria-expanded="true" aria-controls="quiz{{$key}}">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 ">
                            <div class="row">
                                <div class="col-6 text-truncate p-key">
                                    {{($key+1)}}. {{$question->name}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 col-md-8 col-lg-8 text-right ">
                            <button class="send_ajax btn-edit-question" onclick="edit_question({{$question->id}})">
                                <i class="fas fa-cog    "></i>
                            </button>
                            <button class="send_ajax btn-delete-question" onclick="delete_question({{$question->id}})">
                                <i class="fas fa-trash    "></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="quiz{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="ccol-sm-12 ol-md-12 col-lg-4">
                                <img class="m-auto d-block img-fluid qImage"
                                    src="{{$question->image ? url('/storage/'.$question->image) :  url('/storage/cover_image_subject/no_image.jpg')}}">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-8 p-4" id="question">
                                <dl class="row p-2">
                                    <dd class="col-sm-12 col-md-12 col-lg-12 text-justify">
                                        {{$question->name}}
                                    </dd>
                                </dl>
                                <div class="row">
                                    @foreach ($question->answers as $key => $answer )
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <p class="text-justify" for="{{$answer->id}}" @if ($answer->correct)
                                            style="color:#009900;"
                                            @endif>{{$key+1}}).{{$answer->name}}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--
        <div class="quiz-card">
            <div class="row">
                <div class="col-sm-2 col-md-4 col-lg-4 p-4 ">
                    <p class="p-key">{{($key+1)}}.</p>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-8 text-right p-4">
                    <button class="send_ajax btn-edit-question" onclick="edit_question({{$question->id}})">
                        <i class="fas fa-cog    "></i>
                    </button>
                    <button class="send_ajax btn-delete-question" onclick="delete_question({{$question->id}})">
                        <i class="fas fa-trash    "></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="ccol-sm-12 ol-md-12 col-lg-4">
                    <img class="m-auto d-block img-fluid qImage"
                        src="{{$question->image ? url('/storage/'.$question->image) :  url('/storage/cover_image_subject/no_image.jpg')}}">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8 p-4" id="question">
                    <dl class="row p-2">
                        <dd class="col-sm-12 col-md-12 col-lg-12 text-justify">
                            {{$question->name}}
                        </dd>
                    </dl>
                    <div class="row">
                        @foreach ($question->answers as $key => $answer )
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <p class="text-justify" for="{{$answer->id}}" @if ($answer->correct)
                                style="color:#009900;"
                                @endif>{{$key+1}}).{{$answer->name}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
        @endforeach

    </div>
</div>
@endsection
@section('modal')
<div id="div_del"></div>
<div class="modal fade " id="Add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">สร้างคำถาม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('question')}}" method="post" id="question_form" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                    <div class="ce-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="create-quiz">
                                    <div class="row mb-3">
                                        <div class="col-md-12 row">
                                            <label for="name-quiz" class="col-sm-1 col-md-2 col-form-label">โจทย์ :</label>
                                            <div class="col-sm-1 col-md-10">
                                                <textarea name="name" id="name-quiz" rows="5"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5 justify-content-center">
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="cover_image"
                                                        placeholder="Image">
                                                    <label class="custom-file-label"
                                                        for="inputGroupFile04">เลือกรูป</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>
                                                <li class="m-1">
                                                    <div class="row">
                                                            <label for="answer[]"
                                                                class="col-sm-1 col-md-1 col-lg-1 col-form-label">1.</label>
                                                            <div class="input-group col-sm-11 col-md-11 col-lg-11">
                                                                <input type="text" class="form-control" name="answer[]">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text rounded">
                                                                        <input type="radio" name="correct" value="1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </li>
                                                <li class="m-1">
                                                    <div class="row">
                                                            <label for="answer[]"
                                                                class="col-sm-1 col-md-1 col-lg-1  col-form-label">2.</label>
                                                            <div class="input-group col-sm-11 col-md-11 col-lg-11">
                                                                <input type="text" class="form-control" name="answer[]">
                                                                <div class="input-group-prepend rounded">
                                                                    <div class="input-group-text">
                                                                        <input type="radio" name="correct" value="2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </li>
                                                <li class="m-1">
                                                    <div class="row">
                                                            <label for="answer[]"
                                                                class="col-sm-1 col-md-1 col-lg-1 col-form-label">3.</label>
                                                            <div class="input-group col-sm-11 col-md-11 col-lg-11">
                                                                <input type="text" class="form-control" name="answer[]">
                                                                <div class="input-group-prepend rounded">
                                                                    <div class="input-group-text">
                                                                        <input type="radio" name="correct" value="3">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </li>
                                                <li class="m-1">
                                                    <div class="row">
                                                            <label for="answer[]"
                                                                class="col-sm-1 col-md-1 col-lg-1 col-form-label">4.</label>
                                                            <div class="input-group col-sm-11 col-md-11 col-lg-11">
                                                                <input type="text" class="form-control" name="answer[]">
                                                                <div class="input-group-prepend rounded">
                                                                    <div class="input-group-text">
                                                                        <input type="radio" name="correct" value="4">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0">
                <button type="submit" class="btn btn-primary" form="question_form">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleName" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleName">แก้ไข แบบฝึกหัด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ce-container">
                    <form action="{{url()->current()}}" method="post" enctype="multipart/form-data" id='edit_quiz'>
                        @csrf
                        @method('PATCH')
                        <div class="container text-center mb-3">
                            @if ($quiz->image!=null)
                            <img src="{{url('/storage/'.$quiz->image)}}" class="img-fluid img-rounded" alt="">

                            @else
                            <img src=" https://placeholder.pics/svg/500x250" class="img-fluid img-rounded" alt="">
                            @endif

                        </div>
                        <div class="row mb-2">
                            <div class="col-md-8 offset-md-2">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name='cover_image' class="custom-file-input"
                                            id="inputGroupFile04">
                                        <label class="custom-file-label" for="inputGroupFile04">เลือกรูป</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-md-2 col-md-5">
                                <label for="setName">ชื่อแบบฝึกหัด:</label>
                                <input type="text" name="name" class="form-control" value="{{$quiz->name}}"
                                    id="setName">
                            </div>
                            <div class="col-md-3">
                                <label for="setTime">ตั้งค่าเวลา: (นาที)</label>
                                <input type="number" name="time" value="{{$quiz->time}}" class="form-control"
                                    id="setTime">
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-md-8">
                                <label for="setDetail">รายละเอียด:</label>
                                <textarea name="detail" id="setDetail" class="form-control">{{$quiz->detail}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button type="submit" form="edit_quiz" class="btn btn-primary">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="import_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleName" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleName">นำข้อมูลเข้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ce-container text-center">
                    <form action="{{url('quiz/import/'.$quiz->id)}}" method="post" enctype="multipart/form-data"
                        id='import_quiz'>
                        @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">โหลด</span>
                            </div>
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="import">
                                <label class="custom-file-label" for="inputGroupFile01">เลือกไฟล์</label>
                            </div>
                        </div>
                        {{-- <input type="file" name="import" id=""> --}}
                    </form>
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button type="submit" form="import_quiz" class="btn btn-primary">บันทึก</button>
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

    function edit_question(id) {
        $.ajax({
            type: "post",
            url: "{{url('question/modal/edit')}}",
            data: {
                id: id
            },
            dataType: "html",
            success: function (response) {
                $('#div_modal').html(response);
                $('#Edit_question_Modal').modal("show");
            }
        });
    }

    function delete_question(id) {
        form = `<form action="{{url('question/` + id + `')}}" method="post" id='form_del_qusetion'>
            @csrf
            @method('DELETE')
        </form>`
        Swal.fire({
            title: 'Are you sure?',
            text: "All Everyting in Question will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $('#div_del').html(form);
                $('#form_del_qusetion').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
        div_del
    }

    // $('.q-card').mouseenter(function () {
    //     thiscard = $(this);
    //     thiscard.css('background-color', "#ebf3faf9");
    //     // thiscard.css('filter', 'blur(10px)');

    // });
    // $('.q-card').mouseleave(function () {
    //     thiscard = $(this);
    //     thiscard.css('background-color', '#dceaf8a4');
    //     // thiscard.css('filter', 'blur(0px)');


    // });

</script>
@endsection
