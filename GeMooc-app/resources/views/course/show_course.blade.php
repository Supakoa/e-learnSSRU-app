@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$course_name}}</div>

                <div class="card-body">
                    {{-- {{dd($courses)}} --}}
                    @foreach ($lessons as $lesson)
                    <a href="/course/{{$lesson->lesson_id}}">
                    {{$lesson->name}}
                    </a>

                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
