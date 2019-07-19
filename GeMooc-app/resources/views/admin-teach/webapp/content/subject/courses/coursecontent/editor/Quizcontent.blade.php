@extends('admin-teach.webapp.content.Index')

@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endsection

@section('main-content')
<div class="card p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="text-left">
                <a href="#"><i class="fas fa-chevron-left"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <h4>Subject : </h4>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <button>
                <i class="fas fa-tachometer-alt"></i>
            </button>
        </div>
        <div class="col-md-4 offset-4 text-right">
            <button class="btn-edit-quiz">
                <i class="fas fa-pencil-alt    "></i>
            </button>

            <button class="btn-add-quiz">
                <i class="fas fa-folder-plus"></i>
            </button>
        </div>
    </div>
    <div class="text-center">
        <h3>คำถาม</h3>
    </div>

    <div class="quiz-content">
        <div class="quiz-card">
            <div class="row">
                <div class="col-md-4 p-4">
                    <p class="pl-3">1</p>
                </div>
                <div class="offset-md-4 col-md-4 text-right p-4">
                    <button>
                        <i class="fas fa-cog    "></i>
                    </button>
                    <button>
                        <i class="fas fa-trash    "></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 pl-1 pb-1 text-center">
                    <img class="rounded mx-auto d-block" src="https://news.nationalgeographic.com/content/dam/news/2018/05/17/you-can-train-your-cat/02-cat-training-NationalGeographic_1484324.ngsversion.1526587209178.adapt.1900.1.jpg" width="85%" height="90%" alt="">
                </div>
                <div class="col-md-8" id="question">
                    <dd>
                        การมองโลกในแง่ดีมากเกินไปจะส่งผลเสียอย่างไร
                    </dd>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="queslist">
                                <li><input type="radio" name="" id=""> 1. Lorem ipsum</li>
                                <li><input type="radio" name="" id=""> 2. Phasellus iaculis</li>
                            </ul>
                        </div>
                        <div class="col-md-6 ">
                            <ul class="queslist">
                                <li><input type="radio" name="" id=""> 3. Lorem ipsum</li>
                                <li><input type="radio" name="" id=""> 4. Phasellus iaculis</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
