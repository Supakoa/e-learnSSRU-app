@extends('layouts.app')

@section('content')
<div class="card ce-card">

        <div class="ce-content">
                <h1 class="ce-name">{{$content->name}}</h1>
                <div class=" text-right">
                        {{-- <a href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_Modal"> <i
                                class="fas fa-folder-plus"></i> </a> --}}
                        <a href="{{url('/article/'.$article->id.'/edit')}}" class="btn btn-md btn-outline-warning"> <i
                                class="fas fa-cog"></i></a>
                </div>
                <br><br>

                    <div id="summernote">
                            {!!$article->rawdata!!}
                    </div>

        </div>
</div>
@endsection

