@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card ce-card">
    <div class="justify-content-start mb-2">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1 class="ce-name">Subject : </h1>
    <div class="ce-container">
        <div class=" text-right mb-3">
            <button id="edit" class="btn btn-outline-warning" onclick="edit()" type="button"><i
                    class="fas fa-cog"></i></button>
            <button id="save" class="btn btn-outline-info" onclick="preview()" type="button"><i
                    class="fas fa-eye"></i></button>
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
                <button class="btn btn-outline-success" id="btn_save" type="submit">Save</button>
            </div>

        </form>
    </div>

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
