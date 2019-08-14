@extends('admin-teach.webapp.content.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush
@section('main-content')
<div class="card">
    <div class="card-body">
        <div class="row"
        style="border-bottom: 2px solid gray;
                width:98%;
                margin:auto;">
            <div class="col-md-12">
                <h3>เพิ่มผู้สอนในคอร์ส</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="pl-3 pt-3">ตารางผู้สอน</p>
            </div>
            <div class="col-md-2 offset-md-4">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container table-responsive">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <button><i class="fas fa-pencil-alt    "></i></button>
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#addTeach').DataTable();
        });
    </script>
@endsection

