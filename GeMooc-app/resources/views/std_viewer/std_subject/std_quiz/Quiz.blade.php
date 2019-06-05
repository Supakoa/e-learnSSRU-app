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
                <div class="pagination">
                    <a class="arrow" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a class="item" href="#">1</a>
                    <a class="item" href="#">2</a>
                    <a class="item" href="#">3</a>
                    <a class="item" href="#">4</a>
                    <a class="item" href="#">5</a>
                    <a class="item" href="#">6</a>
                    <a class="arrow" href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-8">
                    <dd>1.sdflksjdlkfsakdjfaksd;flkasdjfla;sdflkjas</dd>
                </div>
                <div class="col-md-4">
                    <img class="rounded" class="rounded" width="auto" height="auto"
                        style="max-width: 100%;max-height: 150px" src="" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <ul>
                        <li>1.</li>
                        <li>2.</li>
                        <li>3.</li>
                        <li>4.</li>
                    </ul>
                </div>
            </div>
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
