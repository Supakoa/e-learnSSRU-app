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
                            <th>Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($i == 1)
                        <tr>
                            <th scope="row">1</th>
                            <td>พังไปหมดเลยค่ะช่วงล่างหนู</td>
                            <td>จิ๋มกระจั๊บ</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-info " data-toggle="modal"
                                    data-target="#show">
                                    <i class="fas fa-book-open"></i>
                                </button>
                            </td>
                        </tr>
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
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="contentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="contentModal">
                    <h5>เรื่อง: </h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-md-2 text-center">
                        เนื้อหา:
                    </dt>
                    <dd class="col-md-8 order-2 ">
                        Bootstrap sets basic global display, typography, and link styles. When more control is needed,
                        check out the textual utility classes.

                        Use a native font stack that selects the best font-family for each OS and device.
                        For a more inclusive and accessible type scale, we assume the browser default root font-size
                        (typically 16px) so visitors can customize their browser defaults as needed.
                        Use the $font-family-base, $font-size-base, and $line-height-base attributes as our typographic
                        base applied to the.
                        Set the global link color via $link-color and apply link underlines only on :hover.
                        Use $body-bg to set a background-color on the body (#fff by default).
                        These styles can be found within _reboot.scss, and the global variables are defined in
                        _variables.scss. Make sure to set $font-size-base in rem.
                    </dd>
                </dl>
                <hr>
                <dl class="row">
                    <dt class="col-md-2 offset-md-6 text-right">
                        วันที่ส่ง:
                    </dt>
                    <dd class="col-md-4">14/06/2019</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#report').DataTable();
    });

</script>
@endsection
