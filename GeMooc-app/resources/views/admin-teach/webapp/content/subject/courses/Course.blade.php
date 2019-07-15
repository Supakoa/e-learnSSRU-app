@extends('admin-teach.webapp.content.Index')
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
<div class="main-content-header">
    <p id="your_course">{{$subject->name}}</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row m-3">
        <div class="offset-md-8 col-md-4 text-right">


            @php
            $both = auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'teach';
            $adminOnly = auth()->user()->type_user == 'admin';
            @endphp
            @if ($adminOnly)
            <button class="btn-add" data-toggle="modal" data-target="#Add_Modal"><i class="fas fa-folder-plus"></i></button>
            @endif
            @if ($adminOnly)
            <button class="btn-edit"><i class="fas fa-cog send_ajax" onclick="edit_subject({{$subject->id}})"></i></button>
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

                        <img src="{{url('storage/'.$course->image)}}"
                        class="shadow" width="100%" height="100%">
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
                    <div class="btn-subject">
                    <a href="{{url('course/'.$course->id)}}"><button>ไปที่คอร์ส</button></a>
                        <a><i class="fas fa-cog send_ajax " onclick="edit_course({{$course->id}})"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/course')}}" method="post" enctype='multipart/form-data' id="course_form">
                    @csrf
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

ิ
@section('js')
<script>
$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

</script>
@endsection
