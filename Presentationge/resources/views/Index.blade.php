@extends('layouts.app')

@section('content')
<section id="banner">
        <img src="" class="img-fluid" alt="">
</section>
<section id="home">
    <div class="ce-container">
        @include('content.Home')
    </div>
</section>
<section id="subject">
    <div class="ce-container">
        @include('content.Subject')
    </div>
</section>
<section id="about">
    <div class="ce-container">
        @include('content.About')
    </div>
</section>
<section id="fq">
    <div class="ce-container">
        @include('content.Fq')
    </div>
</section>
@endsection
