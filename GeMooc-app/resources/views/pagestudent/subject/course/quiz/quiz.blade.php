@extends('pagestudent.Index')

@section('title')
{{$quiz->name}} | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/ceQuiz.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        what the fuck {{-- @include('pagestudent.navs.navsLeft',[$lessons]) --}}
    </div>
    <div class="sectionContent">
        <ul  class="pageQuiz">
            <li ><a class=" pageChoice" href="#"><i class="fas fa-chevron-left"></i></a></li>
            <li ><a class=" pageChoice" href="#">1</a></li>
            <li ><a class=" pageChoice" href="#">2</a></li>
            <li ><a class=" pageChoice" href="#">3</a></li>
            <li ><a class=" pageChoice" href="#"><i class="fas fa-chevron-right"></i></a></li>
        </ul>
        <div class="d-flex">
            <div class="p-0 m-auto">
                <a class="m-auto btnTime btn "><i class="fas fa-stopwatch m-auto"></i></a>
            </div>
            <div class="p-1 m-auto container-fluid">
                <div class="progress m-auto" style="height:35px;border-radius:20px">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 ">
                        <p class="p-1 text-right">1/10</p>
                    </div>
                </div>
                <div class="w-100">
                    <div class="progress m-0 p-0" style="height:15px">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="d-flex h-100 p-5">
                        <div class="containerImage p-2">
                            <img class="m-auto bg-dark" width="300" height="250"
                                src="https://images.eurogamer.net/2018/articles/2018-11-27-16-06/nidhogg2.jpg" alt="">
                        </div>
                        <div class="containerText">
                            <dl class="row p-3">
                                <dd class="col-md-12">
                                    this text quiz
                                </dd>
                            </dl>
                            <dl class="row text-right p-3">
                                <dd class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="choice1" id="choice1"
                                            value="option1">
                                        <label class="form-check-label" for="choice1">choice</label>
                                    </div>
                                </dd>
                                <dd class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="choice2" id="choice2"
                                            value="option2">
                                        <label class="form-check-label" for="choice2">choice</label>
                                    </div>
                                </dd>
                                <dd class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="choice3" id="choice3"
                                            value="option3">
                                        <label class="form-check-label" for="choice3">choice</label>
                                    </div>
                                </dd>
                                <dd class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="choice4" id="choice4"
                                            value="option4">
                                        <label class="form-check-label" for="choice4">choice</label>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a id="saveQuiz" class="btn">
                                ข้อถัดไป
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
