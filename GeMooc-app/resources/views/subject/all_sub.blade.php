@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">Total Subject</h1>
    <div class="row justify-content-end">
        <div class="offset-md-3 col-md-9 ">
            <button class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#exampleModal">Add
                Subject</button>
        </div>
    </div>
    <div class="row ce-container">
        @if ($sub->count() > 0)
        @foreach ($sub as $sub)
        <div class="col-md-3">
            <figure class="imghvr-flip-vert" style="background:inherit">
                <img class="ce-img" src="/storage/cover_images/{{$sub->sm_banner}}">
                <figcaption style="background-color:#ff99ff;">
                    <h3 class="ih-fade-down ih-delay-sm ">{{$sub->name}}</h3>
                    <p class="ih-zoom-in ih-delay-md">
                        <i>{{$sub->detail}}</i>
                    </p>
                </figcaption>
                <a href="/subject/{{$sub->subject_id}}"></a>
            </figure>
        </div>
        @endforeach
        @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Now, Not have subject !!!</strong> Can you click Add Subject button for make new subject.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/subject')}}" method="post" enctype='multipart/form-data' id="sub_form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Subject Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" placeholder="Subject Detail">
                    </div>

                    <div class="form-group">
                        <label for="name">Cover Image</label>
                        <input type="file" class="form-control" name="cover_image" placeholder="Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sub_btn">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('#sub_btn').click(function (e) {
        e.preventDefault();
        $('#sub_form').submit();
    });

</script>
@endsection
