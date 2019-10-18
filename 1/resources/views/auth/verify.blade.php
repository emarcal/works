

@extends('layouts.login') @section('content')
<div class="login center-abs">
    <a href="{{url('./')}}">
        <img class="login-box-logo" src="/img/logob.png" alt=""></a>
        <!-- Login -->
        <div class="login__block toggled " id="l-login">
            <div class="login__block__header">
                <i class="zmdi zmdi-mail"></i>
                {{ __('Verify Your Email Address') }}
            </div>
            @csrf
       
            <div class="login__block__body">  
               @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                <p>  {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>

                <a href="{{ url('./') }}" class="btn btn-primary btn-small">
                    <i class="zmdi zmdi-home"></i>
                    Go Back
                </a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection