@extends('admin-teach.webapp.content.Index')

@section('main-content')
<div class="main-content-header">
    <p id="your_course">Your Course</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row">
        <div class="offset-md-8 col-md-4 text-right">
            <button class="btn-add"><i class="fas fa-folder-plus"></i></button>
            <button class="btn-edit"><i class="fas fa-cog    "></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card-subject">
                <div class="card-subject-header">
                    <div class="status-bar"></div>
                    <img src="https://www.showbusinessweekly.com/wp-content/uploads/2016/12/Break-into-show-business-777x437.jpg"
                        class="shadow" width="100%" height="100%">
                </div>
                <div class="card-subject-body">
                    <div class="card-content-header">
                        <p>subject name</p>
                    </div>
                    <div class="card-content-body">
                        <ul class="list-unstyled">
                            <li>
                                บทเรียน 4 บท
                            </li>
                            <li>
                                เปิดรับสมัคร 200/500 คน
                            </li>
                            <li>
                                เปิดรับ 15 - 30 มิ.ย. 62
                            </li>
                        </ul>
                    </div>
                    <div class="btn-subject">
                        <button>ไปที่คอร์ส</button>
                        <a><i class="fas fa-cog    "></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
@endsection
