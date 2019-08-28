@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/ceQuiz.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/contentLayout.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/chartcss/dist/chart.css')}}">
@endpush


@section('mainContent')
<div class="containerContent">
    <div class="sectionNavs">
     what the fuck   {{-- @include('pagestudent.navs.navsLeft',[$lessons]) --}}
    </div>
    <div class="sectionContent">
        <div class="card" style="background:#ECECEC">
            <div class="head-card">
                <p>ภาพรวมของแบบฝึกหัด</p>
            </div>
            <div class="card-body">
                <div class="d-flex p-4">
                    <div class="lavelChart">
                        <div class="head-card">
                            <p>เกณฑ์คะแนน</p>
                        </div>
                        <div class="charts ">
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
                            <span>0-25</span>
                            <div class="charts__chart chart--red" data-percent="{{ round($percen_show_25,2)}}%" style="width: {{$percen_show_25}}%"></div>
                            <span>26-50</span>
                            <div class="charts__chart chart--yellow" data-percent="{{ round($percen_show_50,2)}}%" style="width: {{$percen_show_50}}%"></div>
                            <span>51-75</span>
                            <div class="charts__chart chart--blue" data-percent="{{ round($percen_show_75,2)}}%" style="width: {{$percen_show_75}}%"></div>
                            <span>76-100</span>
                            <div class="charts__chart chart--green" data-percent="{{ round($percen_show_100,2)}}%" style="width: {{$percen_show_100}}%"></div>
                        </div><!-- /.charts -->
                    </div>
                    <div class="progressCircle">
                        <div class="head-card">
                            <p>คะแนนและเวลาที่ทำได้</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="progress-circle" data-progress="{{$percen_question}}"></div>
                                    <p>ทำได้ทั้งหมด {{$score_now->pivot->score.' ข้อ จาก '.$question_number}} ข้อ</p>
                                </div>
                                <div class="col-md-6 text-center">
                                <div class="progress-circle" data-progress="{{$percen_time}}"></div>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-left">
                                <h4>
                                    เกณฑ์คะแนนของคุณ
                                </h4>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" id="progress_bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="text-left">
                                <h4>
                                    ประวัติการสอบ
                                </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="row">
                                                ลำดับ
                                            </th>
                                            <th>
                                                วัน/เดือน/ปี
                                            </th>
                                            <th>
                                                เวลา
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
                                        <tr>
                                            <th scope="row">
                                                1.
                                            </th>
                                            <td>
                                                15 มิ.ย. 62
                                            </td>
                                            <td>
                                                15:45:62
                                            </td>
                                            <td>
                                                7
                                            </td>
                                            <td>
                                                7:41
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-rigth">
                            <a class="btn" id="saveQuiz">
                                บันทึก
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
