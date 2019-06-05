@extends('layouts.app')

@section('content')
<div class="card ce-card h-100">
    <div class="justify-content-start">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="row justify-content-center">
        <div class="mb-3">
            <img class="img-fluid" width="100%" height="auto" alt="Responsive image">
        </div>
    </div>
    <h1 class="ce-name">
        Add Teach in that course :
    </h1>
    <div class="row mb-3">
            <div class="col-md-2 text-left">
                <button href="#" class="btn btn-md btn-text">
                   <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-md-10 text-right">
                <div class="ce-card-btn">
                        <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_user">
                                <i class="fas fa-user"></i> Add
                            </button>
                </div>
            </div>
        </div>
    <div class="ce-container table-responsive">
        <table class="display table table-hover table-secondary" id="staff">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#staff').DataTable();
    });
</script>
@endsection
