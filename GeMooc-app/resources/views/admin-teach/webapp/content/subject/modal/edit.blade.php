<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="sub-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขวิชา -> {{$sub->name}}</h5>
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
                        <button type="button" class="btn-modal" onclick="delete_subject('{{$sub->id}}')"><i class="fa fa-trash"
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
                        <button class="btn-upimg m-2"  onclick="$('#cover_image').trigger('click')" type="button" >เลือกไฟล์ภาพ</button>
                    </div>
                </div>
                <div class="row">
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
