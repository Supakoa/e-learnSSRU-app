@extends('admin-teach.webapp.content.Index')

@section('links')

@endsection
@section('main-content')
<div class="card p-4">
    <div class="text-center">
        <h5>that content</h5>
    </div><hr>
    <div class="card-body">
        <div class="text-right mb-3">
            <a href="{{url('/article/'.$article->id.'/edit')}}" class="btn btn-md btn-outline-warning"> <i
                    class="fas fa-cog"></i></a>
        </div>
        @if ($article->rawdata == "กรุณาเพิ่มเนื้อหา")
        <div id="summernote">
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong>{!!$article->rawdata!!}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @else
        <div id="summernote">{!!$article->rawdata!!}</div>
        @endif
    </div>
</div>
@endsection
