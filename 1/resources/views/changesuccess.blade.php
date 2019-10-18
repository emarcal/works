
@extends('layouts.login') @section('content')
<div class="login center-abs">
    <a href="{{url('./')}}">
        <img class="login-box-logo" src="/img/logo.png" alt=""></a>
        <!-- Login -->
        <div class="login__block toggled " id="l-login">
            <div class="login__block__header">
                <i class="zmdi zmdi-email"></i>
                E-mail changed
            </div>
            @csrf
            <div class="login__block__body">
                <p>You have changed your current E-mail please click below to verify again.</p>

                <a href="{{ url('/email/verify') }}" class="btn btn-primary btn-small">
                    <i class="zmdi zmdi-email"></i>
                    Verify
                </a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection