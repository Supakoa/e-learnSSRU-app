@extends('admin-teach.webapp.content.Index')

@section('links')

@endsection
@section('main-content')
<div class="card p-4">
        <div class="row" style="border-bottom:2px solid #707070">
                <div class="col-md-4">
                    <div class="text-left">
                            <a href="#"><i class="fas fa-chevron-left"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Subject : </h4>
                    </div>
                </div>
            </div>
    <div class="card-body">
        <div class="text-right mb-4">
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
