@extends('layouts.appViewer')

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
                    <div class="progress-bar" id="progressbar" role="progressbar" style="width: 80%;" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="pagination nav" id="nav-tab" role="tablist">
                    <a class="arrow " href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a class="item active " id="number1-tab" data-toggle="tab" href="#number1" role="tab" aria-controls="number1" aria-selected="true">1</a>
                    <a class="item" id="number2-tab" data-toggle="tab" href="#number2" role="tab" aria-controls="number2" aria-selected="false">2</a>
                    <a class="item" href="#">3</a>
                    <a class="item" href="#">4</a>
                    <a class="item" href="#">5</a>
                    <a class="item" href="#">6</a>
                    <a class="arrow" href="#" onclick="up_percent()"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="number1" role="tabpanel" aria-labelledby="number1-tab">
                    <div  class="container mb-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <dt>1.sdflksjdlkfsakdjfaksd;flkasdjfla;sdflkjas</dt>
                                </div>
                                <div class="col-md-4">
                                    <img src="https://images2.minutemediacdn.com/image/upload/c_crop,h_1193,w_2121,x_0,y_175/f_auto,q_auto,w_1100/v1554921998/shape/mentalfloss/549585-istock-909106260.jpg"
                                        class="rounded" width="auto" height="auto" style="max-width: 100%;max-height: 150px" src=""
                                        alt="">
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
            <div class="tab-pane fade" id="number2" role="tabpanel" aria-labelledby="number2-tab">
                    <div id="number2" class="container mb-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <dt>2.ssdijflskdjf55555555555555555555</dt>
                                </div>
                                <div class="col-md-4">
                                    <img src="https://vetforcatsonly.com/wp-content/uploads/2015/08/IMG_0028.jpg"
                                        class="rounded" width="auto" height="auto" style="max-width: 100%;max-height: 150px" src=""
                                        alt="">
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
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
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
                <button class="btn btn-login">ส่งคำตอบ</button>
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
    questions = {{$quiz->questions->count()}} ;

    function up_percent(){
        success++;
        percen = success/questions*100;
        $('#progressbar').css('width', percen+"%");
        $('#progressbar').text(percen+"%");
    }
</script>
@endsection
