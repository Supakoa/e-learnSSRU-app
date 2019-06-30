@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <div class="justify-content-start mb-2">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>

    <h1 class="ce-name">Dashboard - Quiz</h1>
    <div class="ce-container">
        <div class="row mb-3 h-100">
            <div class="col-md-6 h-50">
                <div class="card pt-2 h-100">
                    <h5 class="p-3">ช่วงคะแนนที่ทำได้</h5>
                    <div class="ce-line"></div>
                    <div class="card-body">
                        @php
                            $question_number = $quiz->questions->count();

                        @endphp
                            @if ($quiz->questions->count())
                            @php
                            $scores = $quiz->scores->count();
                            if($scores){
                                $percen_25 = (int)($question_number*0.25);
                            // dd($percen_25);
                            $percen_50 = (int)($question_number*0.50);
                            $percen_75 = (int)($question_number*0.75);
                            $percen_100 = (int)($question_number);
                            $num_25 = $quiz->scores()->wherePivot('score','<=',$percen_25)->get()->count();
                            $num_50 = $quiz->scores()->wherePivot('score','<=',$percen_50)->wherePivot('score','>',$percen_25)->get()->count();
                            $num_75 = $quiz->scores()->wherePivot('score','<=',$percen_75)->wherePivot('score','>',$percen_50)->get()->count();
                            $num_100 = $quiz->scores()->wherePivot('score','<=',$percen_100)->wherePivot('score','>',$percen_75)->get()->count();
                            $percen_show_25 = $num_25/$scores*100;
                            $percen_show_50 = $num_50/$scores*100;
                            $percen_show_75 = $num_75/$scores*100;
                            $percen_show_100 = $num_100/$scores*100;
                            //dd($scores->wherePivot('score','>',0)->wherePivot('score','<',20));
                            }

                            @endphp
                        <div class="charts ">
                                <span>0-25</span>
                                <div class="charts__chart chart--red" data-percent="{{ round($percen_show_25,2)}}%" style="width: {{$percen_show_25}}%"></div>
                                <span>26-50</span>
                                <div class="charts__chart chart--yellow" data-percent="{{ round($percen_show_50,2)}}%" style="width: {{$percen_show_50}}%"></div>
                                <span>51-75</span>
                                <div class="charts__chart chart--blue" data-percent="{{ round($percen_show_75,2)}}%" style="width: {{$percen_show_75}}%"></div>
                                <span>76-100</span>
                                <div class="charts__chart chart--green" data-percent="{{ round($percen_show_100,2)}}%" style="width: {{$percen_show_100}}%"></div>
                        </div><!-- /.charts -->
                            @else
                            <div class="charts ">
                                    <span>0-25</span>
                                    <div class="charts__chart chart--red" data-percent="0%" style="width: 0%"></div>
                                    <span>26-50</span>
                                    <div class="charts__chart chart--yellow" data-percent="0%" style="width: 0%"></div>
                                    <span>51-75</span>
                                    <div class="charts__chart chart--blue" data-percent="0%" style="width: 0%"></div>
                                    <span>76-100</span>
                                    <div class="charts__chart chart--green" data-percent="0%" style="width: 0%"></div>
                            </div><!-- /.charts -->
                            @endif

                    </div>
                </div>
            </div>
            <div class="col-md-6 h-50">
                <div class="card pt-2 h-100">
                    <h5 class="p-3">คะแนนสูงสุด</h5>
                    <div class="ce-line"></div>
                    <div class="card-body">
                        <div class="field-scroll">
                            @php
                                $score_top = $quiz->scores()->orderBy('scores.score', 'DESC')->orderBy('scores.time', 'ASC')->first();
                                // dd($score_top);
                            @endphp
                            @if ($score_top)
                            <div class="best-scroll">
                                    <span>คะแนน</span>
                                    <p>{{$score_top->pivot->score}}</p>
                                    <div class="text-right pl-3">
                                        <small class="text-muted">/{{$question_number}}</small>
                                    </div>
                                </div>
                                <div class="best-time">
                                    <span>เวลา</span>
                                    <p class="mb-0">{{(int)($score_top->pivot->time/60)." นาที ".(int)($score_top->pivot->time%60)." วินาที"}}</p>
                                    <div class="text-right pl-3">
                                        <small class="text-muted">{{$quiz->time}} minutes</small>
                                    </div>
                                </div>
                            @else
                            <div class="best-scroll">
                                    <span>คะแนน</span>
                                    <p>ไม่มีข้อมูล</p>
                                    <div class="text-right pl-3">
                                        <small class="text-muted">/{{$question_number}}</small>
                                    </div>
                                </div>
                                <div class="best-time">
                                    <span>เวลา</span>
                                    <p class="mb-0">ไม่มีข้อมูล</p>
                                    <div class="text-right pl-3">
                                        <small class="text-muted">{{$quiz->time}} minutes</small>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card pt-2">
                    <h5 class="p-3">ชื่อผู้ทำข้อสอบ</h5>
                    <div class="ce-line"></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover display data-table-container" id="userScroll">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>name</th>
                                        <th>date</th>
                                        <th>Scroll</th>
                                        <th>time(minute)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($quiz->scores as $key => $score)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>{{$score->name}}</td>
                                            <td>{{$score->pivot->created_at}}</td>
                                            <td>{{$score->pivot->score}}</td>
                                            <td class="text-center">{{(int)($score->pivot->time/60).":".(int)($score->pivot->time%60)." นาที" }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
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
    $(document).ready(function () {
        $('#userScroll').DataTable();
    });

</script>
@endsection
