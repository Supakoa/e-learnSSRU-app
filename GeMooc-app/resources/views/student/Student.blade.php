@extends('layouts.app')
@section('content')
<div class="card ce-card">
    <h1 class="ce-name">Student Table</h1>
    <div class="ce-container table-responsive">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Now, this page Empty!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <table class="table table-hover display table-bordered" id="studentTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Teach</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Supakit kitjanabumrungsak</td>
                    <td>Engineering</td>
                    <td>Tech</td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i> Edit </button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt    "></i>
                            Delete</button>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#studentTable').DataTable();
    });

</script>
@endsection
