@extends('admin-teach.webapp.content.Index')

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
                    <div class="status"></div>
                </div>
                <div class="card-subject-body">
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
                            <input class="form-control" type="text" name="" id="AddName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="AddDetail">รายระเอียด</label>
                            <textarea name="" class="form-control" id="AddDetail" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-addimg">
                            <button class="btn-addimg">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <input type="file" hidden name="" id="">
                <div class="container text-left p-3">
                    <p class="text-note">*หมายเหตุ โปรดกำหนดขนาดภาพประกอบคอร์ส เป็นสี่เหลี่ยมจัตุรัส
                        เพื่อให้องค์ประกอบภาพที่คุณต้องการอยู่ในภาพของคุณภาพดี</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="cebtn-save">บักทึก</button>
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

        // $('#newSubject').modal('show');
    });

    function add_subject(){
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

</script>
@endsection
