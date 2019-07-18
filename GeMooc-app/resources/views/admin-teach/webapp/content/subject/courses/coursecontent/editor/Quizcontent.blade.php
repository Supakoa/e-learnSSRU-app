@extends('admin-teach.webapp.content.Index')

@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endsection

@section('main-content')

    <div class="card p-4">
        <div class="row">
            <div class="col-md-4">
                <div class="text-left">
                    <a href="#"><i class="fas fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <h4>แบบทดสอบ : {{$quiz->name}}</h4>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <button onclick="window.location.href = '{{url('/quiz/'.$quiz->id.'/dashboard')}}'">
                    <i class="fas fa-tachometer-alt"></i>
                </button>
            </div>
            <div class="col-md-4 offset-4 text-right">
                <button class="btn-edit-quiz " data-toggle="modal" data-target="#edit_Modal">
                    <i class="fas fa-pencil-alt    "></i>
                </button>

                <button class="btn-add-quiz"  data-toggle="modal" data-target="#Add_Modal">
                    <i class="fas fa-folder-plus"></i>
                </button>
            </div>
        </div>
        <div class="text-center">
            <h3>คำถาม</h3>
        </div>
        <div class="quiz-content">
                @foreach ($quiz->questions as $key=>$question)
                <div class="quiz-card">
                        <div class="row">
                            <div class="col-md-4 p-4">
                                <p>{{($key+1)}}</p>
                            </div>
                            <div class="offset-md-4 col-md-4 text-right p-4">
                                <button class="send_ajax" onclick="edit_question({{$question->id}})">
                                    <i class="fas fa-cog    "></i>
                                </button>
                                <button class=" send_ajax"
                                onclick="delete_question({{$question->id}})">
                                    <i class="fas fa-trash    "></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pl-1 pb-1 text-center">
                                <img class="rounded mx-auto d-block"
                            src="{{url('storage/'.$question->image)}}"
                            width="auto" height="auto" style="max-width: 100%;max-height: 200px">
                            </div>
                            <div class="col-md-8">
                                <dd>
                                    {{$question->name}}
                                </dd>

                                <div class="row">

                                        @foreach ($question->answers as $key => $answer )
                                        <div class="col-md-6">
                                                <input type="radio" name="{{$answer->question->id}}" @if ($answer->correct)
                                                    checked style= "background-color:green"
                                                @endif id="{{$answer->id}}" value="{{$answer->id}}" disabled>
                                                 <label for="{{$answer->id}}" @if ($answer->correct)
                                                        style= "background-color:green;"
                                                    @endif>{{$answer->name}}</label>

                                            </div>
                                        @endforeach

                                    {{-- <div class="col-md-6 ">
                                            <ul>
                                                <li><input type="radio" name="" id=""> Lorem ipsum</li>
                                                <li><input type="radio" name="" id=""> Phasellus iaculis</li>
                                            </ul>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
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
                                            <label for="name-quiz" class="col-sm-2 col-form-label">Question :</label>
                                            <div class="col-md-8">
                                                <textarea name="name" id="name-quiz" class="form-control">
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="offset-md-3 col-md-6">
                                            <input type="file" class="form-control btn" style="padding:3px"
                                                name="cover_image" placeholder="Image">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]" class="col-sm-2 col-form-label">1.</label>
                                                        <div class="col-sm-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value="1"
                                                                        aria-label="Radio button for following text input"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]" class="col-sm-2 col-form-label">2.</label>
                                                        <div class="col-md-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value="2"
                                                                        aria-label="Radio button for following text input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]" class="col-sm-2 col-form-label">3.</label>
                                                        <div class="col-md-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value="3"
                                                                        aria-label="Radio button for following text input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]" class="col-sm-2 col-form-label">4.</label>
                                                        <div class="col-md-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value="4"
                                                                        aria-label="Radio button for following text input">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="question_form">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleName" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleName">Edit your quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ce-container">
                <form action="{{url()->current()}}" method="post" enctype="multipart/form-data" id = 'edit_quiz'>
                    @csrf
                    @method('PATCH')
                    <div class="container text-center mb-3">
                        @if ($quiz->image!=null)
                        <img src="{{url('/storage/'.$quiz->image)}}"
                        class="img-fluid img-rounded" alt="">

                        @else
                        <img src=" https://placeholder.pics/svg/500x250"
                        class="img-fluid img-rounded" alt="">
                        @endif

                    </div>
                    <div class="row mb-2">
                        <div class="col-md-8 offset-md-2">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name='cover_image' class="custom-file-input" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="offset-md-2 col-md-5">
                            <label for="setName">Quiz name:</label>
                        <input type="text" name="name" class="form-control" value="{{$quiz->name}}" id="setName">
                        </div>
                        <div class="col-md-3">
                            <label for="setTime">ตั้งค่าเวลา: (นาที)</label>
                        <input type="number" name="time" value="{{$quiz->time}}" class="form-control" id="setTime">
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-md-8">
                            <label for="setDetail">รายละเอียด:</label>
                            <textarea name="detail"  id="setDetail" class="form-control">{{$quiz->detail}}</textarea>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="edit_quiz" class="btn btn-primary">Save changes</button>
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
