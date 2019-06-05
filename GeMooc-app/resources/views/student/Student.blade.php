@extends('layouts.app')
@section('content')
<div class="card ce-card">
    <h1 class="ce-name">Student Table</h1>
    <button class="btn btn-outline-success mb-1" data-toggle="modal" data-target="#createNewStudent"><strong>create
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
                    <th>Password</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $users)
                <tr>

                    {{--
                        send form id to delete record.
                    --}}
                    <form action="/student/{{ $users->id }}" id="formDelete{{ $users->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="id" value="{{ $users->id }}">
                    </form>

                    <td>{{ $users->name }}</td>
                    <td>{{ $users->password }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                        <button onclick="openEditModal({{$users->id}})" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
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
@section('modal')
<div class="modal fade" id="createNewStudent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>create new user</h1>
                </div>
                <div class="modal-body">
                    <form action="/student/create" id="createStudent" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('GET')

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
                    <button form="createStudent" type="submit" class="btn btn-warning">create</button>
                </div>
            </div>
        </div>
    </div>

    <div class="" id="tmpModalToHere"></div>

@endsection


@section('js')
<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    /**
        function when onclick will delete with id.
    */
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
                $('#formDelete'+obj).submit();
            }
        });
    };

    /**
        open modal
    */
    const openEditModal = (id) => {
        alert(id);
        $.post("/student/"+id+"/editModal", {id:id},
            function (response, textStatus, jqXHR) {
                $('#tmpModalToHere').html(response);
                $('#editStudent').modal('show');
            }
        ).then((result)=> {
            $('#tmpModalToHere').html(response);
            $('#editStudent').modal('show');
        });
    }

    $(document).ready(function () {
        $('#studentTable').DataTable();
    });

</script>
@endsection
