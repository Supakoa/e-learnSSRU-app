@extends('layouts.app')

@section('content')
<div class="card ce-card h-100">
    <div class="justify-content-start">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="row justify-content-center">
        <div class="mb-3">
            <img class="img-fluid" src="{{url('storage/'.$course->xl_banner)}}" width="100%" height="auto" alt="Responsive image">
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
                        <button href="#" class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#Add_user">
                                <i class="fas fa-user"></i> Add
                            </button>
                </div>
            </div>
        </div>
    <div class="ce-container table-responsive">
        <table class="display table table-hover table-secondary" id="staff">
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
                        <td>{{$i}}</td>
                        <td>{{$teacher->name}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
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
                    <select class="selectpicker" title="Choose some one " data-live-search="true">

                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach

                          </select>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="sub_form" id="sub_btn">Save changes</button>
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
</script>
@endsection
