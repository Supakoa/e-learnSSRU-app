@extends('layouts.app')

@section('content')
<div class="row">
    <div class="justify-content-between">
        <h2>Subject</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Subject</button>
    </div>


</div>
<div class="row justify-content-center">
    <div class="col-md-10 justify-content-center">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-baseline">
            </div>
            <div class="card-body">
                <div class="row ">
                    @foreach ($sub as $sub)
                    <div class="col-md-4 mb-2">
                        <a href="/subject/{{$sub->subject_id}}">
                            <div class="card " style="width: 18rem;">
                                <img src="/storage/cover_images/{{$sub->sm_banner}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$sub->name}}</h5>
                                    <p class="card-text">{{$sub->detail}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
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
