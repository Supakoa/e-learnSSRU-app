@extends('pagestudent.Index')
@section('title')
คำถามที่พมบ่อย | MOOC SSRU
@endsection

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/FAQ.css')}}">
@endpush

@section('mainContent')
    <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                            @foreach ($faqs as$key=>$faq)
                            <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                    <img src="{{url(''.$faq->image)}}" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            {{-- <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
                          </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
    </div>
@endsection
