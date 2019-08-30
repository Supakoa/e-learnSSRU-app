@extends('pagestudent.index')
@section('title')
{{$now_content->name}} | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        @include('pagestudent.navs.navsLeft',[$now_content,$lessons])
    </div>
    <div class="sectionContent">
        <div class="card">
            <div class="head-card">
                <p>{{$now_content->name}}</p>
            </div>
            <div class="card-body">
                <div class="container">
                    <dd>
                        {!!$article->rawdata!!}
                    </dd>
                </div>
                <form action="{{url('std_view/course/content/'.$article->content->id.'/submit_article')}}" method="post" id="form_article">
                    @csrf
                    <div class="offset-10 col-2">
                        <button class="btn btn-success" type="submit">อ่านแล้ว</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
