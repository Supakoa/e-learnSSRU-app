@extends('layouts.app')

@section('content')
    <div class="container">
        <i class="fa fa-header" aria-hidden="true">Hak pieng kee ther mong sak noi</i>
        <hr>
        <form action="/video" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <input type="file" name="videoSquare" id="videoSquare">
            <button type="submit">send</button>
        </form>
    </div>
@endsection

@section('js')
<script>


</script>
@endsection
