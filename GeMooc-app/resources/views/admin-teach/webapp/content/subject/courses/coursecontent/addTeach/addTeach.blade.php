@extends('admin-teach.webapp.content.Index')

@section('title')
{{$course->name}}:จัดการสมาชิก | MOOC SSRU
@endsection
@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush
@php
$both = auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'teach';
$adminOnly = auth()->user()->type_user == 'admin';
@endphp
@section('main-content')
<a class="badge badge-dark" href="{{url('/subject')}}">วิชา</a> / <a class="badge badge-dark" href="{{url('/subject/'.$course->subject->id)}}">{{$course->subject->name}}
</a>/ <a class="badge badge-dark" href="{{url('/course/'.$course->id)}}">{{$course->name}}</a> / <a class="badge badge-dark" href="{{url('/course/'.$course->id.'/users')}}">จัดการสมาชิก</a>
<div class="card">
    <div class="card-body">
        <div class="row"
        style="border-bottom: 2px solid gray;
                width:99%;
                margin:auto;">
            <div class="col-md-12">
                <h3>จัดการสมาชิก</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="pl-2 pt-3">ตารางผู้สอน</p>
            </div>
            <div class="col-md-2 offset-md-4 pl-3 pt-3">
                <button class="btn-add m-2" data-toggle="modal" data-target="#Add_user"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="display table table-hover table-borderless" id="addTeach">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>ตำแหน่ง</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                $i=1;
                            @endphp
                            @foreach ($teachers as $teacher)
                            <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$teacher->name}}</td>
                                    @php
                                    $roles = $teacher->courses->where('id',$course->id)->pop()->pivot->role;
                                    @endphp
                                    @if ($roles == 1)
                                    <td>Main Teacher</td>
                                    @elseif($roles == 2)
                                    <td>Sub Teacher</td>
                                    @else
                                    <td></td>
                                    @endif
                                    @if ($adminOnly)
                                    <td class=" text-center">
                                        <button class=" btn btn-outline-warning" onclick="edit_user({{$teacher->id}})"><i
                                                class="fas fa-edit    "></i></button>
                                        <button class=" btn btn-outline-danger" onclick="delete_user({{$teacher->id}})"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p class="pl-2 pt-3">ตารางผู้เรียน</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="display table table-hover table-borderless" id="tableAddteach">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>เริ่มเรียน</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                $i=1;

                            @endphp
                                @foreach ($students as $key=>$student)
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{$student->name}}</td>
                                @php
                                     $created_at = $student->courses->where('id',$course->id)->pop()->pivot->created_at;
                                @endphp
                                <td>{{$created_at}}</td>
                            </tr>

                                @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{url('course/'.$course->id.'/delete_user')}}" method="post" id="delete_user">
        @csrf
        <input type="hidden" name="user" id="user_id">
    </form>
    <form action="{{url('course/'.$course->id.'/edit_user')}}" method="post" id="edit_user">
        @csrf
        <input type="hidden" name="user" id="user_id_edit">
        <input type="hidden" name="role" id="user_role">
    </form>
@endsection
@section('modal')

<div class="modal fade" id="Add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User to Course -> {{$course->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/course/'.$course->id.'/add_user')}}" method="post" id="add_user">
                    @csrf
                    <div class=" form-group">
                        <label for="user">User :</label>
                        <select class="selectpicker form-control" name="user" title="Choose some one " required
                            data-live-search="true">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_user" id="sub_btn">Save changes</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#addTeach').DataTable();
            $('#tableAddteach').DataTable();
        });
    </script>

<script>

    function delete_user(id) {
        $('#user_id').val(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'

        }).then((result) => {
            if (result.value) {
                $('#delete_user').submit();
            }
        });
    }

    function edit_user(id) {
        $('#user_id_edit').val(id);
        Swal.fire({
            title: 'Select field validation',
            input: 'select',
            inputOptions: {
                '1': 'Main Teacher',
                '2': 'Sub Teacher',
                // 'grapes': 'Grapes',
                // 'oranges': 'Oranges'
            },
            inputPlaceholder: 'Select Role',
            showCancelButton: true,
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    if (value != '') {
                        $('#user_role').val(value);
                        $('#edit_user').submit();
                        // resolve()

                    } else {
                        resolve('You need to select some one')
                    }
                })
            }
        });



    }

</script>
@endsection

