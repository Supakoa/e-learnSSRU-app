@extends('admin-teach.webapp.content.Index')
@section('title')
รายงานปัญหา | MOOC SSRU
@endsection
@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endpush

@section('main-content')
<div class="offset-md-4 col-md-4">
    <div class="text-center">
        <h2 class="t-shadow" style="border-bottom:2px solid gray;padding:10px;">รายงานปัญหา</h2>
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
                @php
                $i = 0;
                @endphp
                @foreach ($reports as $report)
                @php
                    $user = DB::select('select * from users where id = ?', [$report->user_id]);
                @endphp
                <tr class="text-center">
                    <th scope="row">{{++$i}}</th>
                    <td>{{$report->title}}</td>
                    <td>{{$user[0]->name}}</td>
                    <td><a onclick="openModal({{ $report }})" href="#">{{$user[0]->type_user}} <i class="fas fa-chevron-down text-right"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('modal')
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

    const openModal = (obj) => {
        $.get("/report/"+obj.id,
            {obj:obj},
            function (response, textStatus, jqXHR) {
                console.log(response);
                $('#tmpModalToHere').html(response);
                $('#showReport').modal('show');
            },
        ).then((result)=> {
            $('#tmpModalToHere').html(response);
            $('#showReport').modal('show');
        });
    };

    $(document).ready(function () {
        $('#tableReport').DataTable();
    });

</script>
@endsection
