@extends('layouts.appViewer')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">All Subject</h1>
    <div class="ce-container">
        <div class="row justify-content-center mb-4">
            @if ($subjects->count()>0)
                @foreach ($subjects as $subject)
                <div class="col-md-3 mb-2">
                        <div class="card" style="width: auto;">
                            <div class="card-body">
                        <img src="/storage/{{$subject->sm_banner}}" class="card-img-top" width="80%" >
                                <hr>
                                <h5 class="card-title">{{$subject->name}}.</h5>
                                <p class="card-text">{{$subject->detail}}</p>
                            <a href="subject/{{$subject->id}}" class="btn btn-primary">Course Information</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            @else

            @endif

        </div>


        <h1 class="ce-name">Comming Soon. !</h1>
        <div class="row justify-content-center">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
@endsection
