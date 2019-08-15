@extends('admin-teach.webapp.content.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush

@section('main-content')
<div class="col-md-4 offset-md-4">
    <div class="text-center">
        <h2 style="border-bottom:2px solid gray;padding:10px;">ผู้สอน</h2>
    </div>
</div>
<div class="card bg-card">
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <div class="text-right">
                <button data-toggle="modal" data-target="#createNewTeach" class="btn-add-people">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="display table table-hover table-borderless" id="tableTeach">
            <thead class="text-center">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th>ชื่อผู้ใช้งาน</th>
                    <th>อีเมล</th>
                    <th>จำนวนคอร์ส</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                $i = 0;
                @endphp
                @foreach ($users as $user)
                <tr>
                    {{--
                    send form id to delete record.
                --}}
                    <form action="{{ url("/teach/". $user->id ) }}" id="formDelete{{ $user->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                    </form>
                    <th scope="row">
                        {{ ++$i }}
                    </th>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->courses->count() }}
                    </td>
                    <td>
                        <button onclick="openEditModal({{$user->id}})" class="btn-edit-list"><i
                                class="fas fa-pencil-alt"></i></button>
                        <button onclick="deleteStudent({{$user->id}})" class="btn-delete-list"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('modal')
{{--
    Create User
--}}
<div class="modal fade" id="createNewTeach">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>create new user</h1>
            </div>
            <div class="modal-body">
                <form action="{{ url("/teach/create") }}" id="create" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('GET')

                    <p>Username</p>
                    <input class="form-control mb-1" type="text" name="username" id="username" >
                    <p>Password</p>
                    <input type="password" class="form-control mb-1" name="password" id="password" >
                    <p>Confirm Password</p>
                    <input type="password" class="form-control mb-1" name="confirmPassword" id="confirmPassword" >
                    <p>Email</p>
                    <input type="text" class="form-control mb-1" name="email" id="email" >
                    <p>Confirm Email</p>
                    <input type="text" class="form-control mb-1" name="confirmEmail" id="confirmEmail" >
                </form>
            </div>
            <div class="modal-footer">
                <button form="create" type="submit" class="btn btn-warning">create</button>
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
                $('#formDelete' + obj).submit();
            }
        });
    };

    /**
        open modal
    */
    const openEditModal = (id) => {
        alert(id);
        $.post("/teach/" + id + "/editModal", {
                id: id
            },
            function (response, textStatus, jqXHR) {
                $('#tmpModalToHere').html(response);
                $('#editTeach').modal('show');
            }
        ).then((result) => {
            $('#tmpModalToHere').html(response);
            $('#editTeach').modal('show');
        });
    }

    $(document).ready(function () {
        $('#tableTeach').DataTable();
    });

</script>
@endsection
