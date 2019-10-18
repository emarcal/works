<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\G2fa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginkeyController extends Controller
{
    public function index(){
        $phpg2fa = new G2fa();
        return view('verifykey',compact('phpg2fa'));
    }
    public function login(){

        $phpg2fa = new G2fa();
        return view('loginkey',compact('phpg2fa'));
    }
    public function verify(){

        $id = Auth::user()->id;

        $change = User::where('id', $id)->first();
        $change->g2fa_status = "1";
        $change->save();

        return redirect('me/account')->with('success2fa_enabled','success');
    }
    
    public function failverify(){

        $id = Auth::user()->id;

        $change = User::where('id', $id)->first();
        $change->g2fa_status = "0";
        $change->g2fa_key = "";
        $change->save();

        return redirect('me/account')->with('error2fa','fail');
    }
    public function disable2fa(){

        $id = Auth::user()->id;

        $change = User::where('id', $id)->first();
        $change->g2fa_status = "0";
        $change->g2fa_key = "";
        $change->save();

        return redirect('me/account')->with('success2fa_disabled','success');
    }
}
