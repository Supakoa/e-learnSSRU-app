
@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card ce-card">
    <h1 class="ce-name">Subject : </h1>
        <div class="">
            <div class=" text-right mr-2 mb-3">
                <button id="edit" class="btn btn-primary" onclick="edit()" type="button">Edit</button>
                <button id="save" class="btn btn-primary" onclick="preview()" type="button">Preview</button>
            </div>

            <div id="summernote">
                    {!!$article->rawdata!!}
            </div>
        <form action="{{url('/article/'.$article->id)}}" method="post" id="form_article">
            @csrf
            @method('PATCH')
            <input type="hidden" name="rawdata" id="rawdata">
            <div class=" text-right">
                <br>
                    <button class="btn btn-success" id="btn_save" type="submit">Save</button>
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
            onMediaDelete : function(target) {
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
            data: {src : src},
            type: "POST",
            url: '{{url("/ajaximage_delete")}}', // replace with your url
            cache: false,
            success: function(resp) {
               console.log(resp);

            }
        });
    }

</script>
@endsection
