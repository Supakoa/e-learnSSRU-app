@extends('index')

@push('css')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssPresent/main.css')}}">

@endpush

@section('main')
<div id="maintop" class="w-100 position-relative h-100 justify-content-center" style="">

    <div class="screenDisplay">
        screen in my Phone.
    </div>


    <div id="subMaintop2" class="bg-danger w-25 h-100 ml-auto mr-5" style="height:10vh;">
        <h3>Image</h3>
        <hr>
        <p>เรียนรู้ได้ทุกที่ ทุกเวลา กับคอร์สการเรียนออนไลน์ <br> ฟรีไม่เสียค่าใช้จ่าย กับวิชาที่คุณเลือกเอง <br> ได้ที่
            www.mooc.ssru.ac.th</p>
        <div class="w-100 text-center p-2">
            <button class="btn btn-primary m-auto ">
                เลือกวิชา
            </button>
        </div>
    </div>
</div>

<div id="mainmiddle" class="w-100 position-relative h-100">
    <div class="container-fluid w-100 h-100 pt-3">
        <dd class="row align-middle mt-xl-5">
        <dt class="col-md-12 text-center">
            <h2>คอร์สเรียนพิเศษออนไลน์ฟรีที่มหาวิทยาลัยราชภัฏสวนสุนันทา | www.mooc.ssru.ac.th</h2>
        </dt>
        <hr class="container w-75">
        <dl class="container-fluid w-75 text-left pl-0">
            <p class="lead pl-0">
                มาร่วมฝึกทักษะ ความคิด ความสามารถและสติปัญญา <br>เพื่อพัฒนาศักยภาพของตนเอง
            </p>
        </dl>
        </dd>
    </div>
</div>

<div id="mainfooter" class="w-100 h-100 bg-success" style="">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://reg.ssru.ac.th/images/news/news20190930_1th.jpg?cache=none" class="d-block w-100"
                    width="100%" height="620px">
            </div>
            <div class="carousel-item">
                <img src="https://www.sunandhanews.com/wp-content/uploads/2018/10/SSRU-OPENHOUSE-1024x620.jpg"
                    class="d-block w-100" width="100%" height="620px">
            </div>
            <div class="carousel-item">
                <img src="https://i2.wp.com/www.vrunvride.com/wp-content/uploads/2019/08/%E0%B8%A7%E0%B8%B4%E0%B9%88%E0%B8%87-SSRU-Run-2-Mini-Marathon-2019.jpg?fit=960%2C640&ssl=1"
                    class="d-block w-100" width="100%" height="620px">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection
