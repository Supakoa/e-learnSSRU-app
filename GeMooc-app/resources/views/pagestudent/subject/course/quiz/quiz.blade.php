@extends('pagestudent.Index')

@section('title')
{{-- {{$quiz->name}} | MOOC SSRU --}}
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/ceQuiz.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">
@endpush
@php
$question_number = $quiz->questions->count();
@endphp
@section('mainContent')
<div class="containerContent">
    <div class="sectionQuiz">
        <ul class=" text-center">
        <input type="hidden" name="quiz_time" id="quiz_time" value="{{$quiz->time*60}}">
            <script>
                questions = [];

            </script>

            <li><a class="question_next" href="#"><i class="fas fa-chevron-left"></i></a></li>
            @foreach ($quiz->questions as $key => $question)
            <Script>
                questions.push('question_{{$question->id}}_number')

            </Script>
            <li><a class="question_number" href="#question_{{$question->id}}" id="question_{{$question->id}}_number"
                    role="button" aria-expanded="true" aria-controls="question_{{$question->id}}">{{$key+1}}</a></li>
            @endforeach
            <li><a class=" question_prev" href="#"><i class="fas fa-chevron-right"></i></a></li>
        </ul>
        <div class="d-flex">
            <div class="p-0 m-auto">
                <a class="m-auto btnTime btn "><i class="fas fa-stopwatch m-auto"></i></a>
            </div>
            <div class="p-1 m-auto container-fluid">
                <div class="progress m-auto" style="height:35px;border-radius:20px">
                    <div class="progress-bar bg-danger" role="progressbar" id="countdown" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <form action="{{url('std_view/course/content/'.$quiz->content->id.'/submit_quiz')}}" method="post"
                id="form_all_question">
                @csrf
                <input type="hidden" name="timeleft" id="timeleft">

                @foreach ($quiz->questions as $key=>$question)
                <div class="card collapse {{$key === 0 ? 'show' : ''}}" id="question_{{$question->id}}">
                    <div class="row">
                        <div class="col-md-12 ">
                            <p class="p-1 text-right">{{$key+1}}/{{$question_number}}</p>
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="progress m-0 p-0 " style="height:15px">
                            <div class="progress-bar bg-info progressbar-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="d-flex h-100 p-5">
                            @if ($question->image != null)
                            <div class="containerImage p-2">
                                <img class="m-auto bg-dark" width="300" height="250"
                                    src="{{url('storage/'.$question->image)}}" alt="">
                            </div>
                            @endif

                            <div class="containerText">
                                <dl class="row p-3">
                                    <dd class="col-md-12">
                                        {{$question->name}}
                                    </dd>
                                </dl>
                                <dl class="row  p-3">
                                    @foreach ($question->answers as $answer)
                                    <dd class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input answer_radio" type="radio"
                                                value="{{$answer->id}}" name="question_{{$question->id}}"
                                                id="ques_{{$question->id}}">
                                            <label class="form-check-label"
                                                for="ques_{{$question->id}}">{{$answer->name}}</label>
                                        </div>
                                    </dd>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn next">
                                    ข้อถัดไป
                                </button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
<input type="hidden" name="" id="get_time" value="{{url("/get_time")}}">
@endsection
{{-- {{dd($question_id->all())}} --}}
@push('js')
<script src="{{ asset('node_modules/CEFstyle/cssStudent/ceQuiz.js')}}"></script>

@endpush
