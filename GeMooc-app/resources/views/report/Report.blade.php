@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">Peport</h1>
    <div class="ce-container">
        @php
        $i = 1;
        @endphp

        <p class="blockquote-footer"> ***แจ้งปัญหาจากการใช้ระบบ</p>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-hover table-borderless table-info display" id="report">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th>ชื่อเรื่อง</th>
                            <th>ชื่อผู้ส่ง</th>
                            <th>ชนิดผู้ใช้งาน</th>
                            <th>Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($reports)
                        @foreach ($reports as $report)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $report->title }}</td>
                            <td>{{ $report->user->name }}</td>
                            <td>{{ $report->user->type_user }}</td>
                            <td class="text-center">
                                <button onclick="openModal({{ $report }})" type="button" class="btn btn-sm btn-outline-info ">
                                    <i class="fas fa-book-open"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Now, Data Empty!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
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

    $(document).ready(function () {
        $('#report').DataTable();
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

</script>
@endsection
