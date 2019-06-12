@extends('layouts.appViewer')

@section('content')
@php
$subject =$course->subject;
$score_now = Auth()->user()->scores()->orderBy('scores.created_at','desc')->first();
// dd($score_now);
@endphp
<div class="card ce-card">
    <h1 class="ce-name">Dashboard : {{$quiz->name}}</h1>
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
                                            ข้อสอบ : {{$quiz->name}}
                                        </dt>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-info btn-sm">แชร์</button>
                                    </div>
                                </div>
                                <dl class="row text-left">
                                    <dt class="col-md-4">วิชา</dt>
                                    <dd class="col-md-8">{{$subject->name}}</dd>

                                    <dt class="col-md-4">วันที่สอบ</dt>
                                    <dd class="col-md-8">{{$score_now->pivot->created_at}}</dd>
                                </dl>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn-light btn-sm ce-disable" disabled="disabled"><i
                                                class="fas fa-list"></i> {{$quiz->questions->count()}} ข้อ</button>
                                        <button class="btn-light btn-sm ce-disable" disabled="disabled"><i
                                                class="fas fa-clock"></i> {{$quiz->time}} วินาที</button>
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
            <div class="col-md-6 mb-2">
                <div class="card overflow-auto" style="height:600px;">
                    <div class="card-body">
                        <div class="container">
                            <div class="page-header">
                                <h5>ผลการทดสอบ</h5>
                                <p>{{auth()->user()->name}}</p>
                            </div>
                            @php
                            $question_number = $quiz->questions->count();
                            $percen_question = (int)(($score_now->pivot->score / $question_number)*100);
                            $percen_time = (int)((($quiz->time - $score_now->pivot->time) / $quiz->time)*100);
                            @endphp
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="progress-circle" data-progress="{{$percen_question}}"></div>
                                    <p>ทำได้ทั้งหมด {{$score_now->pivot->score.' ข้อ จาก '.$question_number}} ข้อ</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="progress-circle" data-progress="{{$percen_time}}"></div>
                                    <p>ใช้เวลาทั้งหมด {{$quiz->time - $score_now->pivot->time}}(วินาที) จาก
                                        {{$quiz->time}}(วินาที)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 mb-2 overflow-auto ce-hiddenScollbar">
                        <div class="card" style="height:300px;">
                            <div class="card-body">
                                <div class="container">
                                    <div class="page-header">
                                        <h5>ช่วงคะแนนผู้สอบทั้งหมด</h5>
                                    </div>
                                    <div class="container">
                                        <div class="charts ">
                                            @php
                                            $scores = $quiz->scores->count();
                                            $percen_25 = (int)($question_number*0.25);
                                            // dd($percen_25);
                                            $percen_50 = (int)($question_number*0.50);
                                            $percen_75 = (int)($question_number*0.75);
                                            $percen_100 = (int)($question_number);
                                            $num_25 = $quiz->scores()->wherePivot('score','<=',$percen_25)->
                                                get()->count();
                                                $num_50 = $quiz->scores()->wherePivot('score','<=',$percen_50)->
                                                    wherePivot('score','>',$percen_25)->get()->count();
                                                    $num_75 = $quiz->scores()->wherePivot('score','<=',$percen_75)->
                                                        wherePivot('score','>',$percen_50)->get()->count();
                                                        $num_100 = $quiz->scores()->wherePivot('score','
                                                        <=',$percen_100)->
                                                            wherePivot('score','>',$percen_75)->get()->count();
                                                            $percen_show_25 = $num_25/$scores*100;
                                                            $percen_show_50 = $num_50/$scores*100;
                                                            $percen_show_75 = $num_75/$scores*100;
                                                            $percen_show_100 = $num_100/$scores*100;
                                                            //
                                                            dd($scores->wherePivot('score','>',0)->wherePivot('score','
                                                            <',20)); @endphp <span>0-25</span>
                                                                <div class="charts__chart chart--red"
                                                                    data-percent="{{$percen_show_25}}%"
                                                                    style="width: {{$percen_show_25}}%"></div>
                                                                <!-- /.charts__chart -->
                                                                <span>26-50</span>
                                                                <div class="charts__chart chart--yellow"
                                                                    data-percent="{{$percen_show_50}}%"
                                                                    style="width: {{$percen_show_50}}%"></div>
                                                                <!-- /.charts__chart -->
                                                                <span>51-75</span>
                                                                <div class="charts__chart chart--blue"
                                                                    data-percent="{{$percen_show_75}}%"
                                                                    style="width: {{$percen_show_75}}%"></div>
                                                                <!-- /.charts__chart -->
                                                                <span>76-100</span>
                                                                <div class="charts__chart chart--green"
                                                                    data-percent="{{$percen_show_100}}%"
                                                                    style="width: {{$percen_show_100}}%"></div>
                                                                <!-- /.charts__chart -->
                                        </div><!-- /.charts -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="card overflow-auto ce-hiddenScollbar" style="height:300px;">
                            <div class="card-body">
                                <div class="table-responsive ">
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
