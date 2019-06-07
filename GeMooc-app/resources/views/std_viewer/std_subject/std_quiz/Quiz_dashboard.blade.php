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
                                    <div class="col-md-4">
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
                                        <button class="btn-light btn-sm"><i class="far fa-edit"></i> ทำอีครั้ง</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
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
                                    <div class="progress-circle" data-progress="25"></div>
                                    <p>ใช้เวลาทั้งหมด 25(นาที)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="page-header">
                                <h5>ช่วงคะแนนผู้สอบทั้งหมด</h5>
                            </div>
                            <div class="container">
                                <div id="chart">
                                    <ul id="numbers">
                                        <li><span>100%</span></li>
                                        <li><span>90%</span></li>
                                        <li><span>80%</span></li>
                                        <li><span>70%</span></li>
                                        <li><span>60%</span></li>
                                        <li><span>50%</span></li>
                                        <li><span>40%</span></li>
                                        <li><span>30%</span></li>
                                        <li><span>20%</span></li>
                                        <li><span>10%</span></li>
                                        <li><span>0%</span></li>
                                    </ul>

                                    <ul id="bars">
                                        <li>
                                            <div data-percentage="56" class="bar"></div><span>Option 1</span>
                                        </li>
                                        <li>
                                            <div data-percentage="33" class="bar"></div><span>Option 2</span>
                                        </li>
                                        <li>
                                            <div data-percentage="54" class="bar"></div><span>Option 3</span>
                                        </li>
                                        <li>
                                            <div data-percentage="94" class="bar"></div><span>Option 4</span>
                                        </li>
                                        <li>
                                            <div data-percentage="44" class="bar"></div><span>Option 5</span>
                                        </li>
                                        <li>
                                            <div data-percentage="23" class="bar"></div><span>Option 6</span>
                                        </li>
                                    </ul>
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
