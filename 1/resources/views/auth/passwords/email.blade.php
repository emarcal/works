
    @extends('layouts.login') @section('content')
<div class="login center-abs">
<a href="{{url('./')}}"><img class="login-box-logo" src="/img/logob.png" alt=""></a>
    <div class="login__block toggled " id="l-login">
        <div class="login__block__header">
            <i class="zmdi zmdi-email"></i>
            {{ __('Reset Password') }}

        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="login__block__body" style="">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div
                    class="form-group">
                    <input
                        id="email"
                        type="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email"
                        placeholder="Email Address"
                        value="{{ old('email') }}"
                        required="required" style="padding:5px;">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
            
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group">
                    <div class="input-centered">
               <br>
    
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Back to Login') }}
                        </a>
               
                        <br>
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Create an account?') }}
                        </a>
                    </div>
                </div>
                <button type="submit" class="btn btn--light btn--icon m-t-15">
                    <i class="zmdi zmdi-mail-send"></i>
                </button>
        </form>
       
        @endsection
