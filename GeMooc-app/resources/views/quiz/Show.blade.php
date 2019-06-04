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
            <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_Modal"> <i
                    class="fas fa-folder-plus"></i> </button>
        </div>
    </div>
    <div class="container">
        <div class="ce-container">
            <div class="row mb-5">
                {{-- demo --}}
                @if ($quiz->questions->count()>0)
                @php
                $i = 1;
                @endphp
                @foreach ($quiz->questions as $index=>$question)
                <div class="col-md-12 mb-5">
                    <article class="q-card" >
                        <h5 class="card__header-meta ml-2">#{{$index+1}}</h5>
                        <div class="q-card_body">
                            <div class="row justify-content-end">
                                <div class="ce-card-btn">
                                    <button class="btn btn-md btn-outline-warning sent_ajax"
                                        onclick="edit_question({{$question->id}})"> <i class="fas fa-cog"></i></button>
                                    <button href="#" class="btn btn-md btn-outline-danger"> <i class="fa fa-trash"
                                            aria-hidden="true"></i> </button>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row mb-1 justify-content-start">
                                    @if ($question->image!=null)
                                    <div class="col-md-7 offset-1">
                                        <div class="container-fluid">
                                            <dd>
                                                <textarea class="form-control mb-2"
                                                    style="width:100%;height:150px;background: transparent;border: none;"
                                                    disabled>{!!$question->name!!}</textarea>
                                            </dd>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="container-fluid text-right">
                                            <img src="{{url('storage/'.$question->image)}}" class="rounded" width="auto"
                                                height="150" alt="">
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
                                    <div class="col-md-10 offset-1">
                                        <div class="container-fluid">
                                            @foreach ($question->answers as $answer)
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
                @else
                Nooooooo
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
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
    var tempcolor;
    $('.q-card').mouseenter(function () {
        thiscard = $(this);
        tempcolor = thiscard.css('background-color');
        var randomColor = Math.floor(Math.random()*16777215).toString(16);
        thiscard.css('background-color',"#ebf3faef");
    });
    $('.q-card').mouseleave(function () {
        thiscard = $(this);
        thiscard.css('background-color','#dceaf8a4');
    });


</script>
@endsection
