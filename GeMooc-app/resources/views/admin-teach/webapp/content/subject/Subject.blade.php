@extends('admin-teach.webapp.content.Index')

@push('styleNewSubject')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/subject/new/new.css') }}">
@endpush
@push('scriptNewSubject')
<script src="{{ asset('node_modules/CEFstyle/subject/new/new.js') }}"></script>
@endpush

@section('main-content')
<div class="main-content-header">
    <p>วิชา</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row m-3">
        <div class="offset-md-8 col-md-4 text-right">
            <button id="add_subject">เพิ่มวิชา</button>
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
                        <button class="btn-subject" onclick="window.location.href='{{url('subject/'.$subject->id)}}'">ไปที่วิชา</button>
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
<div class="modal fade" id="newSubject">
    {{-- set center --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="newModalBody">
            <div class="modal-header">
                <h3>เพิ่มรายวิชา</h3>
                <hr>
            </div>
            <div class="modal-body">
                <p>ชื่อวิชา</p>
                <input type="text" name="" id="">
                <p>รายระเอียด</p>
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <input type="file" name="" id="">
                <p>*หมายเหตุ โปรดกำหนดขนาดภาพประกอบคอร์ส เป็นสี่เหลี่ยมจัตุรัส เพื่อให้องค์ประกอบภาพที่คุณต้องการอยู่ในภาพของคุณภาพดี</p>
            </div>
        </div>
    </div>
</div>
<div id="sub_modal"></div>
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

        $('#newSubject').modal('show');
    });

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
