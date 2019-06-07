@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <div class="ce-name">YourProfile</div>
    <div class="ce-container">
        <div class="row mt-3 mb-3">
            <div class="col-md-4 offset-md-4 ce-cog-body ce-bg">
                <a class="ce-cog-btn"><i class="fas fa-edit    "></i></a>
                <img src="https://www.shareicon.net/download/2015/09/18/103157_man_512x512.png"
                    class="rounded mx-auto d-block" height="300" width="200" class="rounded" alt="">
            </div>
        </div>
        <div class="container">
            <dl class="row">
                <dt class="col-md-4 text-right">name:</dt>
                <dd class="col-md-6 text-left"><input type="text" class="form-control"
                        value="supakit kitjanubumrungsak"></dd>
            </dl>
            <dl class="row">
                <dt class="col-md-4 text-right">e-mail:</dt>
                <dd class="col-md-6 text-left"><input type="text" class="form-control" value="koa@hotmail.com"></dd>
            </dl>
            <dl class="row">
                <dt class="col-md-4 text-right">Password:</dt>
                <dd class="col-md-6 text-left"><input type="text" class="form-control" value="password"></dd>
            </dl>
            <div class="row text-center">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-md-4">Your subject:</dt>
                        <dd class="col-md-8">Thai</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-4">Your Type:</dt>
                        <dd class="col-md-8">Teacher</dd>
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

        </div>
        <div class="ce-line"></div>
        <div class="row text-center">
            <div class="col-md-4 offset-4">
                <button class="btn btn-outline-info btn-md"><i class="fas fa-save    "></i> Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
