@extends('admin-teach.webapp.content.Index')
@section('background')
{{url('storage/'.$subject->image)}}\
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceModal.css')}}">
@endpush
@php
function formatDateThat($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
// return "$strDay $strMonthThai $strYear $strHour:$strMinute";
return "$strDay $strMonthThai $strYear";

}
@endphp
@section('main-content')
<a href="{{url('/subject')}}">วิชา</a> / <a href="{{url('/subject/'.$subject->id)}}">{{$subject->name}}</a>

<div class="main-content-header">
    <div class="row">
        <div class="col-md-4">
            <div class="text-left ml-5 mt-3">
                {{-- <i href="#" class="ml-5 btn-back"><i class="fas fa-chevron-left"></i></i> --}}
            </div>
        </div>
        <div class="col-md-4">
            <p id="your_course">{{$subject->name}}</p>
            <div class="underline-title"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row m-3">
        <div class="offset-md-8 col-md-4 text-right">
            @php
            $both = auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'teach';
            $adminOnly = auth()->user()->type_user == 'admin';
            @endphp
            @if ($adminOnly)
            <button class="btn-add" data-toggle="modal" data-target="#Add_Modal"><i
                    class="fas fa-folder-plus"></i></button>
            @endif
            @if ($adminOnly)
            <button class="btn-edit send_ajax"><i class="fas fa-cog "
                    onclick="edit_subject({{$subject->id}})"></i></button>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-4 mb-3">
            <div class="card-subject">
                <div class="card-subject-header">
                    @if ($course->status)
                    <div class="status-bar" style="background: #6BB844;"></div>
                    @else
                    <div class="status-bar" style="background: red;"></div>
                    @endif

                    <img src="{{url('storage/'.$course->image)}}" class="shadow" width="100%" height="100%">
                </div>
                <div class="card-subject-body">
                    <div class="card-content-header">
                        <p>{{$course->name}}</p>
                    </div>
                    <div class="card-content-body">
                        <ul class="list-unstyled">
                            <li>
                                บทเรียน {{$course->lessons->count()}} บท
                            </li>
                            <li>
                                เปิดรับสมัคร {{$course->students->count()}}/{{$course->total}} คน
                            </li>
                            <li>
                                เปิดรับ {{formatDateThat($course->open)}} - {{formatDateThat($course->close)}}
                            </li>
                        </ul>
                    </div>
                    <div class="section-subject-btn">
                        <button class="btn-subject"
                            onclick="window.location.href='{{url('course/'.$course->id)}}'">ไปที่คอร์ส</button>
                        <i class="fas fa-cog send_ajax btn-cogs" onclick="edit_course({{$course->id}})"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
@section('modal')
<div id="div_modal"></div>
<div class="modal fade " id="Add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="course-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มคอร์ส</h5>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{url('/course')}}" method="post" enctype='multipart/form-data' id="course_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="courseName">ชื่อคอร์ส</label>
                                <input id="courseName" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="courseOpen">เปิดรับสมัคร</label>
                                        <input id="courseOpen" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startDate">วันที่เปิดรับสมัคร</label>
                                        <input id="startDate" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endDate">วันที่ปิดรับสมัคร</label>
                                        <input class="form-control" id="endDate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lession">บทเรียน</label>
                                        <textarea class="form-control" name="" id="lession" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-addimg">
                                <button class="btn-addimg">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>



                    <input type="hidden" name="sub_id" value="{{$subject->id}}">
                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Course Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" placeholder="Course Detail">
                    </div>

                    <div class="form-group">
                        <label for="name">Cover Image</label>
                        <input type="file" class="form-control btn" style="padding:3px" name="cover_image"
                            placeholder="Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="course_form">Save changes</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script>
    $(document).ready(function () {
        // ScrollReveal().reveal('.card-subject', { interval: 100 });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function edit_course(id) {
        $.ajax({
            type: "post",
            url: "{{url('course/modal/edit')}}",
            data: {
                id: id
            },
            dataType: "html",
            success: function (response) {
                $('#div_modal').html(response);
                $('#Edit_Course_Modal').modal("show");
            }
        });
    }

    function edit_subject(id) {
        $.ajax({
            type: "post",
            url: "{{url('subject/modal/edit')}}",
            data: {
                id: id
            },
            dataType: "html",
            success: function (response) {
                $('#div_modal').html(response);
                $('#Edit_Modal').modal("show");
            }
        });
    }

</script>
@endsection
