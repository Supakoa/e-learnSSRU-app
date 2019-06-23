@extends('layouts.appViewer')

@section('content')

<div class="row">
    <div class="col-md-2 p-0">
        @include('std_viewer.nav-left.Nav-left',[$now_content,$lessons])
    </div>
    <div class="col-md-10">
        <div class="card ce-card">
            <div class="justify-content-center p-0">
                <div class="ce-conainer">
                <h1 class="ce-name">Video : {{$now_content->name}}</h1>
                <label>{{ $now_content->detail }}</label><br>
                <label>https://youtu.be/B18wcgr5OXA</label>
                    <div class="container">
                        <div class="row justify-content-center mb-5">
                            <div class="col">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="1280" height="720" src="{{ url('https://www.youtube.com/embed/B18wcgr5OXA') }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Now, this page Empty!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
