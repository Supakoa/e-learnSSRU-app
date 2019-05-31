@extends('layouts.app')

@section('content')
<div class="form-section">
    <div class="forms">
        <h3 class="section-title">
                {{ __('Verify Your Email Address') }}
        </h3>
        <div class="form-wrapper">
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </div>
    </div>
</div>
@endsection
