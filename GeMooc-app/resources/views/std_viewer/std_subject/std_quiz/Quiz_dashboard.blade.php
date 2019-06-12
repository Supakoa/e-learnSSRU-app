@extends('layouts.appViewer')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">sub.course.id.quiz.dashboard</h1>
    <div class="ce-container">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 p-0">
                                <div class="jumbotron text-center">
                                    <h5>img</h5>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <dt>
                                            ข้อสอบ ภาษาไทย ชั้น ป. 5 เรื่อง การเขียน
                                        </dt>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-info btn-sm">แชร์</button>
                                    </div>
                                </div>
                                <dl class="row text-left">
                                    <dt class="col-md-4">วิชา</dt>
                                    <dd class="col-md-8">ภาษาไทย</dd>

                                    <dt class="col-md-4">วันที่สอบ</dt>
                                    <dd class="col-md-8">05/06/2562</dd>
                                </dl>
                                <div class="row">
                                    <div class="col-md-4 mb-1">
                                        <button class="btn-light btn-sm ce-disable" disabled="disabled"><i
                                                class="fas fa-list"></i> 100 ข้อ</button>
                                        <button class="btn-light btn-sm ce-disable" disabled="disabled"><i
                                                class="fas fa-clock"></i> 30 นาที</button>
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <button class="btn-light btn-sm"><i class="fas fa-search"></i>
                                            ตัวอย่างก่อนพิมพ์</button>
                                        <button class="btn-light btn-sm"><i class="fas fa-print"></i>
                                            พิมพ์ข้อสอบ</button>
                                        <button class="btn-light btn-sm"><i class="far fa-check-square"></i>
                                            ดูเฉลย</button>
                                        <button class="btn-light btn-sm"><i class="far fa-edit"></i> ทำอีกครั้ง</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2" >
                <div class="card overflow-auto" style="height:600px;">
                    <div class="card-body">
                        <div class="container">
                            <div class="page-header">
                                <h5>ผลการทดสอบ</h5>
                                <p>นายศุภกิจ กิจนะบำรุงศักดิ์</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="progress-circle" data-progress="10"></div>
                                    <p>ทั้งหมด 100 ข้อ</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="progress-circle" data-progress="50"></div>
                                    <p>ใช้เวลาทั้งหมด 25(นาที)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 mb-2 overflow-auto ce-hiddenScollbar" >
                        <div class="card" style="height:300px;">
                            <div class="card-body">
                                <div class="container">
                                    <div class="page-header">
                                        <h5>ช่วงคะแนนผู้สอบทั้งหมด</h5>
                                    </div>
                                    <div class="container">
                                        <div class="charts ">
                                            <span>0-25 %</span>
                                            <div class="charts__chart chart--red" data-percent="5%" style="width: 5%">
                                            </div><!-- /.charts__chart -->
                                            <span>26-50 %</span>
                                            <div class="charts__chart chart--yellow" data-percent="60%"
                                                style="width: 60%"></div><!-- /.charts__chart -->
                                            <span>51-75 %</span>
                                            <div class="charts__chart chart--blue" data-percent="55%"
                                                style="width: 55%"></div><!-- /.charts__chart -->
                                            <span>76-100 %</span>
                                            <div class="charts__chart chart--green" data-percent="16%"
                                                style="width: 16%"></div><!-- /.charts__chart -->
                                        </div><!-- /.charts -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="card overflow-auto ce-hiddenScollbar" style="height:300px;">
                            <div class="card-body">
                                <div class="table-responsive " >
                                    <table class="table table-hover nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th>วันที่สอบ</th>
                                                <th>ชื่อผู้สอบ</th>
                                                <th>คะแนน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>16/01/2652</td>
                                                <td>supakit</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                    <th scope="row">1</th>
                                                    <td>16/01/2652</td>
                                                    <td>supakit</td>
                                                    <td>100</td>
                                                </tr>
                                                <tr>
                                                        <th scope="row">1</th>
                                                        <td>16/01/2652</td>
                                                        <td>supakit</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                            <th scope="row">1</th>
                                                            <td>16/01/2652</td>
                                                            <td>supakit</td>
                                                            <td>100</td>
                                                        </tr>
                                                        <tr>
                                                                <th scope="row">1</th>
                                                                <td>16/01/2652</td>
                                                                <td>supakit</td>
                                                                <td>100</td>
                                                            </tr>
                                                            <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>16/01/2652</td>
                                                                    <td>supakit</td>
                                                                    <td>100</td>
                                                                </tr>
                                                                <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>16/01/2652</td>
                                                                        <td>supakit</td>
                                                                        <td>100</td>
                                                                    </tr>
                                                                    <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>16/01/2652</td>
                                                                            <td>supakit</td>
                                                                            <td>100</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>16/01/2652</td>
                                                                                <td>supakit</td>
                                                                                <td>100</td>
                                                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $("#bars li .bar").each(function (key, bar) {
            var percentage = $(this).data('percentage');

            $(this).animate({
                'height': percentage + '%'
            }, 1000);
        });
    });

</script>
@endsection
