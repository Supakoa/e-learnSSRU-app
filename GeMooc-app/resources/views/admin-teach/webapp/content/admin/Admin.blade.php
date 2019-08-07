@extends('admin-teach.webapp.content.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush

@section('main-content')
<div class="col-md-4 offset-md-4">
    <div class="text-center">
        <h2 style="border-bottom:2px solid gray;padding:10px;">ผู้ดูแลระบบ</h2>
    </div>
</div>
<div class="card bg-card">
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <div class="text-right">
                <button class="btn-add-people">
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
                <tr class="text-center">
                    <th scope="row">1</th>
                    <td>
                        ผู้ดูแลระบบ1
                    </td>
                    <td>
                        admin123@gmail.com
                    </td>
                    <td>
                        <button class="btn-edit-list"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn-delete-list"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#tableAdmin').DataTable();
    });
</script>
@endsection
