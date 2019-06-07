@extends('layouts.app')

@section('content')
@php
    $both = auth()->user()->type_user == 'admin' || auth()->user()->type_user == 'teach';
    $adminOnly = auth()->user()->type_user == 'admin';
@endphp
<div class="card ce-card h-100">
    <div class="justify-content-start">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="row justify-content-center">
        <div class="mb-3">
            <img class="img-fluid" src="{{url('storage/'.$course->xl_banner)}}" width="100%" height="auto"
                alt="Responsive image">
        </div>
    </div>
    <h1 class="ce-name">
        Add Teach in that course : {{$course->name}}
    </h1>
    <div class="row mb-3">
        <div class="col-md-2 text-left">
            <button href="#" class="btn btn-md btn-text">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            </button>
        </div>
        <div class="col-md-10 text-right">
            <div class="ce-card-btn">
                @if ($adminOnly)
                <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_user">
                        <i class="fas fa-user"></i> Add
                    </button>
                @endif
            </div>
        </div>
    </div>
    <div class="ce-container table-responsive">
        <table class="display table table-hover " id="staff">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>ตำแหน่ง</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($teachers as $i => $teacher)
                <tr>
                    <td>{{$i+1}}</td>
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
                    <td>
                            <button class=" btn btn-outline-warning" onclick="edit_user({{$teacher->id}})">Eidt</button>
                            <button class=" btn btn-outline-danger" onclick="delete_user({{$teacher->id}})">Delete</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
<form action="delete_user" method="post" id="delete_user">
        @csrf
        <input type="hidden" name="user" id="user_id">
</form>
<form action="edit_user" method="post" id="edit_user">
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
            <form action="add_user" method="post" id="add_user">
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
                <button type="submit" class="btn btn-primary"  form="add_user" id="sub_btn">Save changes</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#staff').DataTable();
    });
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
     function edit_user(id){
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
