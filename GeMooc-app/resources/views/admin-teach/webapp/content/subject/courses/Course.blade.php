@extends('admin-teach.webapp.content.Index')
@section('background')
{{url('storage/'.$subject->image)}}\
@endsection
@section('title')
{{$subject->name}} | MOOC SSRU
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
<a class="badge badge-dark" href="{{url('/subject')}}">วิชา</a> / <a class="badge badge-dark"
    href="{{url('/subject/'.$subject->id)}}">{{$subject->name}}</a>

<div class="main-content-header">
    <div class="row">
        <div class="col-md-4">
            <div class="text-left ml-5 mt-3">
                {{-- <i href="#" class="ml-5 btn-back"><i class="fas fa-chevron-left"></i></i> --}}
            </div>
        </div>
        <div class="col-md-4">
            <p class="t-shadow" id="your_course">{{$subject->name}}</p>
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
            <button class="btn-edit send_ajax" onclick="edit_subject({{$subject->id}})"><i
                    class="fas fa-cog "></i></button>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-4 mb-3">
            <div class="card-subject">
                <div class="card-subject-header">
                    @if ($course->status)
                    <div class="status-bar rounded" style="background: #6BB844;"></div>
                    @else
                    <div class="status-bar rounded" style="background: red;"></div>
                    @endif

                    <img src="{{url('storage/'.$course->image)}}" class="shadow rounded" width="100%" height="100%">
                </div>
                <div class="card-subject-body">
                    <div class="card-content-header">
                        <p>{{$course->name}}</p>
                    </div>
                    <div class="card-content-body">
                        <ul class="list-unstyled">
                            <li>
                                บทเรียน : {{$course->lessons->count()}} บท
                            </li>
                            <li>
                                เปิดรับสมัคร : {{$course->students->count()}}/{{$course->total}} คน
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
            <div class="modal-body pl-5 pr-5">
                <form action="{{url('/course')}}" method="post" enctype='multipart/form-data' id="course_form">
                    @csrf
                    <input type="hidden" name="subject_id" value="{{$subject->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="courseName">ชื่อคอร์ส</label>
                                <input id="courseName" name="name" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="courseDetail">รายละเอียด</label>
                                <input id="courseDetail" name="detail" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="courseOpen">เปิดรับสมัคร</label>
                                        <input id="courseOpen" class="form-control" min="0" name="total" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startDate">วันที่เปิดรับสมัคร</label>
                                        <input id="startDate" class="form-control" name="open" type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endDate">วันที่ปิดรับสมัคร</label>
                                        <input class="form-control" id="endDate" name="close" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cover_image">รูปภาพ</label>
                                        <input type="file" class="form-control-file input-modal" name="cover_image"
                                            id="cover_image">

                                        <label for="typeVideo" class="mt-3">เพิ่มวิดีโอ</label>
                                        <div id="typeVideo" class="p-0">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" type="radio" name="videoType"
                                                    id="videoTypeYoutube" value="youtube">
                                                <label for="videoTypeYoutube"
                                                    class="custom-control-label">Youtube</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" type="radio" name="videoType"
                                                    id="videoTypeFile" value="file">
                                                <label for="videoTypeFile" class="custom-control-label">File</label>
                                            </div>
                                        </div>
                                        <div class="form-group" id="content_url">

                                        </div>
                                        <br>
                                        <p class="text-note">
                                            *หมายเหตุ โปรดกำหนดขนาดภาพประกอบคอร์ส เป็นสี่เหลี่ยมจตุรัส
                                            เพื่อให้องค์ประกอบภาพที่คุณต้องการอยู่ในภาพของคุณพอดี
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <hr class=" w-75 mb-4">
            <div class="modal-footer">

                <div class="row p-4">

                    <div class="col-md-2">
                        <button type="submit" form="course_form" id="submit-course">บันทึก</button>
                    </div>
                </div>
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

    $('input[name=videoType]').change(function (e) {
        e.preventDefault();

        $('#content_url').show();

        let videoType = $('input[name=videoType]:checked').val();

        switch (videoType) {
            case 'youtube':
                $('#content_url').html(
                    '<label for="url">URL Video</label><input type="text" class="form-control input-modal" name="url" placeholder="content Name" required>'
                );
                break;

            case 'file':
                $('#content_url').html(
                    '<label for="url">File Video</label><input type="file" class="form-control-file input-modal" name="videoFile" id="videoFile" required>'
                );
                break;
        }
    });

</script>
@endsection
