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
                        <div class="charts ">
                            <span>0-25%</span>
                            <div class="charts__chart chart--red" data-percent="18%" style="width: 18%"></div>
                            <span>26-50%</span>
                            <div class="charts__chart chart--yellow" data-percent="34%" style="width: 34%"></div>
                            <span>51-75%</span>
                            <div class="charts__chart chart--blue" data-percent="63%" style="width: 63%"></div>
                            <span>76-100%</span>
                            <div class="charts__chart chart--green" data-percent="83%" style="width: 83%"></div>
                        </div><!-- /.charts -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 h-50">
                <div class="card pt-2 h-100">
                    <h5 class="p-3">คะแนนสูงสุด</h5>
                    <div class="ce-line"></div>
                    <div class="card-body">
                        <div class="field-scroll">
                            <div class="best-scroll">
                                <span>คะแนน</span>
                                <p>99</p>
                                <div class="text-right pl-3">
                                    <small class="text-muted">/100</small>
                                </div>
                            </div>
                            <div class="best-time">
                                <span>เวลา</span>
                                <p class="mb-0">16</p>
                                <div class="text-right pl-3">
                                    <small class="text-muted">minutes</small>
                                </div>
                            </div>
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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>supakit</td>
                                        <td>15/06/2562</td>
                                        <td>15</td>
                                        <td class="text-center">8</td>
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
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#userScroll').DataTable();
    });

</script>
@endsection
