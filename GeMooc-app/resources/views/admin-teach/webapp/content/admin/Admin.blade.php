@extends('admin-teach.webapp.content.Index')

@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endsection

@section('main-content')
<div class="col-md-4 offset-md-4">
    <div class="text-center">
            <h2 style="border-bottom:2px solid gray;padding:10px;">ผู้ดูแลระบบ</h2>
    </div>
</div>
<div class="card">
    <div class="card-body table-responsive">
        <table class="table display table-hover table-bordered" id="tableAdmin">
            <thead class="text-center">
                <tr>
                    <th scope="row">ลำดับ</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="">
    $(document).ready(function () {
        $('#tableAdmin').DataTable();
    });
</script>
@endsection
