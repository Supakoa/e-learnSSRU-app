{{-- {{$course}} --}}
<div class="modal fade " id="Edit_Course_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="course-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขคอร์ส</h5>
                </div>
            </div>
            <div class="modal-body pl-5 pr-5 pb-0">
                @php
                $check = '';
                if($course->status!=0){
                $check = 'checked';
                }
                @endphp

                <form  action="{{url('course/'.$course->id)}}" method="post" enctype='multipart/form-data' id="course_form">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="courseName">ชื่อคอร์ส</label>
                                <input id="courseName" name="name" class="form-control" value="{{$course->name}}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="courseName">รายละเอียด</label>
                                    <input id="courseName" name="detail" class="form-control" value="{{$course->detail}}" type="text">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="courseOpen">เปิดรับสมัคร</label>
                                        <input id="courseOpen" name="total" value="{{$course->total}}" min="0" class="form-control" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startDate">วันที่เปิดรับสมัคร</label>
                                        <input id="startDate"  name="open" value="{{$course->open}}" class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endDate">วันที่ปิดรับสมัคร</label>
                                        <input class="form-control" name="close" value="{{$course->close}}" id="endDate" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="lession">บทเรียน</label>
                                    <div class="form-group h-100 overflow-auto">
                                        <ul class="list-group list-group-flush" id="lession" >
                                            @foreach ($course->lessons as $lesson)
                                                <li class="list-group-item">- {{$lesson->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-5">
                            <div class="bg-addimg">
                            <img src="{{url('/storage/'.$course->image)}}" alt="...">
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center p-4">
                                    <input type="file" id="cover_image" name="cover_image" hidden id="">
                                    <button type="button"  onclick="$('#cover_image').trigger('click') " class="btn-upimg">เลือกไฟล์ภาพ</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="typeVideo">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="videoType"
                                        id="videoTypeYoutube" value="youtube" >
                                    <label for="videoTypeYoutube" class="custom-control-label">Youtube</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="videoType"
                                        id="videoTypeFile" value="file" >
                                    <label for="videoTypeFile" class="custom-control-label">File</label>
                                </div>
                            </div>
                            <div class="form-group" id="content_url">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row p-4">
                    <div class="col-md-6 text-information">
                        <div class="row">
                            <div class="offset-md-8 col-md-4">
                                <div class="custom-control custom-switch p-3">
                                    <input type="checkbox" form="course_form" value="1" {{$check}} class="custom-control-input" name="status" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">ออนไลน์</label>
                                </div>
                            </div>
                        </div>
                        <p class="text-note">
                            *หมายเหตุ โปรดกำหนดขนาดภาพประกอบคอร์ส เป็นสี่เหลี่ยมจตุรัส
                            เพื่อให้องค์ประกอบภาพที่คุณต้องการอยู่ในภาพของคุณพอดี
                        </p>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" form="course_form" id="submit-course">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="offset-md-8 col-md-2 text-right" style="margin-right:-20px">
                        <span>Online :</span>
                    </div>
                    <div class="col-md-1">
                        @php
                        $check = '';
                        if($course->status!=0){
                        $check = 'checked';
                        }
                        @endphp
                        <input class="tgl tgl-flat" id="cb4" name="status" {{$check}} form="course_form" value='1'
        type="checkbox" />
        <label class="tgl-btn" for="cb4"></label>

    </div>
    <div class="col-md-1 text-right">
        <button class="btn btn-outline-danger btn-sm" onclick="delete_course('{{$course->id}}')"><i class="fa fa-trash"
                aria-hidden="true"></i></button>
    </div>
</div>
<form action="{{url('course/'.$course->id)}}" method="post" enctype='multipart/form-data' id="course_form">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Course Name</label>
        <input type="text" class="form-control" name="name" value="{{$course->name}}" placeholder="Course Name">
    </div>
    <div class="form-group">
        <label for="detail">Detail</label>
        <input type="text" class="form-control" name="detail" value="{{$course->detail}}" placeholder="Course Detail">
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="name">Open</label>
                <input type="date" class="form-control" name="open" value="{{$course->open}}">
            </div>
            <div class="col">
                <label for="name">Close</label>
                <input type="date" class="form-control" name="close" value="{{$course->close}}">
            </div>
        </div>


    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="name">Total</label>
                <input type="number" class="form-control" name="total" value="{{$course->total}}"
                    placeholder="Course Name">
            </div>
            <div class="col">
                <label for="name">Cover Image</label>
                <input type="file" class="form-control btn" style="padding:3px" name="cover_image" placeholder="Image">
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <img src="{{url('/storage/'.$course->image)}}" alt="" width="100%" srcset="">
    </div>

</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="course_form">Save changes</button>
</div>
</div> --}}
</div>
</div>
<form action="{{url('course/'.$course->id)}}" method="post" id='form_del_Course'>
    @csrf
    @method('DELETE')
</form>

<script>
    function delete_course(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "All Course in Course will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $('#form_del_Course').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
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
                    '<label for="url">File Video</label><input type="file" class="form-control input-modal" name="videoFile" id="videoFile" required>'
                    );
                break;
        }
    });

</script>
