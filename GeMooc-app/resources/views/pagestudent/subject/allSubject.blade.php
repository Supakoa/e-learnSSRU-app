@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/carousel/carouselSubject.css')}}">
@endpush

@push('js')
<script src="{{ asset('node_modules/CEFstyle/cssStudent/carousel/carouselSubject.js') }}"></script>
@endpush

@section('mainContent')
<div class="nav-name">
    <p>หลักสูตรที่เปิดสอน</p>
</div>
<div class="container-fluid mt-5">
    <div class="carousel">
        @foreach ($subjects->where('status', 1) as $subject)
    <img src="{{url('storage/'.$subject->image)}}" alt="{{$subject->id}}" name = "{{$subject->name}}" link = "{{url('std_view/subject/'.$subject->id)}}" />
        @endforeach
    </div>
</div>
<div class="text-center w-100 startCourse">
    <p class="nameSub" id="subject_name">ชื่อวิชา</p>
    <p class="statusSub">เปิดรับสมัคร</p>
    <a class="btn" id="btn_to_course" href="">

                รายละเอียด

    </a>

</div>
@endsection
