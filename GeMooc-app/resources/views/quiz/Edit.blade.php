@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <div class="justify-content-start mb-2">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1 class="ce-name">Editor - Quiz</h1>
    <div class="ce-container">
        <div class="row">
            <div class="col-md-6">
                <div class="create-quiz"></div>

            </div>
            <div class="col-md-6">
                <div class="preview-quiz"></div>

            </div>
        </div>
    </div>
</div>
@endsection
