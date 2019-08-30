@extends('admin-teach.webapp.content.Index')
@section('title')
วิชาทั้งหมด | MOOC SSRU
@endsection
@push('script')
<script src="{{ asset('node_modules/CEFstyle/subject/new/new.js') }}"></script>
@endpush

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceModal.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/subject/new/new.css') }}">
@endpush

@section('main-content')
<div class="main-content-header">
    <p>วิชา</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row m-3">
        <div class="offset-md-8 col-md-4 text-right">
            <button onclick="add_subject()" id="add_subject">เพิ่มวิชา</button>
        </div>
    </div>
    <div class="row">
        @foreach ($subjects as $subject)
        <div class="col-md-4 mb-3">
            <div class="card-subject">
                <div class="card-subject-header">
                    <img src="{{url('storage/'.$subject->image)}}" class="shadow" width="100%" height="100%">
                    <div class="status-{{$subject->status ? 'on' : 'off'}}"></div>
                </div>
                <div class="card-subject-body pt-2">
                    <p>{{$subject->name}}</p>
                    <div class="section-subject-btn">
                        <button class="btn-subject"
                            onclick="window.location.href='{{url('subject/'.$subject->id)}}'">ไปที่วิชา</button>
                        <i onclick="edit_subject({{$subject->id}})" class="fas fa-cog btn-cogs"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection

@section('modal')
<div id="sub_modal"></div>
<div class="modal fade" id="newSubject">
    {{-- set center --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="newModalBody">
            <form action="{{url('subject')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <div class="sub-head">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5>เพิ่มรายวิชา</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AddName">ชื่อวิชา</label>
                                <input class="form-control" type="text" name="name" id="AddName">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AddDetail">รายระเอียด</label>
                                <textarea name="detail" class="form-control" id="AddDetail" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AddFile">รูปประจำวิชา</label>
                                <input type="file" name="cover_image" id="AddFile">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
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
                    </div>
                    {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="bg-addimg">
                            <button class="btn-addimg">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}
                    {{-- <input type="file" hidden name="cover_image" id=""> --}}
                    <div class="container text-left p-3">
                        <p class="text-note">*หมายเหตุ โปรดกำหนดขนาดภาพประกอบคอร์ส เป็นสี่เหลี่ยมจัตุรัส(1000*1000)
                            เพื่อให้องค์ประกอบภาพที่คุณต้องการอยู่ในภาพของคุณภาพดี</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="cebtn-save">บันทึก</button>
                </div>
            </form>
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

        // $('#newSubject').modal('show');
    });

    function add_subject() {
        $('#newSubject').modal('show');
    }

    function edit_subject(id) {
        $.ajax({
            type: "post",
            url: "subject/modal/edit",
            data: {
                id: id
            },
            dataType: "html",
            success: function (response) {
                $('#sub_modal').html(response);
                $('#Edit_Modal').modal("show")
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
@endsection
