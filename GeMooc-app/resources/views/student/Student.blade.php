@extends('layouts.app')
@section('content')
<div class="card ce-card">
    <h1 class="ce-name">Student Table</h1>
    <button class="btn btn-outline-success mb-1" data-toggle="modal" data-target="#createNewTeach"><strong>create
            new
            user</strong></button>
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
                @foreach ($user as $users)
                <tr>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->password }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                        <button onclick="deleteStudent({{$users->id}})" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
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
                <form action="/student/create" id="create" enctype="multipart/form-data" method="POST">
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
    const deleteStudent = (obj) => {
        Swal.fire({
        title: 'ยืนยันการลบ?',
        text: "ข้อมูลจะถูกลบออกจากฐานข้อมูล",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ลบ',
        cancelButtonText: 'ยกเลิก',
        }).then((result) => {
            if (result.value) {
                // var token = $("meta[name='csrf-token']").attr("content");
                $.ajax(
                    {
                        type: "DELETE",
                        url: "student/"+obj,
                        data: {id:obj},
                        function (data, textStatus, jqXHR) {
                            console.log('success');
                        },
                    }
                );
            }
        });
    };

    $(document).ready(function () {
        $('#studentTable').DataTable();
    });

</script>
@endsection
