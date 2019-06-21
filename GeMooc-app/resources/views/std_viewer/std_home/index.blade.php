@extends('layouts.appViewer')

@section('content')
<div class="container">
    <div class="card ce-card">
        <div class="ce-container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">My Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Edit Profile</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Contact</a>
                </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@include('std_viewer.std_home.content.CT_home')</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('std_viewer.std_home.content.CT_profile')</div>
                {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">_Blank</div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
