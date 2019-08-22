<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="sub-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">Edit Subject -> {{$sub->name}}</h5>
                </div>
            </div>
            <div class="modal-body">
                {{-- new-design --}}

                <form action="{{url('/subject/'.$sub->id)}}" method="POST" enctype='multipart/form-data' id="sub_form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="sub_id" value="{{$sub->id}}">
                <div class="row">
                    <div class="col-md-4 offset-md-8 text-right p-0">
                        <button class="btn-modal" onclick="delete_subject('{{$sub->id}}')"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nameSubject">ชื่อวิชา</label>
                            <input type="text" class="form-control" name="name" value="{{$sub->name}}"
                            placeholder="ชื่อวิชา">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="detailSubject">รายละเอียด</label>
                            <textarea id="detailSubject" class="form-control" name="detail" rows="5"placeholder="รายละเอียดวิชา">{{$sub->detail}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row ce01">
                    <div class="col-md-12 text-center">
                        <div class="bg-addimg">
                                <img src="{{ url("/storage/".$sub->image) }}" alt="" width="80%" srcset="">
                        </div>
                        <label for="name">Cover Image (1000*1000) </label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" hidden placeholder="Image">
                        <button class="btn-upimg m-2" onclick="$('#cover_image').trigger('click') " >เลือกไฟล์ภาพ</button>
                    </div>
                </div>
            </form>
                {{-- new-design --}}

                {{-- <div class="row">
                    <div class="offset-md-8 col-md-2 text-right" style="margin-right:-20px">
                        <span>Online :</span>
                    </div>
                    <div class="col-md-1 ">
                        @php
                        $check = '';
                        if($sub->status!=0){
                        $check = 'checked';
                        }
                        @endphp
                        <input class="tgl tgl-flat ce-checkbox" id="cb4" {{$check}} value="1" form="sub_form"
                name='status' type="checkbox" />
                <label class="tgl-btn" for="cb4"></label>

            </div>

        </div>
        <form action="{{url('/subject/'.$sub->id)}}" method="POST" enctype='multipart/form-data' id="sub_form">
            @csrf
            @method('PATCH')
            <input type="hidden" name="sub_id" value="{{$sub->id}}">

                    <div class="form-group">
                        <label for="name">Subject Name</label>
                        <input type="text" class="form-control" name="name" value="{{$sub->name}}"
                            placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" value="{{$sub->detail}}"
                            placeholder="Subject Detail">
                    </div>
                    <div class="form-group text-center">
                        <img src="{{ url("/storage/".$sub->image) }}" alt="" width="80%" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="name">Cover Image (1000*1000) </label>
                        <input type="file" class="form-control" name="cover_image" placeholder="Image">
                    </div>

                </form>
            <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="text" class="form-control" name="name" value="{{$sub->name}}" placeholder="Subject Name">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <input type="text" class="form-control" name="detail" value="{{$sub->detail}}"
                    placeholder="Subject Detail">
            </div>
            <div class="form-group text-center">
                <img src="{{ url("/storage/".$sub->sm_banner) }}" alt="" width="100%" srcset="">
            </div>
            <div class="form-group">
                <label for="name">Cover Image (Small : 400*255) </label>
                <input type="file" class="form-control" name="cover_image_sm" placeholder="Image">
            </div>
            <div class="form-group text-center">
                <img src="{{ url("/storage/".$sub->xl_banner) }}" alt="" width="100%" srcset="">
            </div>
            <div class="form-group">
                <label for="name">Cover Image (Large : 1600*600) </label>
                <input type="file" class="form-control" name="cover_image_xl" placeholder="Image">
            </div>
        </form> --}}
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                            @php
                            $check = '';
                            if($sub->status!=0){
                            $check = 'checked';
                            }
                            @endphp
                        <div class="custom-control custom-switch pl-5 pb-2 pt-0">
                            <input type="checkbox" class="custom-control-input"  value="1" {{$check}} form="sub_form" name="status" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">ออนไลน์</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-note">
                              *หมายเหตุ โปรดกำหนดขนาดภาพประกอบคอร์ส เป็นสี่เหลี่ยมจตุรัส
                            เพื่อให้องค์ประกอบภาพที่คุณต้องการอยู่ในภาพของคุณพอดี
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button class="cebtn-save" type="submit" form="sub_form"  id="sub_btn">บันทึก</button>
            </div>
        </div>
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="sub_form" id="sub_btn">Save changes</button> --}}
    </div>
</div>
</div>
</div>

<div id="div_delete">
    <form action="{{url('subject/'.$sub->id)}}" method="post" id='form_del_Subject'>
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
    function delete_subject(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "All Course in Subject will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $('#form_del_Subject').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    }
    $('.ce-checkbox').click(function (e) {
        if ($(this).prop('checked') == true) {
            Swal.fire({
                title: 'Are you sure?',
                text: "เนื้อหาขอท่านต้องพร้อมเผยแพร่",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    $(this).prop('checked', true)
                    // Swal.fire(
                    //     '!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                } else {
                    $(this).prop('checked', false)

                }
            });
        } else {
            Swal.fire({
                title: 'Are you sure?',
                text: "ผู้เรียนจะไม่สามารถเข้าถึงวิชานี้ได้",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    $(this).prop('checked', false)
                    // Swal.fire(
                    //     '!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                } else {
                    $(this).prop('checked', true)
                }
            });
        }

    });

</script>
