
@extends('layouts.login') @section('content')
<div class="login center-abs">
    <a href="{{url('./')}}">
        <img class="login-box-logo" src="/img/logo.png" alt=""></a>
        <!-- Login -->
        <div class="login__block toggled " id="l-login">
            <div class="login__block__header">
            <i class="zmdi zmdi-close"></i>
                E-mail exists
            </div>
            @csrf
            <div class="login__block__body">
                <p>This e-mail already exists.</p>

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