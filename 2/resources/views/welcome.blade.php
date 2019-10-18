@extends('layouts.welcome')
@section('content')
    <div class="col-xs-1 text-center">
        <a href="/"><img src="img/logo1.png" style="max-width:90%"></div></a>

    <div class="col-xs-1 text-center">
        <button  onclick="window.location.href='/login'" style="text-transform: uppercase;color: white;padding: 14px 30px;
        margin: 0;font-size: 16px;border-radius: 0;margin-top: 80px;border-radius:40px;" class="btn btn-primary">
        Login
    </button>
    </div>
@endsection