@extends('layouts.app')

@section('content')
<div class="card ce-card h-100">
    <h1 class="ce-name">Total Subject</h1>
    <div class="row justify-content-end mb-2">
        <div class="ce-card-btn">
            <button class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#exampleModal">Add
                Subject</button>
        </div>
    </div>
    <div class="ce-container">
        @if ($sub->count() > 0)
        <div class="row mb-3 justify-content-center">
            @foreach ($sub as $sub)
            <div class="col-md-4 h-100">
                <div class="card shadow " style="width: 18rem;">
                    <img class="card-img-top" src="/storage/{{$sub->sm_banner}}">
                    <div class="card-body" style="background-color: white;">
                        <h5 class="card-title">{{$sub->name}}</h5>
                        <p class="card-text">{{$sub->detail}}</p>
                        <div class="text-right ce-card-btn">
                            <a href="/subject/{{$sub->id}}" class="btn btn-block btn-sm btn-outline-warning shadow">Go to Course</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

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
                        <label for="name">Cover Image (Small : 400*255)</label>
                        <input type="file" class="form-control btn" style="padding:3px" name="cover_image"
                            placeholder="Image">
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
