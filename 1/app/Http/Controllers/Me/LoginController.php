<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\G2fa;

class LoginController extends Controller
{
    public function index(){
        $phpg2fa = new G2fa();
        return view('auth.g2fa',compact('phpg2fa'));
    }
}
