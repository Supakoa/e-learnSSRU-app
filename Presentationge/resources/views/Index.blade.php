@extends('layouts.app')

@section('content')
<section id="banner">
        <div class="img-container"></div>
        <div class="bg-content">
                <img class="img-fluid" src="https://i.redd.it/ndhdiurwmrgy.png" alt="">
        </div>
</section>
<section id="home" class="ce-contentbody">
    <div class="ce-container">
        @include('content.Home')
    </div>
</section>
<section id="subject" class="ce-contentbody">
    <div class="ce-container">
        @include('content.Subject')
    </div>
</section>
<section id="about" class="ce-contentbody">
    <div class="ce-container">
        @include('content.About')
    </div>
</section>
<section id="fq" class="ce-contentbody">
    <div class="ce-container">
        @include('content.Fq')
    </div>
</section>
@endsection
