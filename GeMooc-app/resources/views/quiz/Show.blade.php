@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <div class="justify-content-start mb-2">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    {{-- {{$quiz->name}} --}}
<h1 class="ce-name">Show - Quiz : {{$quiz->name}}</h1>
    <div class="row justify-content-end">
        <div class="ce-card-btn">
            <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_Modal"> <i
                    class="fas fa-folder-plus"></i> </button>
        </div>
    </div>
    <div class="ce-container">
        <div class="row mb-3">
            @if ($quiz->questions->count()>0)
                @php
                    $i = 1;
                @endphp
                @foreach ($quiz->questions as $question)
                    <div class="col-md-4">
                            <article class="q-card">
                                <p class="card__header-meta">{{$i++}}.</p>
                                <div class="q-card_body">
                                <ul class="nav nav-tabs" id="myTab_{{$question->id}}" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="overview-tab_{{$question->id}}" data-toggle="tab" href="#overview_{{$question->id}}"
                                                role="tab" aria-controls="overview_{{$question->id}}" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="anser-tab_{{$question->id}}" data-toggle="tab" href="#anser_{{$question->id}}" role="tab"
                                                aria-controls="anser_{{$question->id}}" aria-selected="false">Anser</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="action-tab_{{$question->id}}" data-toggle="tab" href="#action_{{$question->id}}" role="tab"
                                                aria-controls="action_{{$question->id}}" aria-selected="false">Action</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent_{{$question->id}}">
                                        <div class="tab-pane fade show active overview" id="overview_{{$question->id}}" role="tabpanel"
                                            aria-labelledby="overview-tab_{{$question->id}}">
                                            <div class="container-fluid text-overview">
                                                <p class="lead">
                                                        {{$question->name}}
                                                </p>
                                            </div>
                                            <div class="text-center mt-2">
                                                <button class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-image    "></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="anser_{{$question->id}}" role="tabpanel" aria-labelledby="anser-tab_{{$question->id}}">
                                            <div class="container-fluid">

                                                    @foreach ($question->answers as $answer)
                                                    <ul class="mt-3">
                                                    <li>
                                                            @php
                                                            $check = '';
                                                            if($answer->correct!=0){
                                                                $check = 'checked';
                                                            }
                                                            @endphp
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" {{$check}} disabled
                                                                        aria-label="Radio button for following text input">
                                                                </div>
                                                            </div>
                                                            <dt><span> {{$answer->order}}.</span> {{$answer->name}}</dt>
                                                        </li>
                                                    </ul>
                                                    @endforeach


                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="action_{{$question->id}}" role="tabpanel" aria-labelledby="action-tab_{{$question->id}}">
                                            <div class="container m-3">
                                                <button class="btn btn-md btn-outline-warning"><i class="fas fa-edit"></i>
                                                    Edit</button>
                                                <button class="btn btn-md btn-outline-danger"><i class="fa fa-trash"
                                                        aria-hidden="true"></i> Delete</button>
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
            <form action="{{url('question')}}" method="post" id="question_form"  enctype='multipart/form-data'>
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
                                                <input type="file" class="form-control btn" style="padding:3px" name="cover_image"
                                                placeholder="Image">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]"
                                                            class="col-sm-2 col-form-label">1.</label>
                                                        <div class="col-sm-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value ="1"
                                                                        aria-label="Radio button for following text input" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]"
                                                            class="col-sm-2 col-form-label">2.</label>
                                                        <div class="col-md-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value ="2"
                                                                        aria-label="Radio button for following text input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]"
                                                            class="col-sm-2 col-form-label">3.</label>
                                                        <div class="col-md-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value ="3"
                                                                        aria-label="Radio button for following text input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <label for="answer[]"
                                                            class="col-sm-2 col-form-label">4.</label>
                                                        <div class="col-md-8">
                                                            <input name="answer[]" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="input-group-prepend mr-1">
                                                                <div class="input-group-text">
                                                                    <input type="radio" name="correct" value ="4"
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
                <button type="submit" class="btn btn-primary"  form="question_form">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
