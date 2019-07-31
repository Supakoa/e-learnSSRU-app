@extends('admin-teach.webapp.content.Index')

@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endsection

@section('main-content')
<div class="offset-md-4 col-md-4">
    <div class="text-center">
        <h2 style="border-bottom:2px solid gray;padding:10px;">ผู้เรียน</h2>
    </div>
</div>
<div class="card">
    <div class="col-md-4 offset-md-8">
        <div class="text-right">
            <button class="btn-add-people">
                Add
            </button>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table display table-hover table-bordered" id="TableStudent">
            <thead class="text-center">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th>ชื่อผู้ใช้งาน</th>
                    <th>อีเมล</th>
                    <th>จำนวนคอร์ส</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <th scope="row">1</th>
                    <td>ศุภกิจ กิจนะบำรุงศักดิ์</td>
                    <td>supakoa123@gmail.com</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6 text-center w-100">
                                2
                            </div>
                            <div class="col-md-6 text-center w-100">
                                <button class=""><i class="fas fa-pencil-alt"></i></button>
                                <button class=""><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="">
    $(document).ready(function () {
        $('#TableStudent').DataTable();
    });

</script>
@endsection
