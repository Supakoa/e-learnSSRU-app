@extends('layouts.appViewer')

@section('content')

<div class="row">
    <div class="col-md-2">
        @include('std_viewer.nav-left.Nav-left')
    </div>
    <div class="col-md-10">
        <div class="card ce-card">
            <div class="justify-content-center p-0">
                <div class="ce-conainer">
                    <h1 class="ce-name">{{$course->name}}</h1>
                    <div class="row justify-content-center mb-5">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    @if ($lessons->count()>0)
                    <div class="container">
                        <div class="accordion" id="accordionExample">
                            @foreach ($lessons as $lesson)
                            <div class="card">
                                <div class="card-header" id="heading_{{$lesson->id}}">
                                    <button class="btn btn-text collapsed btn-block" type="button"
                                        data-toggle="collapse" data-target="#collapse_{{$lesson->id}}"
                                        aria-expanded="true" aria-controls="collapse_{{$lesson->id}}">
                                        Chapter #1
                                    </button>
                                </div>
                                <div id="collapse_{{$lesson->id}}" class="collapse"
                                    aria-labelledby="heading_{{$lesson->id}}" data-parent="#accordionExample">
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
                                                <button class="btn btn-info btn-block" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    Quiz
                                                </button>
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
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                แน่นะ
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
