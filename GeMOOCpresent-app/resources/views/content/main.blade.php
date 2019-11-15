@extends('index')

@section('main')
<div class="w-100 bg-info position-relative h-100" style="min-height:100vh;padding-top:96px">
    <div class="bg-danger w-25 position-absolute m-auto" style="height:10vh">

    </div>
</div>

<div class="w-100 bg-warning position-relative h-100" style="min-height:100vh;">

</div>

<div class="w-100 h-100 bg-success" style="min-height:50vh;">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection


