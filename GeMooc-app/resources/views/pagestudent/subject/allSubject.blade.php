@extends('pagestudent.Index')
@section('title')
วิชาทั้งหมด | MOOC SSRU
@endsection
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
<div class="container-fluid mt-5 justify-content-center">
    <div class="carousel">
        @foreach ($subjects->where('status', 1) as $subject)
        <img src="{{url('storage/'.$subject->image)}}" alt="{{$subject->id}}" name="{{$subject->name}}"
            link="{{url('std_view/subject/'.$subject->id)}}" />
        @endforeach
    </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($subjects->where('status', 1) as $subject)
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{url('storage/'.$subject->image)}}" alt="{{$subject->id}}"
                name="{{$subject->name}}" link="{{url('std_view/subject/'.$subject->id)}}" />
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="text-center w-100 startCourse">
    <p class="nameSub" id="subject_name">ชื่อวิชา</p>
    <p class="statusSub">เปิดรับสมัคร</p>
    <a class="btn" id="btn_to_course" href="">

        รายละเอียด

    </a>

</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {

        if($(window).width >= 1024){
        $('.carousel').show();
        $('#carouselExampleControls').hide();
        }else{
            $('#carouselExampleControls').show();
            $('.carousel').hide();
        }
    });
</script>
@endpush
