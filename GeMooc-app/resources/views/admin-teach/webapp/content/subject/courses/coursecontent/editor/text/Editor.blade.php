@extends('admin-teach.webapp.content.Index')
@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@section('main-content')

<div class="card p-4">
    @php
    $course = $article->content->lesson->course;
    @endphp
    <div>
        <a class="badge badge-dark" href="{{url('/subject')}}">วิชา</a> / <a class="badge badge-dark"
            href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}} </a> / <a
            class="badge badge-dark" href="{{url('/course/'.$course->id)}}">{{$course->name}}</a> /
        <a class="badge badge-dark" href="{{url('/course/'.$course->id)}}">{{$article->content->lesson->name}}</a> / <a
            class="badge badge-dark" href="{{url('/article/'.$article->id)}}">{{$article->content->name}}</a> / <a
            class="badge badge-dark" href="{{url('/article/'.$article->id.'/edit')}}">แก้ไข</a>
    </div>
    <br>
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <div class="text-center">
                <h4>บทความ : {{$article->content->name}}</h4>
            </div>
        </div>
    </div>
    <hr>
    <div class=" text-right mb-4">
        <button id="save" class="btn-add" onclick="preview()" type="button"><i class="fas fa-eye"></i></button>
        <button id="edit" class="btn-edit" onclick="edit()" type="button"><i class="fas fa-cog"></i></button>
    </div>
    <div class="form-group">
      <label for="name">ชื่อบทความ</label>
      <input form="form_article" type="text" class="form-control" name="name" value="{{$article->content->name}}" id="name" aria-describedby="helpId" placeholder="ชื่อบทความ">
      <small id="helpId" class="form-text text-muted">กรุณากรอกชื่อบทความ</small>
    </div>

    <div id="summernote">
        @if ($article->rawdata == "กรุณาเพิ่มเนื้อหา")
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>{!!$article->rawdata!!}!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @else
        {!!$article->rawdata!!}
        @endif

    </div>
    <form action="{{url('/article/'.$article->id)}}" method="post" id="form_article">
        @csrf
        @method('PATCH')
        <input type="hidden" name="rawdata" id="rawdata">
        <div class=" text-right">
            <br>
            <button class="btn-add" style="width:100%;" id="btn_save" type="submit"><i class="far fa-save"></i>
                บันทึก</button>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $('#btn_save').click(function (e) {
        e.preventDefault();
        $('#rawdata').val($('#summernote').summernote('code'));
        $('#form_article').submit();

    });
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $('#summernote').summernote({
        placeholder: 'มาเขียนตรงนี้',
        // airMode: true,
        height: 650,
        callbacks: {
            onImageUpload: function (files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            },
            onMediaDelete: function (target) {
                deleteFile(target[0].src);
            }
        },
        codemirror: { // codemirror options
            theme: 'monokai'
        }
    });

    function edit() {
        $('#summernote').summernote({
            focus: true,
            height: 650
        });
        $('#btn_save').show();

    }

    function preview() {
        $('#summernote').summernote('destroy');
        $('#btn_save').hide();
    }

    function sendFile(file, editor, welEditable) {
        data2 = new FormData();
        data2.append("file", file);
        $.ajax({
            data: data2,
            type: 'post',
            url: '{{url("/ajaximage")}}',
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
                $('#summernote').summernote('insertImage', url);
                // editor.insertImage(welEditable, url);
            }

        });
    }

    function deleteFile(src) {

        $.ajax({
            data: {
                src: src
            },
            type: "POST",
            url: '{{url("/ajaximage_delete")}}', // replace with your url
            cache: false,
            success: function (resp) {
                console.log(resp);

            }
        });
    }

</script>
@endsection
