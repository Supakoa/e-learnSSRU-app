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
                            <div class="col-md-3 p-0" >
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
                                        <button class="btn-light btn-sm ce-disable" disabled="disabled" ><i class="fas fa-list"></i> 100 ข้อ</button>
                                        <button class="btn-light btn-sm ce-disable" disabled="disabled"><i class="fas fa-clock"></i> 30 นาที</button>
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <button class="btn-light btn-sm"><i class="fas fa-search"></i> ตัวอย่างก่อนพิมพ์</button>
                                        <button class="btn-light btn-sm"><i class="fas fa-print"></i> พิมพ์ข้อสอบ</button>
                                        <button class="btn-light btn-sm"><i class="far fa-check-square"></i> ดูเฉลย</button>
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
                                <div class="bar-chart-block block">
                                    <div class='grafico bar-chart'>
                                        <ul class='eje-y text-left'>
                                            <p>จำนวน</p>
                                            <li data-ejeY='100'></li>
                                            <li data-ejeY='80'></li>
                                            <li data-ejeY='60'></li>
                                            <li data-ejeY='40'></li>
                                            <li data-ejeY='20'></li>
                                        </ul>
                                        <ul class='eje-x text-right'>
                                            <li data-ejeX='0'><i>0</i></li>
                                            <li data-ejeX='10'><i>50</i></li>
                                            <li data-ejeX='33'><i>You</i></li>
                                            <p>คะแนน</p>
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
</div>
@endsection
