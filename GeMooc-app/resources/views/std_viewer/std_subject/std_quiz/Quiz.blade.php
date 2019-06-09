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
                            Time out
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

                    <a class="arrow " href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    @foreach ($quiz->questions as $key => $question)
                    {{-- <a class="item active " id="number1-tab" data-toggle="tab" href="#number1" role="tab" aria-controls="number1" aria-selected="true">1</a> --}}
                    <a class="item" id="tab_{{$question->id}}" data-toggle="tab" href="#number_{{$question->id}}"
                        role="tab" aria-controls="number_{{$question->id}}" aria-selected="false">{{$key+1}}</a>

                    @endforeach

                    {{-- <a class="item" id="number2-tab" data-toggle="tab" href="#number2" role="tab" aria-controls="number2" aria-selected="false">2</a>
                    <a class="item" href="#">3</a>
                    <a class="item" href="#">4</a>
                    <a class="item" href="#">5</a>
                    <a class="item" href="#">6</a> --}}
                    <a class="arrow" href="#" ><i class="fa fa-arrow-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <form action="" method="post" id="form_all_question">
            </form>

            @foreach ($quiz->questions as $question)
                <div class="tab-pane fade " id="number_{{$question->id}}" role="tabpanel"
                    aria-labelledby="tab_{{$question->id}}">
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
                                        <input type="radio" class="test_radio" form="form_all_question" name="question_{{$question->id}}" required >
                                        <li>{{$key+1}}.) {{$answer->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="tab-pane fade" id="number2" role="tabpanel" aria-labelledby="number2-tab">
                <div id="number2" class="container mb-5">
                    <div class="row">
                        <div class="col-md-8">
                            <dt>2.ssdijflskdjf55555555555555555555</dt>
                        </div>
                        <div class="col-md-4">
                            <img src="https://vetforcatsonly.com/wp-content/uploads/2015/08/IMG_0028.jpg"
                                class="rounded" width="auto" height="auto" style="max-width: 100%;max-height: 150px"
                                src="" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <ul class="ce-choice">
                                <li>1.</li>
                                <li>2.</li>
                                <li>3.</li>
                                <li>4.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> --}}
        </div>



        <div class="row mb-4">
            <div class="col-md-2  text-left">
                <button class="btn btn-outline-info btn-block btn-sm">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-md-2 offset-8 text-right">
                <button class="btn btn-outline-info btn-block btn-sm">
                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="container text-center">
                <button type="submit" form="form_all_question" class="btn btn-login">ส่งคำตอบ</button>
                <button class="btn btn-danger">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    width = 0;
    success = 0;
    percent = 0;
    questions = {{$quiz->questions->count()}};
    ckecked = [];

    function up_percent() {
        success++;
        percen = success / questions * 100;
        $('#progressbar').css('width', percen + "%");
        $('#progressbar').text(percen + "%");
    }
    $('.test_radio').change(function (e) {
        e.preventDefault();
        if(ckecked.find(element => element === this.name)){
            // alert(ckecked);
        }else{
            ckecked.push(this.name);
            up_percent();
        }
    });
</script>
@endsection
