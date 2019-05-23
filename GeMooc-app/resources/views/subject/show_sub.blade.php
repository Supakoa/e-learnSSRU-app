@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subject : {{$sub_name}}</div>

                <div class="card-body">
                    {{-- {{dd($courses)}} --}}
                    @foreach ($courses as $course)
                    <a href="/course/{{$course->course_id}}">
                    {{$course->name}}
                    </a>

                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
