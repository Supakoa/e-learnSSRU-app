@extends('pagestudent.Index')
@section('title')
แก้ไขข้อมูลส่วนตัว | MOOC SSRU
@endsection
@push('css')
    <style>
    #userProfileLeftImg{
        z-index:10;
        top:50%;
        transform: translate(-50%, -10%);
        margin: auto;
    }
    #userProfileLeft a{
        margin: auto;
        top:50%;
        z-index:15;
        transform: translate(-50%, 100%);
        color: #000000;
        font-size: 30px;
        text-shadow: 2px 2px 2px lightgrey
    }
    #userProfileLeft a:hover{
        font-size: 50px;
        transition: ease-out .1s;
        transform: translate(-50%, 50%);
        text-shadow: 4px 4px 4px #fff;
    }
    </style>
@endpush

@section('mainContent')
<div class="mt-5 container-fluid">
    <h4 class="text-center text-warning w-25 bg-light rounded p-2 m-auto">
        แก้ไขข้อมูลส่วนตัว
    </h4>
</div>
<div class="mt-5 container-fluid d-flex">
    <div class="container-fluid w-50 justify-content-center text-center" id="userProfileLeft">
        <img class="m-auto border position-absolute rounded rounded-circle"
            src="https://cdn.pixabay.com/photo/2017/02/23/13/05/profile-2092113_960_720.png" id="userProfileLeftImg" height="180" width="180"
            alt="" >
        <a href="#" class=" position-absolute"><i class="fa fa-plus-circle"
                aria-hidden="true"></i></a>
    </div>
    <div class="container-fluid w-100 bg-light rounded p-3" id="userProfileRight">
    <form action="{{url('std_view/profile/upddateProfile')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fName">ชื่อ</label>
                <input type="text" class="form-control" id="Name" value="{{auth()->user()->name}}" name="name"placeholder="First Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control" name="phone_number" value="{{auth()->user()->phone_number}}" id="phone_number" placeholder="Your Phone number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="eMail">อีเมล</label>
                    <input type="email" class="form-control" name="email" id="eMail" value="{{auth()->user()->email}}" placeholder="Your E-mail">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="con_eMail">ยืนยันอีเมล</label>
                    <input type="email" class="form-control" name="con_email" id="con_eMail" value="{{auth()->user()->email}}" placeholder="Confirm Your E-mail">
                </div>
            </div>


            <div class="col-md-12">
                <button type="submit" class="btn-primary btn float-right">
                    บันทึก
                </button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
