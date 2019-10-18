<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;
use App\Order;
use Auth;


class ManageController extends Controller
{
    public function index(){
        $id = "27";
        $token = Token::where('id',$id)->first();
        $orders = Order::where('userid', Auth::user()->id)->get();
        return view('me/tokenicomanage',compact('token', 'orders'));
    }
    public function order(Request $request){
        $id = "27";

        $tokenid = $id;
        $orderid = $request->orderid;
        $price = $request->price;
        $amount = $request->amount;
        $rate = $request->rate;
        $btc_rate = $request->btc_rate;
        $btc_amount = $request->btc_amount;
        $btc_address = $request->btc_address;
        $url = $request->url;
        $api = $request->api;
        $ipn = $request->ipn;
        $status = "0";
        $orderid = md5(uniqid());

        return redirect('/me/tokenico/manage')->with('success', 'ok');
    }
  
}
