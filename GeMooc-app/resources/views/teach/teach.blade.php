@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">Teach Table</h1>
    <p>data empty !! </p>

    <div class="ce-container table-responsive">
        <table class="table table-hover display table-bordered" id="teachTable">
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
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt    "></i> Delete</button>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js-teach')
<script>
    $(document).ready(function () {
        $('#teachTable').DataTable();
    });

</script>
@endsection
