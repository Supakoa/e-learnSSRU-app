@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">Teach database</h1>
    <p>My way is empty!!</p>
    <button class="btn btn-outline-success mb-1" data-toggle="modal" data-target="#createNewTeach"><strong>create new
            user</strong></button>

    <div class="ce-container table-responsive">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Now, this page Empty!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <table class="table table-hover display table-bordered" id="teachTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>e-mail</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

{{--
        modal create new teach
    --}}
<div class="modal fade" id="createNewTeach">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>create new user</h1>
            </div>
            <div class="modal-body">
                <form action="/teach/create" id="create" enctype="multipart/form-data" method="POST">
                    @csrf

                    <p>Username</p>
                    <input class="form-control mb-1" type="text" name="username" id="username">
                    <p>Password</p>
                    <input type="text" class="form-control mb-1" name="password" id="password">
                    <p>Confirm Password</p>
                    <input type="text" class="form-control mb-1" name="confirmPassword" id="confirmPassword">
                    <p>Email</p>
                    <input type="text" class="form-control mb-1" name="email" id="email">
                    <p>Confirm Email</p>
                    <input type="text" class="form-control mb-1" name="confirmEmail" id="confirmEmail">
                </form>
            </div>
            <div class="modal-footer">
                <button form="create" type="submit" class="btn btn-warning">create</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    $(document).ready(function () {
        $('#teachTable').DataTable();
    });

</script>
@endsection
