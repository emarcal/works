<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Doc;
use App\Log;
use App\Ico;
use App\Token;
use Auth;
use App\G2fa;
use App\Order;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Google2FA;

class IcoController extends Controller
{
    public function index(){

        $icos = Ico::where("status",1)->orderBy('position', 'ASC')->get();
        $icolist = array();
        foreach($icos as $lico=>$ico) {
            $token = Token::where("id",$ico->tokenid)->first();
            $icolist[] = $token;
        }

        $data = array('icolist' => $icolist);
        return view('me/tokenico')->with($data);
    }
}
