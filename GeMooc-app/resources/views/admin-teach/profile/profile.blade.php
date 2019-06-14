@extends('layouts.app')

@section('content')
@php
// dd(auth()->user()->profile->description);
@endphp
<div class="card ce-card">
    <div class="ce-name">{{ auth()->user()->name }}</div>
    <div class="ce-container">
        <div class="row mt-3 mb-3">
            <div class="col-md-4 offset-md-4 ce-cog-body ce-bg" style="overflow:hidden">
                <form action="/profile/updateImage" enctype="multipart/form-data" id="updateFile" method="POST">
                    @csrf

                    <input onchange="$('#updateFile').submit();" style="display:none" type="file" accept="image/*"
                        name="upload" id="upload" value="Upload photo" />
                </form>
                <div onclick="$('#upload').trigger('click'); return false;" class="ce-cog-btn"><i
                        class="fas fa-upload"></i></div>
                <img src="/storage/{{ auth()->user()->profile->image }}" class="rounded mx-auto d-block" height="200"
                    width="100%" class="rounded" alt="">
            </div>
        </div>
        <div class="container">
            <form action="profile/upddateProfile" id="profile" method="post">
                @csrf
                {{-- @method('PATCH') --}}

                <dl class="row">
                    <dt class="col-md-4 text-right">name:</dt>
                    <dd class="col-md-6 text-left">
                        <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}"></dd>
                </dl>

                <dl class="row">
                    <dt class="col-md-4 text-right">e-mail:</dt>
                    <dd class="col-md-6 text-left">
                        <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}"></dd>
                </dl>

                <dl class="row">
                    <dt class="col-md-4 text-right">Description:</dt>
                    <dd class="col-md-6 text-left">
                        <textarea class="form-control" name="description" id="description"
                            aria-label="With textarea">{{ auth()->user()->profile->description }}</textarea></dd>
                </dl>

                <div class="row text-center">
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-md-4">Your subject:</dt>
                            <dd class="col-md-8">Thai</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-md-4">Your Type:</dt>
                            <dd class="col-md-8">{{ auth()->user()->type_user }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-md-4">Your Course:</dt>
                            <dd class="col-md-8">1</dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <table class="table table-hover display " id="profile">
                            <thead>
                                <tr>
                                    <th scope="row">#</th>
                                    <th>Date</th>
                                    <th>Student</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">1.</th>
                                    <td>16/01/2562 - 16/02/2562</td>
                                    <td>50</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <div class="ce-line"></div>
        <div class="row text-center">
            <div class="col-md-4 offset-4">
                <button onclick="$('#profile').submit();" class="btn btn-outline-info btn-md"><i class="fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
