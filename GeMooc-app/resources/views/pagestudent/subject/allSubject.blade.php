@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/carousel/carouselSubject.css')}}">
@endpush

@push('js')
<script src="{{ asset('node_modules/CEFstyle/cssStudent/carousel/carouselSubject.js') }}"></script>
@endpush

@section('mainContent')
<div class="nav-name">
    <p>หลักสูตรที่เปิดสอน</p>
</div>
<div class="container-fluid mt-5">
    <div class="carousel">
        <img src="http://placehold.it/600x350/faf345/000000&text=item 1" alt="Image 1" />
        <img src="http://placehold.it/600x350/ffa345/000000&text=item 2" alt="Image 2" />
        <img src="http://placehold.it/600x350/ffa3ee/000000&text=item 3" alt="Image 3" />
        <img src="http://placehold.it/600x350/ffd3ee/000000&text=item 4" alt="Image 4" />
        <img src="http://placehold.it/600x350/fda30e/000000&text=item 5" alt="Image 5" />
    </div>
</div>
<div class="text-center w-100 startCourse">
    <p class="nameSub">ชื่อวิชา</p>
    <p class="statusSub">status</p>
    <button>
        เริ่มคอร์ส
    </button>
</div>
@endsection
