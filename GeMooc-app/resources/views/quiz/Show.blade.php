@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <div class="justify-content-start mb-2">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    {{-- {{$quiz->name}} --}}
    <h1 class="ce-name">Show - Quiz : </h1>
    <div class="row justify-content-end">
        <div class="ce-card-btn">
            <button href="#" class="btn btn-md btn-outline-warning" data-toggle="modal" data-target="#edit_Modal">
                <i class="fas fa-edit"></i>
            </button>
            <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_Modal">
                <i class="fas fa-folder-plus"></i>
            </button>
        </div>
    </div>
    <div class="ce-container mb-5">
        <div class="row mb-5">
            {{-- demo --}}
            @if ($quiz->questions->count()>0)
            @php
            $i = 1;
            @endphp
            @foreach ($quiz->questions as $index=>$question)
            <div class="col-md-12 mb-5">
                <article class="q-card">
                    <h5 class="card__header-meta ml-2">#{{$index+1}}</h5>
                    <div class="q-card_body">
                        <div class="row justify-content-end">
                            <div class="ce-card-btn">
                                <button class="btn btn-md btn-outline-warning sent_ajax"
                                    onclick="edit_question({{$question->id}})"> <i class="fas fa-cog"></i></button>
                                <button onclick="delete_question({{$question->id}})"
                                    class="btn btn-md btn-outline-danger"> <i class="fa fa-trash"
                                        aria-hidden="true"></i> </button>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row mb-1 ">
                                @if ($question->image!=null)
                                <div class="col-md-6 offset-1">
                                    <div class="container-fluid">
                                        <dd>
                                            <textarea class="form-control mb-2"
                                                style="width:100%;height:150px;background: transparent;border: none;"
                                                disabled>{!!$question->name!!}</textarea>
                                        </dd>
                                    </div>
                                </div>
                                <div class="col-md-4 align-self-center text-right">
                                    <div class="container-fluid">
                                        <img src="{{url('storage/'.$question->image)}}" class="rounded" width="auto"
                                            height="auto" style="max-width: 100%;max-height: 150px" alt="">
                                    </div>
                                </div>
                                @else
                                <div class="col-md-10 offset-1">
                                    <div class="container-fluid">
                                        <textarea class="form-control mb-2"
                                            style="width:100%;height:150px;background: transparent;border: none;"
                                            disabled>{!!$question->name!!}</textarea>
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class="row justify-content-start">
                                <div class="col-md-10 mt-4 offset-1">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach ($question->answers as $answer)
                                            <div class="col-6">
                                                <li>
                                                    @php
                                                    $check = '';
                                                    if($answer->correct!=0){
                                                    $check = 'checked';
                                                    }
                                                    @endphp

                                                    <div class="input-group mb-1">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="radio" {{$check}} disabled
                                                                    aria-label="Checkbox for following text input">
                                                            </div>
                                                        </div>
                                                        <input type="text" disabled class="form-control"
                                                            aria-label="Text input with checkbox" placeholder=""
                                                            value="{{$answer->order}}. {{$answer->name}}">
                                                    </div>

                                                </li>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
            @else
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Now,Have have a Quiz !!!</strong>
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
                    <div class="container text-center mb-3">
                        <img src="https://s.aolcdn.com/dims-global/dims3/GLOB/legacy_thumbnail/640x400/quality/80/https://s.aolcdn.com/commerce/autodata/images/USC80SUC181A021001.jpg"
                            class="img-fluid img-rounded" alt="">
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-8 offset-md-2">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="offset-md-2 col-md-5">
                            <label for="setName">Quiz name:</label>
                            <input type="text" name="" class="form-control" id="setName">
                        </div>
                        <div class="col-md-3">
                            <label for="setTime">ตั้งค่าเวลา: (นาที)</label>
                            <input type="number" name="" class="form-control" id="setTime">
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-md-8">
                            <label for="setDetail">รายละเอียด:</label>
                            <textarea name="name" id="setDetail" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
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

    $('.q-card').mouseenter(function () {
        thiscard = $(this);
        thiscard.css('background-color', "#ebf3faf9");
        // thiscard.css('filter', 'blur(10px)');

    });
    $('.q-card').mouseleave(function () {
        thiscard = $(this);
        thiscard.css('background-color', '#dceaf8a4');
        // thiscard.css('filter', 'blur(0px)');


    });

</script>
@endsection
