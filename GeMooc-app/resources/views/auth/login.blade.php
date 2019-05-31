@extends('layouts.app')

@section('content')
<div class="justify-content-center">
        <section class="forms-section ">
                <div class="forms">
                    <div class="form-wrapper is-active">
                        <button type="button" class="switcher switcher-login">
                            {{ __('Login') }}
                            <span class="underline"></span>
                        </button>
                        <form class="form form-login" method="POST" action="{{ route('login') }}">
                            @csrf

                            <fieldset>
                                <legend>Please, enter your email and password for login.</legend>
                                <div class="input-block">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" type="email" autocomplete="email" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-block">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="text-right">
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-login"> {{ __('Login') }}</button>
                        </form>
                    </div>

                    <div class="form-wrapper">
                        <button type="button" class="switcher switcher-signup">
                            {{ __('Register') }}
                            <span class="underline"></span>
                        </button>
                        <form class="form form-signup" method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset>
                                <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                                <div class="input-block">
                                    <label for="name">{{ __('Name') }}</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-block">
                                        <label for="email" >{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="input-block">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-block">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-signup">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </section>
</div>

@endsection
@section('js')
<script>
    const switchers = [...document.querySelectorAll('.switcher')]

    switchers.forEach(item => {
        item.addEventListener('click', function () {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
        })
    })

</script>
@endsection
