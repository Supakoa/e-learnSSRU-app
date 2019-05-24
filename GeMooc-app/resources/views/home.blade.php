@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">Now, Subject</div>
                <div class="card-body">
                    @yield('course')
                    <h2> wait ...</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">Table </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="table_user" class="table table-hover display table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>e-mail</th>
                                    <th>phone</th>
                                    <th>course</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123456</td>
                                    <td>Admin</td>
                                    <td>Supakit kitjanabumrungsak</td>
                                    <td>supako123@gmail.com</td>
                                    <td>0922585xxx</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-dashboard')
<script>
    $(document).ready(function () {
        $('#table_user').DataTable();
    });

</script>
@endsection
