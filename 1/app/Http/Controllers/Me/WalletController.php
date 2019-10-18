<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;

class WalletController extends Controller
{
    public function index(){
        $tokens = Token::where('status','1')->get();
        return view('me.wallet',compact('tokens'));
    }
    public function send($token_symbol){
        
        $token = Token::where('symbol',$token_symbol)->first();

        // Check the Status
        $status = $token->status;

        if($status != 1){
            return redirect('/me/dashboard');
        }

        return view('me.send',compact('token'));
    }
    public function receive($token_symbol){
        $token = Token::where('symbol',$token_symbol)->first();

    
        // Check the Status
        $status = $token->status;

        if($status != 1){
            return redirect('/me/dashboard');
        }

        return view('me.receive',compact('token'));
    }
}
