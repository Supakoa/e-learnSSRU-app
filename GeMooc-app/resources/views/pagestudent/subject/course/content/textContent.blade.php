@extends('pagestudent.index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
@endpush

@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        @include('pagestudent.navs.navsLeft')
    </div>
    <div class="sectionContent">
        <div class="card">
            <div class="head-card">
                <p>ชื่อบท</p>
            </div>
            <div class="card-body">
                <div class="container">
                    <dd>
                        information
                    </dd>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
