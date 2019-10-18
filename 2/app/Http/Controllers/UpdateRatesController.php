<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Token;



class UpdateRateController extends Controller
{
    public function ufx($token,$rate){
        $utoken = Token::where('symbol',$token)->first();
        $
        return back();
    }
    
}
