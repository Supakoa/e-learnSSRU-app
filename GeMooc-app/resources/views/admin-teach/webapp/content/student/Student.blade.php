@extends('admin-teach.webapp.content.Index')
@section('title')
รายชื่อผู้เรียน | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush

@section('main-content')
<div class="offset-md-4 col-md-4">
    <div class="text-center">
        <h2 class="t-shadow" style="border-bottom:2px solid gray;padding:10px;">ผู้เรียน</h2>
    </div>
</div>
<div class="card bg-card">
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <div class="text-right">
                <button class="btn-add-people" data-toggle="modal" data-target="#createNewStudent">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table display table-hover table-borderless" id="TableStudent">
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
                @foreach ($user as $user)
                <tr>

                    {{--
                            send form id to delete record.
                        --}}


                    <th scope="row">{{ ++$i }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
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
<form action="{{url('/student/'.$user->id) }}" id="formDelete" method="post">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id='delete_id' value="">
</form>
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
                    <input type="password" class="form-control mb-1" name="password" id="password">
                    <p>Confirm Password</p>
                    <input type="password" class="form-control mb-1" name="confirmPassword" id="confirmPassword">
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
        $('#delete_id').val('obj')
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
                $('#formDelete').submit();
            }
        });
    };

    /**
        open modal
    */
    const openEditModal = (id) => {
        // alert(id);
        $.post("/student/" + id + "/editModal", {
                id: id
            },
            function (response, textStatus, jqXHR) {
                $('#tmpModalToHere').html(response);
                $('#editStudent').modal('show');
            }
        ).then((result) => {
            $('#tmpModalToHere').html(response);
            $('#editStudent').modal('show');
        });
    }

    $(document).ready(function () {
        $('#TableStudent').DataTable();
    });

</script>
@endsection
