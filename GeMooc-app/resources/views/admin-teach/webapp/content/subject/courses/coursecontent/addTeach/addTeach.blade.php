@extends('admin-teach.webapp.content.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush
@section('main-content')
<div class="card">
    <div class="card-body">
        <div class="row"
        style="border-bottom: 2px solid gray;
                width:99%;
                margin:auto;">
            <div class="col-md-12">
                <h3>เพิ่มผู้สอนในคอร์ส</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="pl-2 pt-3">ตารางผู้สอน</p>
            </div>
            <div class="col-md-2 offset-md-4 pl-3 pt-3">
                <button class=""><i class="fa fa-user-plus" aria-hidden="true"></i></button>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td class="text-center">
                                    <button><i class="fas fa-pencil-alt    "></i></button>
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
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
                            <tr>
                                <th>1</th>
                                <td></td>
                                <td></td>
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
            $('#tableAddteach').DataTable();
        });
    </script>
@endsection

