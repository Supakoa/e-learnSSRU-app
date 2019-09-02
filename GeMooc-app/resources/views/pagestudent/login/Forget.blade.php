@extends('admin-teach.webapp.login.Index')

@section('wrap-body')
<div class="forms-forget-modal"
    style="background-image:url('https://www.sociopoolindia.com/wp-content/uploads/2014/04/work-bg.jpg')">
    <div class="forms-forget-header">
        <img src="{{url('images/logo.png')}}" alt="">
        <div class="forms-forget-close"><i class="fas fa-times    "></i></div>
    </div>
    <div class="forms-forget-password">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <label for="forget-password">รีเซ็ตรหัสผ่าน</label>
            <div class="forms-input">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="forms-forget-btn">รีเซ็ตรหัสผ่าน</button>
            </div>
        </form>
    </div>
</div>
@endsection

