@extends('pagestudent.Index')

@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/carousel/carouselSubject.css')}}">
@endpush

@section('mainContent')
<div class="sectionVideo">
    <div class="container p-5">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="sectionTable">
    <div class="container p-5">
        <div class="table-responsive ">
            <table class="bg-light table table-borderless table-striped">
                <thead>
                    <tr>
                        <th colspan="3" style="font-size:26px">ข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="border-right pl-4">เปิดรับสมัคร</th>
                        <td>15 มิถุนายน พ.ศ.2562</td>
                    </tr>
                    <tr>
                        <th scope="row" class="border-right pl-4">คอร์สที่มี</th>
                        <td>2 คอร์ส</td>
                    </tr>
                    <tr>
                        <th scope="row" class="border-right pl-4">บทเรียน</th>
                        <td>2 บท</td>
                    </tr>
                    <tr>
                        <th scope="row" class="border-right pl-4">กลุ่มเป่าหมาย</th>
                        <td>นักเรียน/นักศึกษา บุคคลทั่วไป</td>
                    </tr>
                    <tr>
                        <th scope="row" class="border-right pl-4">เกณฑ์การผ่าน</th>
                        <td>ต้องมีคะแนนไม่ต่ำกว่าร้อยละ 80</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <button>ไปที่คอร์ส</button>
            </div>
        </div>
    </div>
</div>
<div class="sectionInfo">
    <div class="container-fluid p-5">
        <h4>เกี่ยวกับรายวิชา</h4>
        <span>รายวิชา การพัฒนาตน จะมีเนื้อหาเกี่ยวกับความรู้พื้นฐานด้านการพัฒนาตน</span>
        <ul class="list-unstyled">
            <li>บทที่ 1 การลบล้างความคิดเดิม</li>
            <li>บทที่ 2 ออกแบบชีวิต</li>
            <li>บทที่ 3 ทัศนคติ</li>
        </ul>
        <hr>
        <h4>วัตถุประสงค์</h4>
        <ul class="list-unstyled">
            <li>1. เพื่อให้ผู้เรียนได้รู้พื้นฐานการพัฒนาตน</li>
            <li>2. บรา~~~</li>
        </ul>
        <hr>
        <h4>เกณฑ์การวัดและประเมินผลในรายวิชา</h4>
        <dl class="row">
            <dd class="col-md-8">
                info~~
            </dd>
        </dl>
        <hr>
        <h4>ผู้สอน</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex p-4 text-center">
                    <img class="m-auto bg-success rounded-circle" width="200" height="200" src="" alt="">
                    <h5 class="m-auto">อาจารย์ ชลลดา ชูวณิชชานนท์</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex p-4 text-center">
                    <img class="m-auto bg-success rounded-circle"  width="200" height="200" src="" alt="">
                    <h5 class="m-auto">อาจารย์ ชลลดา ชูวณิชชานนท์</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
