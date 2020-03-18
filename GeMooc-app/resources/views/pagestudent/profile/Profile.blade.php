@extends('pagestudent.Index')
@section('title')
แก้ไขข้อมูลส่วนตัว | MOOC SSRU
@endsection
@push('links')
<style>
    #userProfileLeftImg {
        z-index: 10;
        cursor:pointer;
    }
</style>
@endpush

@section('mainContent')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">แก้ไขข้อมูลส่วนตัว</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 justify-content-center text-center">
                    <form action="{{ url("/profile/updateImage") }}" enctype="multipart/form-data" id="updateFile" method="POST">
                        <input onchange="$('#updateFile').submit();" style="display:none" type="file" accept="image/*" name="upload"
                            id="upload" value="Upload photo" />
                        @csrf
                    </form>
                    <div onclick="$('#upload').trigger('click'); return false;" id="imageProfile"
                        class="container-fluid text-center">
                        @if (auth()->user()->profile->image == null)
                        <img  class="m-auto border rounded rounded-circle"
                            src="https://cdn.pixabay.com/photo/2017/02/23/13/05/profile-2092113_960_720.png" id="userProfileLeftImg"
                            height="300" width="300" alt="">
                        @else
                        <img src="{{url('/storage/'.auth()->user()->profile->image) }}" class="m-auto border  rounded rounded-circle" height="300" width="300" id="userProfileLeftImg" alt="...">
                        @endif
                    </div>
                    <small>คลิกที่รูปเพื่อเปลี่ยน**</small>
                </div>
            </div>
            <form action="{{url('std_view/profile/upddateProfile')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fName">ชื่อ</label>
                            <input type="text" class="form-control" id="Name" value="{{auth()->user()->name}}" name="name"
                                placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{auth()->user()->phone_number}}" id="phone_number" placeholder="Your Phone number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="eMail">อีเมล</label>
                            <input type="email" class="form-control" name="email" id="eMail"
                                value="{{auth()->user()->email}}" placeholder="Your E-mail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="con_eMail">ยืนยันอีเมล</label>
                            <input type="email" class="form-control" name="con_email" id="con_eMail"
                                value="{{auth()->user()->email}}" placeholder="Confirm Your E-mail">
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
