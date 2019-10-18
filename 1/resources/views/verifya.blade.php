
@extends('layouts.login') @section('content')
<div class="login center-abs">
    <a href="{{url('./')}}">
        <img class="login-box-logo" src="/img/logob.png" alt=""></a>
        <!-- Login -->
        <div class="login__block toggled " id="l-login">
            <div class="login__block__header">
                <i class="zmdi zmdi-account-add"></i>
                Welcome
            </div>
            @csrf
            <div class="login__block__body">
                <p>Your Email is verified, you can access your account.</p>

                <a href="{{ url('me/dashboard') }}" class="btn btn-primary btn-small">
                    <i class="zmdi zmdi-view-dashboard"></i>
                    Go To Dashboard
                </a>
            </form>
        </div>
    </div>
</div>
</div>
@endsection