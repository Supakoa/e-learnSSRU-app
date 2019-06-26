@extends('layouts.appViewer')
{{-- {{dd($lessons)}} --}}

@section('content')
<div class="row">
        <div class="col-md-2 p-0">
            @include('std_viewer.nav-left.Nav-left',[$now_content,$lessons])
        </div>
        <div class="col-md-10">
            <div class="card ce-card">
                <div class="justify-content-center p-0">
                    <div class="ce-conainer">
                        <h1 class="ce-name">That course content.text</h1>
                        <dl class="row">
                            <dd class="col-md-10 " >

                                   {!!$article->rawdata!!}

                            </dd>
                        </dl>

                        {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Now, this page Empty!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> --}}
                        <form action="{{url('std_view/course/content/'.$article->content->id.'/submit_article')}}" method="post" id="form_article">
                            @csrf
                            <div class="offset-10 col-2">
                                <button type="submit">อ่านแล้ว</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
