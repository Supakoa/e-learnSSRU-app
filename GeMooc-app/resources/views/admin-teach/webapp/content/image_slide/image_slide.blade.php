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

<div class="card bg-card">
    <div class="container" display="inline">
        <div class="text-center">
            <h2>คำถามที่พบบ่อย</h2>
        </div>
        <div class="row">


            {{-- main --}}
            @if (isset($faq))
            @for ($i = 0; $i< sizeof($faq); $i++) <div class="col-3">
                <div class="image_slide">
                    <img src="{{ $faq[$i]->image }}" class="mt-5" id="imageShow" width='100%' height="auto" />
                    <button type="button" class="x_button" onclick="delete_faq({{$faq[$i]->id}})">
                        X
                    </button>
                </div>

        </div>

        @endfor
        @endif
    </div>
    <hr>
    <div class="text-center">
        <h2>ข่าวประชาสัมพันธ์</h2>
    </div>
    <div class="row">


        {{-- main --}}
        @if (isset($news))
        @for ($i = 0; $i< sizeof($news); $i++) <div class="col-3">
            <a href="{{$news[$i]->url}}" target="_blank">
            <div class="image_slide">
                <img src="{{ $news[$i]->image }}" class="mt-5" id="imageShow" width='100%' height="auto" />
                <button type="button" class="x_button" onclick="delete_news({{$news[$i]->id}})">
                    X
                </button>
            </div>
            </a>
    </div>

    @endfor
    @endif
</div>
<hr>
<form action="{{url("/image_slide")}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('POST')
    <select name="type" id="image_type" required>
        <option value="" disabled selected>เลือกประเภทของภาพ</option>
        <option value="news">ข่าวประชาสัมพันธ์</option>
        <option value="faq">คำถามที่พบบ่อย</option>
    </select>

    <input type="file" name="image" id="" accept="image/x-png,image/gif,image/jpeg" />

            <input type="text" name="url" id = "image_url" placeholder="กรอก URL ของข่าว">

    <button type="submit" class="btn btn-primary" btn-lg btn-block>save</button>
</form>
</div>
</div>
@endsection
@section('modal')
<div id="div_delete"></div>
@endsection
@push('script')
{{-- <script src="{{ asset('node_modules/CEFstyle/guidebook/view/index.js')}}"></script> --}}
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
        if($(this).val()=="news"){
            $("#image_url").show();
        }
    });
</script>
@endpush
