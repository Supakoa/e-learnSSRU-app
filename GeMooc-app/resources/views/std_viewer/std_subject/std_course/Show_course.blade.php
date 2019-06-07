@extends('layouts.appViewer')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">{{ $subject->name }}</h1>
    <div class="ce-container">
        {{-- Banner  --}}
        <div class="row justify-content-center mb-4">
                <img src="/storage/{{$subject->xl_banner}}" class="card-img-top"  >

        </div>
        <div class="row mb-4">
            <div class="col-md-8">
                <dd>
                        น่าจะต้องเปลี่ยนเป็นรายละเอียดแบบยาว.....<br>
                        {{$subject->detail}}
                </dd>
            </div>
        </div>
        {{-- Course --}}
        <div class="row mb-4 ">
            <div class="col-md-12 ">
                <h4 class="ce-name">Course</h4>
                <table class="table  rounded-lg table-hover table-borderless">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Target group</th>
                            <th scope="col">Price</th>
                            <th scope="col">Learning, Now</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses  as $key=>$course)
                            <tr>
                                <th scope="row">{{$key+1}}.</th>
                                <td>{{ $course->name}}</td>
                                <td>{{$course->created_at}}</td>
                                <td>ต้องเพิ่มใหม่</td>
                                <td>ต้องเพิ่มใหม่</td>
                            <td colspan="3"><a href="../course/{{$course->id}}" class="btn btn-info btn-sm btn-block">Go </a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {{-- Teacher --}}
        <div class="row mb-4 justify-content-center">
            @foreach ($courses as $course)
                @php
                   $users =  $course->users_main;
                @endphp
                @foreach ($users as $user)
                    <div class="col-md-4">
                        <img src="https://www.mangozero.com/wp-content/uploads/2019/03/captain-marvel-word-2.jpg" class="rounded mx-auto d-block" width="60%">
                        <p class="ce-name offset-md-4 col-md-4">{{$user->name}}</p>
                    </div>
                @endforeach

            @endforeach


        </div>
    </div>
</div>
@endsection
