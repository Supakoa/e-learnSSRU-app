@extends('admin-teach.webapp.content.Index')

@section('main-content')
<div class="main-content-header">
    <p>วิชา</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row">
        <div class="offset-md-8 col-md-4 text-right">
            <button class="" id="add_subject">เพิ่มวิชา</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card-subject">
                <div class="card-subject-header">
                    <img src="https://www.showbusinessweekly.com/wp-content/uploads/2016/12/Break-into-show-business-777x437.jpg"
                        class="shadow" width="100%" height="100%">
                    <div class="status"></div>
                </div>
                <div class="card-subject-body">
                    <p>subject name</p>
                    <div class="btn-subject">
                        <button>ไปที่วิชา</button>
                        <a><i class="fas fa-cog    "></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-subject">
                <div class="card-subject">
                    <div class="card-subject-header">
                        <img src="https://www.showbusinessweekly.com/wp-content/uploads/2016/12/Break-into-show-business-777x437.jpg"
                            alt="" width="100%" height="100%">
                        <div class="status"></div>
                    </div>
                    <div class="card-subject-body">
                        <p>subject name</p>
                        <div class="btn-subject">
                            <button>ไปที่วิชา</button>
                            <a><i class="fas fa-cog    "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-subject">
                <div class="card-subject">
                    <div class="card-subject-header">
                        <img src="https://www.showbusinessweekly.com/wp-content/uploads/2016/12/Break-into-show-business-777x437.jpg"
                            alt="" width="100%" height="100%">
                        <div class="status"></div>
                    </div>
                    <div class="card-subject-body">
                        <p>subject name</p>
                        <div class="btn-subject">
                            <button>ไปที่วิชา</button>
                            <a><i class="fas fa-cog    "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
