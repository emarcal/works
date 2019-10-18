<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Token;



class UpdateRateController extends Controller
{
    public function ufx($token,$rate){

        if(is_float($rate) || !empty($token)){

            $utoken = Token::where('symbol',$token)->first();
            
            if($utoken){
                $utoken->rate = $rate;
                $utoken->save();
                return "1";
            }else{
                return "0";
            }
        } else {
            return 0;
        }
    }
    
    
}
