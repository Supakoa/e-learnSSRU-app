@extends('pagestudent.Index')
@section('title')
คู่มือ | MOOC SSRU
@endsection
@section('mainContent')
<div class="container-fluid">
    <div class="bd-example">
        <div id="carouselExampleCaptions m-auto" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($manuals as$key=>$manual)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}}">
                </li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($manuals as$key=>$manual)
                <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                    <img src="{{url(''.$manual->image)}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        {{-- <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $('.carousel').carousel()

</script>
@endpush
