@extends('layouts.appLearning')

@section('index')
<div class="forms-forget-modal"
    style="background-image:url('https://www.sociopoolindia.com/wp-content/uploads/2014/04/work-bg.jpg')">
    <div class="forms-forget-header">
        <img src="{{url('images/logo.png')}}" alt="">
        <div class="forms-forget-close">
        <a href="{{url('login')}}"><i class="fas fa-times " ></i></a>
        </div>
    </div>
    <div class="forms-forget-password">
            @error('email')
            <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <label for="forget-password">รีเซ็ตรหัสผ่าน</label>
            <div class="forms-input">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <button type="submit" class="forms-forget-btn">รีเซ็ตรหัสผ่าน</button>
            </div>

        </form>
    </div>
</div>
@endsection

