@extends('admin-teach.webapp.content.Index')

@section('title')
ตั้งค่าคำถามที่พบบ่อย | MOOC SSRU
@endsection

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/image_slide.css')}}">
@endpush

@section('main-content')
<div class="offset-md-4 col-md-4">
    <div class="text-center">
        <h2 class="t-shadow" style="border-bottom:2px solid gray;padding:10px;color:white">จัดการรูปภาพในสไลด์</h2>
    </div>
</div>

<div class="card bg-card p-5">
    <div class="container-fluid" display="inline">
        <div class="text-center">
            <h4>คำถามที่พบบ่อย</h4>
        </div>
        <div class="row">
            {{-- main --}}
            @if (sizeof($faq) != 0)
            @for ($i = 0; $i< sizeof($faq); $i++) <div class="col-md-4">
                <div class="image_slide">
                    <img src="{{ $faq[$i]->image }}" class="mt-5" id="imageShow" width='100%' height="auto" />
                    <button type="button" class="x_button" onclick="delete_faq({{$faq[$i]->id}})">
                        <i class="fa fa-window-close" aria-hidden="true"></i>
                    </button>
                </div>
        </div>
        @endfor

        @else
        <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
                <strong>ยังไม่มีภาพคำถามที่พบบ่อย</strong> เลือกประเภทของภาพด้านล่างแล้วอัพโหลด
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
    </div>

    <hr>
    <div class="text-center">
        <h4>ข่าวประชาสัมพันธ์</h4>
    </div>
    <div class="container-fluid row overflow-auto h-100">
        {{-- main --}}
        @if (sizeof($news) != 0)
        @for ($i = 0; $i< sizeof($news); $i++) <div class="col-md-4">
            <div class="image_slide m-3">
                <a href="{{$news[$i]->url}}" class="p-0" target="_blank">
                    <img src="{{ $news[$i]->image }}" class="rounded" id="imageShow" width='100%' height="auto" />
                </a>
                <button type="button" class="x_button" onclick="delete_news({{$news[$i]->id}})">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                </button>
            </div>
    </div>
    @endfor
    @else
    <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
            <strong>ยังไม่มีภาพข่าวประชาสัมพันธ์</strong> เลือกประเภทของภาพด้านล่างแล้วอัพโหลดพร้อมลิ้งค์ที่อยู่
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

    @endif
</div>

<hr>
<form action="{{url("/image_slide")}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('POST')
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="image_type">ประเภท</label>
        </div>
        <select class="custom-select" id="image_type" name="type">
            <option value="" disabled selected>เลือกประเภทของภาพ</option>
            <option value="news">ข่าวประชาสัมพันธ์</option>
            <option value="faq">คำถามที่พบบ่อย</option>
        </select>
    </div>

    {{-- <select name="type" id="image_type" required>
        <option value="" disabled selected>เลือกประเภทของภาพ</option>
        <option value="news">ข่าวประชาสัมพันธ์</option>
        <option value="faq">คำถามที่พบบ่อย</option>
    </select> --}}

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupImage">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" onchange="$('#text_file').text($(this).val())" name="image" class="custom-file-input" id="inputGroupImage"
                aria-describedby="inputGroupImage" accept="image/x-png,image/gif,image/jpeg">
            <label class="custom-file-label" id="text_file" for="inputGroupImage">Choose file</label>
        </div>
    </div>
    {{-- <input type="file" name="image" id="" accept="image/x-png,image/gif,image/jpeg" /> --}}

    <div class="input-group" id="image_url">
        <div class="input-group-append">
            <span class="input-group-text">กรอก URL ของข่าว</span>
        </div>
        <input type="text" class="form-control" name="url" id="image_url" aria-label="">
    </div>
    <br>

    {{-- <input type="text" name="url" id="image_url" placeholder="กรอก URL ของข่าว"> --}}

    <button type="submit" class="btn btn-primary float-right btn-md">บันทึก</button>
</form>
</div>
</div>
@endsection
@section('modal')
<div id="div_delete"></div>
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $("#image_url").hide();
    });

    function delete_faq(id) {
        form = `<form action="{{url('image_slide/` + id + `')}}" method="post" id='form_del_faq'>
                        @csrf
                        @method('DELETE')
                    </form>`;
        $('#div_delete').html(form);
        Swal.fire({
            title: 'กดยืนที่จะลบรูปภาพนี้ ?',
            // text: "กดต",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่,ลบรูปภาพ',
            cancelButtonText: 'ยกเลิก'

        }).then((result) => {
            if (result.value) {

                $('#form_del_faq').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    }

    function delete_news(id) {
        form = `<form action="{{url('image_slide/` + id + `')}}" method="post" id='form_del_news'>
                        @csrf
                        @method('DELETE')
                    </form>`;
        $('#div_delete').html(form);
        Swal.fire({
            title: 'กดยืนที่จะลบรูปภาพนี้ ?',
            // text: "กดต",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่,ลบรูปภาพ',
            cancelButtonText: 'ยกเลิก'

        }).then((result) => {
            if (result.value) {

                $('#form_del_news').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    }

    $("#image_type").change(function (e) {
        e.preventDefault();
        $("#image_url").hide();
        $("#image_url").val("");
        if ($(this).val() == "news") {
            $("#image_url").show();
        }
    });

</script>
@endpush
