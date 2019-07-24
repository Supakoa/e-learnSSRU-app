@extends('admin-teach.webapp.content.Index')
@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endsection
@section('main-content')
<div class="card p-4">
    <div class="row" style="border-bottom:2px solid #707070">
        <div class="col-md-4">
            <div class="text-left"><a class="btn-back" href="#"><i class="fas fa-chevron-left"></i></a></div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <h4>
                    Dashboard : {{$quiz->name}}
                </h4>
            </div>
        </div>
    </div>
    <div class="dashboard" >
        <div class="row mb-3 h-100">
            <div class="col-lg-7 h-50">
                <div class="card pt-2 h-100" id="scoll-section">
                    <h3 class="p-3 m-2" style="border-bottom: 2px solid #000">ช่วงคะแนนที่ทำได้</h3>
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
                                }else{
                                    $percen_show_25 = $percen_show_50 =$percen_show_75 = $percen_show_100 = 0;
                                }

                                @endphp
                            <div class="charts ">
                                    <span>0-25</span>
                                    <div class="charts__chart chart--red mt-1" data-percent="{{ round($percen_show_25,2)}}%" style="width: {{$percen_show_25}}%"></div>
                                    <span class="mt-3">26-50</span>
                                    <div class="charts__chart chart--orang mt-1" data-percent="{{ round($percen_show_50,2)}}%" style="width: {{$percen_show_50}}%"></div>
                                    <span class="mt-3">51-75</span>
                                    <div class="charts__chart chart--yellow mt-1" data-percent="{{ round($percen_show_75,2)}}%" style="width: {{$percen_show_75}}%"></div>
                                    <span class="mt-3">76-100</span>
                                    <div class="charts__chart chart--green mt-1" data-percent="{{ round($percen_show_100,2)}}%" style="width: {{$percen_show_100}}%"></div>
                            </div><!-- /.charts -->
                                @else
                                <div class="charts ">
                                        <span>0-25</span>
                                        <div class="charts__chart chart--red mt-1" data-percent="0%" style="width: 0%"></div>
                                        <span class="mt-3">26-50</span>
                                        <div class="charts__chart chart--yellow mt-1" data-percent="0%" style="width: 0%"></div>
                                        <span class="mt-3">51-75</span>
                                        <div class="charts__chart chart--blue mt-1" data-percent="0%" style="width: 0%"></div>
                                        <span class="mt-3">76-100</span>
                                        <div class="charts__chart chart--green mt-1" data-percent="0%" style="width: 0%"></div>
                                </div><!-- /.charts -->
                                @endif

                        </div>
            </div>
        </div>
        <div class="col-lg-5 h-50">
            <div class="card pt-2 h-100" id="top-section">
                <h3 class="p-3 m-2" style="border-bottom: 2px solid #000">คะแนนสูงสุด</h3>
                <div class="card-body">
                    <div class="field-scroll">
                            @php $score_top=$quiz->scores()->orderBy('scores.score','DESC')->orderBy('scores.time', 'ASC')->first();
                            // dd($score_top);
                            @endphp
                            @if ($score_top)
                        <div class="left-scoll">
                            <div class="left-head">
                                <h1>
                                    คะแนน
                                </h1>
                            </div>
                            <div class="left-body">
                                <h2>
                                      {{$score_top->pivot->score}}
                                </h2>
                            </div>
                            <div class="left-footer">
                                <h5>จาก {{$question_number}} คะแนน</h5>
                            </div>
                        </div>
                        <div class="right-time">
                                <div class="right-head">
                                    <h1>
                                        เวลา
                                    </h1>
                                </div>
                                <div class="right-body">
                                    <h2>
                                            {{(int)($score_top->pivot->time/60)." : ".(int)($score_top->pivot->time%60)}}
                                    </h2>
                                </div>
                                <div class="right-footer">
                                    <h5>จาก {{$quiz->time}} นาที</h5>
                                </div>
                            </div>
                        @else
                        <div class="left-scoll">
                                <div class="left-head">
                                    <h1>
                                        คะแนน
                                    </h1>
                                </div>
                                <small>- ไม่พบข้อมูล</small>
                                <div class="left-body">
                                    <h2>
                                        {{$question_number}}
                                    </h2>
                                </div>
                            </div>
                            <div class="right-time">
                                    <div class="right-head">
                                        <h1>
                                            เวลา
                                        </h1>
                                    </div>
                                    <small>- ไม่พบข้อมูล</small>
                                    <div class="right-body">
                                        <h2>
                                            {{$quiz->time}}
                                        </h2>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-3">
                        <div class="table-responsive" >
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
                                <tbody>@php $i=1;

                                    @endphp @foreach ($quiz->scores as $key=> $score)
                                    <tr>
                                        <th class="bg-th" scope="row">
                                            {{$i++}}
                                        </th>
                                        <td>
                                            {{$score->name}}
                                        </td>
                                        <td>
                                            {{$score->pivot->created_at}}
                                        </td>
                                        <td>
                                            {{$score->pivot->score}}
                                        </td>
                                        <td class="text-center">
                                            {{(int)($score->pivot->time/60).":".(int)($score->pivot->time%60)." นาที"}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        }

    );

</script>
@endsection
