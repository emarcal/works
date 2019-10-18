

@extends('layouts.login') @section('content')
<div class="login center-abs">
<a href="{{url('./')}}"><img class="login-box-logo" src="/img/logob.png" alt=""></a>

    <div class="login__block toggled " id="l-login">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            Welcome
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login__block__body">
            <?php $tries = session('tries');   ?>

            @if($tries == 2)
            <div style="padding: 0%">
                    <div class="alert alert-danger" role="alert">
                    <i class="zmdi zmdi-lock"></i> You only have one try left, or your account will be blocked!
                    </div>
            </div>
            @endif
            @if($tries == 'blocked')
            <div style="padding: 0%">
                    <div class="alert alert-danger" role="alert">
                    <i class="zmdi zmdi-lock"></i> Your account has been blocked! 
                    </div>
            </div>
            @endif
            @if(session()->has('password_message'))
            <div style="padding: 0%">
                     <div class="alert alert-success" role="alert">
                          Your password has been successfully changed, please login with your new password.
                     </div>
             </div>
           @endif 
                <div
                    class="form-group">
                    <input
                        id="cpf"
                        type="text"
                        class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" style="padding:5px;"
                        name="cpf"
                        value="{{ old('cpf') }}"
                        placeholder="CPF"
                        required="required"
                        autofocus="autofocus">

                    @if ($errors->has('cpf'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cpf') }}</strong>
                    </span>
                    @endif
                   
                    <i class="form-group__bar"></i>
                </div>
                <div
                    class="form-group">
                    <input
                        id="password"
                        type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" style="padding:5px;"
                        name="password"
                        placeholder="Password"
                        required="required">
                        

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    
                    <i class="form-group__bar"></i>
                </div>
    
    
                <div class="form-group">
                    <div class="input-centered">
                        
                        
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Create an account?') }}
                        </a>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-small">
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>
                </form>
                
            </div>
        </div>
        </div>
        </div>
    </div>
 @endsection

