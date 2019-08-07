@extends('admin-teach.webapp.content.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush

@section('main-content')
<div class="offset-md-4 col-md-4">
    <div class="text-center">
            <h2 style="border-bottom:2px solid gray;padding:10px;">รายงานปัญหา</h2>
    </div>
</div>
<div class="card bg-card">
    <div class="card-body table-responsive">
        <table class="display table table-hover table-borderless" id="tableReport">
            <thead>
                <tr class="text-center">
                    <th scope="col">ลำดับ</th>
                    <th>หัวข้อปัญหา</th>
                    <th>ชื่อผู้ส่งรายงาน</th>
                    <th>ชนิดผู้ใช้งาน</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th scope="row">1</th>
                    <td>เพิ่มบทเรียนไม่ได้</td>
                    <td>ดร.หุดา วงษ์ยิ้ม</td>
                    <td><a href="#">ผู้สอน <i class="fas fa-chevron-down text-right"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#tableReport').DataTable();
        });
    </script>
@endsection
