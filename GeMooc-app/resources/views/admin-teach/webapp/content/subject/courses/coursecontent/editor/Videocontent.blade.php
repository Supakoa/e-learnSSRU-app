@extends('admin-teach.webapp.content.Index')
@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceVideo.css')}}">
@endsection

@section('main-content')
<div class="card p-4">
    <div class="row" style="border-bottom:2px solid #707070">
        <div class="col-md-4">
            <div class="text-left">
                <a class="btn-back" href="#"><i class="fas fa-chevron-left"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <h4>Subject : </h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="text-right mb-3">
            <button class="btn-edit-video"><i class="fas fa-cog    "></i></button>
        </div>
        <div class="container-video">
            <div class="embed-responsive embed-responsive-16by9 ce-video-content">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/j0BXziyrFIo?list=RDf8MxUZBCvIs"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
