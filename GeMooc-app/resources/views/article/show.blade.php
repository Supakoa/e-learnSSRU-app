@extends('layouts.app')

@section('content')
<div class="card ce-card">
        <h1 class="ce-name">{{$content->name}}</h1>
        <div>
            {{$article->rawdata}}
        </div>
</div>
@endsection
