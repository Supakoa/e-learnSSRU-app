@extends('layouts.appViewer')

@section('title')
    แบบทดสอบ {{ $quiz->name}}
@endsection
@section('content')
<div class="card ce-card">
    <h1 class="ce-name">{{ $quiz->name}}</h1>
    <div class="ce-container">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-4 offset-md-4 order-md-4">
                    <div class="jumbotron text-center">
                        <h3>
                           <div id="countdown"></div>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="progress">
                    <div class="progress-bar" id="progressbar" role="progressbar" style="width: 0%;"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="pagination nav" id="nav-tab" role="tablist">
                    <script> questions = []</script>
                    @foreach ($quiz->questions as $key => $question)
                    <a class="item question_number" id="question_{{$question->id}}" data-toggle="tab" href="#number_{{$question->id}}"
                        role="tab" aria-controls="number_{{$question->id}}" >{{$key+1}}</a>
                        <Script>
                            questions.push('question_{{$question->id}}')
                        </Script>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <form action="{{url('std_view/course/content/'.$quiz->content->id.'/submit_quiz')}}" method="post" id="form_all_question">
                @csrf
                <input type="hidden" name="timeleft" id = "timeleft">
            </form>

            @foreach ($quiz->questions as $key => $question)
                <div class="tab-pane fade " id="number_{{$question->id}}" role="tabpanel"
                    aria-labelledby="question_{{$question->id}}">
                    <div class="container mb-5">
                        <div class="row">
                                @if ($question->image!=null)
                            <div class="col-md-8">
                                <dt>{{$question->name}}</dt>
                            </div>
                            <div class="col-md-4">
                                <img src="storage/{{$question->image}}"
                                    class="rounded" width="auto" height="auto" style="max-width: 100%;max-height: 150px"
                                    >
                            </div>
                            @else
                            <div class="col-md-12">
                                    <dt>{{$question->name}}</dt>
                                </div>
                                @endif
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="ce-choice">
                                    @foreach ($question->answers as $key => $answer)
                                        <div class="form-group">
                                        <div class=" form-control">
                                        <input type="radio" class="test_radio" form="form_all_question" name="question_{{$question->id}}" value="{{$answer->id}}" >
                                        <label>{{$key+1}}.) {{$answer->name}}</label>
                                    </div>
                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>



        <div class="row mb-4">
            <div class="col-md-2  text-left">
                <button id="prev" onclick="prev_question()" class="btn btn-outline-info btn-block btn-sm">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-md-2 offset-8 text-right">
                <button id="next"  onclick="next_question()" class="btn btn-outline-info btn-block btn-sm">
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="container text-center">
                <button id="submit_quiz"  class="btn btn-login">ส่งคำตอบ</button>
                <button class="btn btn-danger">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
@endsection
@php
    // dd(session('time'));
@endphp
@section('js')
<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    time = 'Start !!';
    width = 0;
    success = 0;
    percent = 0;
    questions_number = {{$quiz->questions->count()}};
    ckecked = [];
    var timeleft = get_time();

    $(document).ready(function () {
        up_percent();

        Swal.fire({
        title: "{{$quiz->name}}",
        text: `{{$quiz->questions->count().' ข้อ '.($quiz->time/60).' นาที'}}`,
        type: 'info',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Start !!!!'
        }).then((result) => {

            countdown ();
            $( ".question_number").first().trigger( "click" );
       
        })
    });


    function countdown (){
        var downloadTimer = setInterval(function(){
            if(timeleft!='Start !!'){
                $('#timeleft').val({{$quiz->time}}-timeleft);
                minute =  parseInt(timeleft/60)
                sec = timeleft%60
                if(minute<10){
                    minute = '0'+minute
                }
                if(sec<10){
                    sec = '0'+sec
                }
                $("#countdown").html(minute + ' : ' + sec);
            }else{
                $("#countdown").html("Start !!");
            }



            if(timeleft <= 0){
                clearInterval(downloadTimer);
                $("#countdown").html("Time Out");
                $('#submit_quiz').attr('disabled', 'true');
                $('#form_all_question').submit();

            }

            console.log(timeleft);

            timeleft = get_time();
        }, 1000);
    }

    function get_time() {
        $.ajax({
                type: "POST",
                url: "/get_time",
                cache: false,
                success: function (response) {
                    time =  response;
                }

            });
            return time;

    }


    function up_percent() {
        success = $('input:radio:checked').length;
        percen = parseInt(success / questions_number * 100);
        $('#progressbar').css('width', percen + "%");
        $('#progressbar').text(percen + "%");
    }

    function next_question(){
        index =  jQuery.inArray( now_question, questions );
        next = questions[index+1];
        $( "#"+next ).trigger( "click" );
    }

    function prev_question(){
        index =  jQuery.inArray( now_question, questions );
        next = questions[index-1];
        $( "#"+next ).trigger( "click" );
    }

    $('.test_radio').change(function (e) {
            $('#'+this.name).css('background-color', '#D7FADB');
            up_percent();
    });

    $('#submit_quiz').click(function (e) {
        e.preventDefault();
        if(success<questions_number){
            // $('#form_all_question').submit();
            Swal.fire({
            type: 'error',
            title: 'ไม่สามารถส่งได้',
            text: 'กรุณาทำให้ครบทุกข้อ'
            })

        }else{
            $('#form_all_question').submit();
        }
    });



    $('.question_number').click(function (e) {
        e.preventDefault();
        now_question = this.id;
        // alert(now_question);
        $('.question_number').css("border",'#000 solid 1px')

        $(this).css("border", "#DAC7FC dashed 3px")

    });


</script>
@endsection
