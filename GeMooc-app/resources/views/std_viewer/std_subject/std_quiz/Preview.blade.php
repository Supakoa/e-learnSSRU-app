@extends('layouts.appViewer')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">sub.course.id.quiz.dashboard-PreviewYourquiz</h1>
    <div class="ce-container">
        <div class="row">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-md-4">subject:</dt>
                    <dd class="col-md-8">Thai</dd>
                    <dt class="col-md-4">Chapter:</dt>
                    <dd class="col-md-8">1.</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-md-4"><i class="fa fa-list-alt" aria-hidden="true"></i> Total:</dt>
                    <dd class="col-md-8">100</dd>
                    <dt class="col-md-4"><i class="fas fa-clock    "></i> Time:</dt>
                    <dd class="col-md-8">30 minute</dd>
                </dl>
            </div>
        </div>
        <hr>
        {{-- Totall quiz --}}
        <div class="container p-2">
            <div class="row">
                <div class="col-md-8">
                    <dt>1.sdflksjdlkfsakdjfaksd;flkasdjfla;sdflkjas</dt>
                </div>
                <div class="col-md-4">
                    <img class="rounded" width="auto" height="auto"
                        style="max-width: 100%;max-height: 150px" src="" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <ul class="ce-choice">
                        <li>1.</li>
                        <li>2.</li>
                        <li>3.</li>
                        <li>4.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ce-line"></div>
        {{-- Totall quiz --}}

        <div class="row">
            <div class="offset-4 col-md-4 text-center">
                <button class="btn btn-login">
                    <i class="fas fa-print"></i>
                    Print Now.
                </button>
            </div>
        </div>

    </div>
</div>
@endsection
