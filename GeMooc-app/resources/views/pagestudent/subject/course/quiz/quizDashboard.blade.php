@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/ceQuiz.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/CEProgress.css')}}">
@endpush

@section('title')
ผลคะแนน {{$quiz->name}} | MOOC SSRU
@endsection
@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
        @include('pagestudent.navs.navsLeft',[$lessons])
    </div>
    <div class="sectionContent">
        <div class="card" style="background:#ECECEC">
            <div class="head-card">
                <p>ภาพรวมของแบบฝึกหัด</p>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-6">
                            <div class="lavelChart">
                                    <div class="head-card">
                                        <p class="text-left">เกณฑ์คะแนน</p>
                                    </div>
                                    <div class="charts container m-auto">
                                            @php
                                            $quiz_time = $quiz->time;
                                            $quiz_time_min  =  (int)($quiz_time);
                                            $quiz_time_sec  =  (int)($quiz_time*60);
                                            $score_now = Auth()->user()->scores()->orderBy('scores.created_at','desc')->first();
                                            $question_number = $quiz->questions->count();
                                            $percen_question = (int)(($score_now->pivot->score / $question_number)*100);
                                            $percen_time = (int)(($score_now->pivot->time / $quiz_time_sec)*100);
                                            @endphp
                                                @php
                                                $scores = $quiz->scores->count();
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
                                                @endphp
                                        <span class="p-3">0-25</span>
                                        <div class="charts__chart chart--red rounded" data-percent="{{ round($percen_show_25,2)}}%" style="width: {{$percen_show_25}}%"></div>
                                        <span class="p-3">26-50</span>
                                        <div class="charts__chart chart--yellow rounded" data-percent="{{ round($percen_show_50,2)}}%" style="width: {{$percen_show_50}}%"></div>
                                        <span class="p-3">51-75</span>
                                        <div class="charts__chart chart--blue rounded" data-percent="{{ round($percen_show_75,2)}}%" style="width: {{$percen_show_75}}%"></div>
                                        <span class="p-3">76-100</span>
                                        <div class="charts__chart chart--green rounded" data-percent="{{ round($percen_show_100,2)}}%" style="width: {{$percen_show_100}}%"></div>
                                    </div><!-- /.charts -->
                                </div>
                    </div>
                    <div class="col-md-6">
                            <div class="progressCircle">
                                    <div class="head-card">
                                        <p class="text-left">คะแนนและเวลาที่ทำได้</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <div class="progress-circle shadow" data-progress="{{$percen_question}}"></div>
                                                <p>ทำได้ทั้งหมด {{$score_now->pivot->score.' ข้อ จาก '.$question_number}} ข้อ</p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                            <div class="progress-circle shadow" data-progress="{{$percen_time}}"></div>
                                                @php
                                                    $use_time = $score_now->pivot->time;
                                                @endphp
                                                <p>ใช้เวลาทั้งหมด {{(int)($use_time/60).' นาที '.(int)($use_time%60)}} วินาที จาก
                                                    {{$quiz_time_min}} นาที</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                @php
                                            $your_scores = auth()->user()->scores()->wherePivot('quiz_id',$quiz->id)->orderBy('scores.created_at','desc')->get();
                                            $height_score =  auth()->user()->scores()->wherePivot('quiz_id',$quiz->id)->orderBy('scores.score','desc')->first()->pivot->score;
                                            $percen_height_score = $height_score/$question_number*100;
                                        @endphp
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-3">
                            <div class="text-left">
                                <h4>
                                    เกณฑ์คะแนนของคุณ  {{$height_score."/".$question_number}} คะแนน
                                </h4>
                            </div>
                            <div class="progress shadow" style="height:25px;border-radius:15px;">
                                <div class="progress-bar text-center" id="progress_bar" role="progressbar" style="width: {{$percen_height_score}}%;"
                                          aria-valuenow="$percen_height_score" aria-valuemin="0" aria-valuemax="100">{{$percen_height_score}}%</div>
                            </div>
                        </div>
                    </div>

                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="text-left">
                                <h4>
                                    ประวัติการสอบ
                                </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr class="text-center bg-info rounded-pill">
                                            <th scope="row">
                                                ลำดับ
                                            </th>
                                            <th>
                                                วันที่สอบ
                                            </th>
                                            <th>
                                                คะแนน
                                            </th>
                                            <th>
                                                เวลาที่ใช้
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($your_scores as $key=>$score)
                                            <tr class="border-bottom text-center">
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$score->pivot->created_at}}</td>
                                                <td>{{$score->pivot->score}}</td>
                                                @php
                                                    $time =  $score->pivot->time;
                                                    $min = (int)($time/60);
                                                    $sec = (int)($time%60);
                                                    if($min<10){
                                                        $min = '0'.$min;
                                                    }
                                                    if($sec<10){
                                                        $sec = '0'.$sec;
                                                    }
                                                @endphp
                                                <td>{{$min }} นาที {{$sec}} วินาที</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
