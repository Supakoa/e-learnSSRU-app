@extends('admin-teach.webapp.content.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush
@section('title')
รายชื่อผู้ดูแลระบบ | MOOC SSRU
@endsection
@section('main-content')
<div class="col-md-4 offset-md-4">
    <div class="text-center">
        <h2 class="t-shadow" style="border-bottom:2px solid gray;padding:10px;">ผู้ดูแลระบบ</h2>
    </div>
</div>
<div class="card bg-card">
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <div class="text-right">
                <button class="btn-add-people" data-toggle="modal" data-target="#createNewAdmin">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table display table-hover table-borderless" id="tableAdmin">
            <thead class="text-center">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th>
                        ชื่อผู้ใช้งาน
                    </th>
                    <th>
                        อีเมล
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 0;
                @endphp
                @foreach ($users as $user)
                <tr class="text-center">

                    {{--
                            send form id to delete record.
                        --}}
                    <form action="{{url('/admin/'.$user->id) }}" id="formDelete{{ $user->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                    </form>

                    <th scope="row">{{ ++$i }}</th>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email}}
                    </td>
                    <td>
                        <button onclick="openEditModal({{$user->id}})" class="btn-edit-list"><i
                                class="fas fa-pencil-alt"></i></button>
                        <button onclick="deleteAdmin({{$user->id}})" class="btn-delete-list"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
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
<div class="modal fade" id="createNewAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>เพิ่มแอดมินใหม่</h1>
            </div>
            <div class="modal-body">
                <form action="/admin" id="createAdmin" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                    <p>ชื่อ - นามสกุล</p>
                    <input class="form-control mb-1" type="text" name="name" id="name" >
                    <p>อีเมล</p>
                    <input type="text" class="form-control mb-1" name="email" id="email" >
                    <p>ยืนยันอีเมล</p>
                    <input type="text" class="form-control mb-1" name="confirmEmail" id="confirmEmail" >
                    <p>รหัสผ่าน</p>
                    <input type="password" class="form-control mb-1" name="password" id="password" >
                    <p>ยืนยันรหัสผ่าน</p>
                    <input type="password" class="form-control mb-1" name="confirmPassword" id="confirmPassword" >
                    <p>เพศ</p>
                    <input  name='gender'  class="" value="male" id="male" type="radio">
                    <label for="male">ชาย</label>
                    <input  name='gender'  class="" value="female" id="female" type="radio">
                    <label for="female">หญิง</label>
                    <p>เบอร์โทรศัพท์</p>
                    <input type="text" class="form-control mb-1" name="tel" id="tel" >
                </form>
            </div>
            <div class="modal-footer">
                <button form="createAdmin" type="submit" class="btn btn-warning">create</button>
            </div>
        </div>
    </div>
</div>

<div id="tmpModalToHere"></div>

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
    const deleteAdmin = (obj) => {
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
        $.post("/admin/" + id + "/editModal", {
                id: id
            },
            function (response, textStatus, jqXHR) {
                $('#tmpModalToHere').html(response);
                $('#editAdmin').modal('show');
            }
        ).then((result) => {
            $('#tmpModalToHere').html(response);
            $('#editAdmin').modal('show');
        });
    }

    $(document).ready(function () {
        $('#tableAdmin').DataTable();
    });

</script>
@endsection
