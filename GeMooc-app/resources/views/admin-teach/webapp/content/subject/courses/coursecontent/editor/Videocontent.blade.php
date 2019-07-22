@extends('admin-teach.webapp.content.Index')

@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceVideo.css')}}">
@endsection

@section('main-content')
<div class="card p-4">
    <div class="row" style="border-bottom:2px solid #707070">
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
    <div class="card-body">
        <div class="text-right mb-3">
            <button><i class="fas fa-cog    "></i></button>
        </div>
        <div class="container-video">
            <video autoplay loop src="https://www.youtube.com/watch?v=CpGzulhubP8&list=RDf8MxUZBCvIs&index=27">

            </video>
        </div>
    </div>
</div>
@endsection
