@extends('layouts.login') @section('content')

<div class="login center-abs">
    <a href="{{url('./')}}"><img class="login-box-logo" src="/img/logob.png" alt=""></a>
    <!-- Login -->
    <div class="login__block toggled " id="l-login">
        <div class="login__block__header">
            <i class="zmdi zmdi-account-circle"></i>
            Create Account

        </div>
        <form id="regform" method="POST" action="/register">
            @csrf

            <div class="login__block__body" style="min-width:300px">
                <div class="form-group  regsteps" id="regstep1">
                    <div class="form-group ">
                        <input id="name" type="text" class="ri1 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name" placeholder="Nome" value="{{ old('name') }}" style="padding:5px;" required="required">

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif

                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group ">
                        <input id="lastname" type="text" placeholder="Apelido"
                            class="ri1 form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"
                            value="{{ old('lastname') }}" style="padding:5px;" required="required" >

                        @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                        @endif
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group ">
                        <input id="email" type="email"
                            class="ri1 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            placeholder="Email" value="{{ old('email') }}" style="padding:5px;" required="required">

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                        <i class="form-group__bar"></i>
                    </div>
                    
                    <input id="username" type="text" placeholder="CPF"
                            class="ri1 form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="cpf" style="padding:5px;" 
                            value="{{ old('CPF') }}"  required="required" >


                </div>
  
                <div class="form-group  regsteps" id="regstep2" style="display:none;">
                  
                <div class="form-group">

<input id="birth" type="date"
        class="ri2 form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" name="birth"
        value="{{ old('birth') }}" style="padding:5px;" required="required" placeholder="Data de nascimento"
        >

    @if ($errors->has('birth'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('birth') }}</strong>
    </span>
    @endif

    <i class="form-group__bar"></i>

</div>


                    <div class="form-group ">
                        <input id="password" type="password"
                            class="ri3 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            placeholder="Password" style="padding:5px;" required="required">

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group ">
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="ri3 form-control"
                            name="password_confirmation" style="padding:5px;" required="required">

                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="form-group form-group--float form-group--centered">
                    <button style="display:none;" type="button" id="regbacktbt" class="btn btn-default btn-small"><i
                            class="zmdi zmdi-long-arrow-left"></i> Back</button>
                    <button type="button" id="regnextbt" class="btn btn-primary btn-small">Next <i
                            class="zmdi zmdi-long-arrow-right"></i></button>
                    <button type="button" id="regsubmit" class="btn btn-primary btn-small" style="display:none">Submit
                        <i class="zmdi zmdi-check"></i></button>
                </div>
            </div>
        </form>
        <br>

    </div>
</div>
</div>
<script src="/js/Register.js?_<?=time()?>"></script>
@endsection