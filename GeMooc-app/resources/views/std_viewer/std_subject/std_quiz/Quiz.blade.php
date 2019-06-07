@extends('layouts.appViewer')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">sub.course.id.quiz</h1>
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
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="pagination nav" id="nav-tab" role="tablist">
                    <a class="arrow " href="#" id="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a class="item active " id="page1-tab" data-toggle="tab" href="#page1" role="tab"
                        aria-controls="page1" aria-selected="true">1</a>
                    <a class="item" id="page2-tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2"
                        aria-selected="false">2</a>
                    <a class="item" href="#">3</a>
                    <a class="item" href="#">4</a>
                    <a class="item" href="#">5</a>
                    <a class="item" href="#">6</a>
                    <a class="arrow" href="#" id="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active " id="page1" role="tabpanel" aria-labelledby="page1-tab">
                <div class="container mb-5">
                    <div class="row">
                        <div class="col-md-8">
                            <dt>1.sdflksjdlkfsakdjfaksd;flkasdjfla;sdflkjas</dt>
                        </div>
                        <div class="col-md-4">
                            <img src="https://images2.minutemediacdn.com/image/upload/c_crop,h_1193,w_2121,x_0,y_175/f_auto,q_auto,w_1100/v1554921998/shape/mentalfloss/549585-istock-909106260.jpg"
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
            <div class="tab-pane fade " id="page2" role="tabpanel" aria-labelledby="page2-tab">
                <div id="page2" class="container mb-5">
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
        </div>



        <div class="row mb-4">
            <div class="col-md-2  text-left">
                <button id="prev" class="btn btn-outline-info btn-block btn-sm">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-md-2 offset-8 text-right">
                <button id="next" class="btn btn-outline-info btn-block btn-sm">
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

</script>
@endsection
