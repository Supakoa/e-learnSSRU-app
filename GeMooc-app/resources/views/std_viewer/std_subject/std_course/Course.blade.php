@extends('layouts.appViewer')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">{{$course->name}}</h1>
    <div class="ce-container">
        <div class="row justify-content-center mb-5">
            <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @if ($lessons->count()>0)
        <div class="container">
                <div class="accordion" id="accordionExample">
                    @foreach ($lessons as $lesson)
                    <div class="card">
                        <div class="card-header" id="heading_{{$lesson->id}}">
                            <button class="btn btn-text collapsed btn-block" type="button" data-toggle="collapse"
                                data-target="#collapse_{{$lesson->id}}" aria-expanded="true"
                                aria-controls="collapse_{{$lesson->id}}">
                                Chapter #1
                            </button>
                        </div>
                        <div id="collapse_{{$lesson->id}}" class="collapse" aria-labelledby="heading_{{$lesson->id}}"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($lesson->contents as $content)
                                <div class="row">
                                    <div>{{$content->name}}</div>
                                </div>
                                @endforeach

                                <div class="row">
                                    <div class="offset-8 col-md-4 text-right">
                                        <button class="btn btn-login btn-block">
                                            Learn
                                        </button>
                                        <button class="btn btn-info btn-block">Quiz</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Now, this page Empty!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    </div>
</div>
@endsection
