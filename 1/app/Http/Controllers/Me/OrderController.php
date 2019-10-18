<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;
use App\Order;
use App\TokenTransactions;
use Auth;


class OrderController extends Controller
{
    public function index($token){
        $t = Token::where('symbol',$token)->first();

        if(!$t) {
            return redirect('me/tokenico');
        }
        $id = $t->id;
        $token = Token::where('id',$id)->first();
        $orders = Order::where('userid', Auth::user()->id)->where('tokenid', $token->id)->orderBy('id', 'DESC')->get();
        $units = TokenTransactions::where("tokenid",$token->id)->sum("amount");
        return view('me/ordertoken',compact('token', 'orders','units'));
    }

    public function ugr(Request $request){
        $rate = bcmul($request->g,0.85,2);

        Token::where('symbol', 'ISGC')->update([
            'rate' => $rate
        ]);

    }

    public function ipn(Request $request){
        $req = $request->all();
        //file_put_contents("/home/ididentification/office.ididentification.org/public/ipn_logs/" . date("d-m-Y H:m:s"). "-ipn.json", json_encode($req));
        
        $data = $req;
        if (isset($req["data"])) {
            $data = $req["data"];
        } else {
            die("No data");
        }

        $invoiceid = trim($data["id"]);


 
        $p = Order::where("btc_invoice", $invoiceid)->first();
 
        if($p) {

        $p->ipn = json_encode($req);
        
        if (($data["status"] == "expired" || $data["status"] ==  "invalid") && $p->status == 1) {
            $p->btc_status = "expired";
            $p->payment_status = 0;
        } 

        if ($data["status"] == "completed") {
            $p->status = 3;
            $p->btc_status = "completed";
            $p->payment_status = 2;
        }

        if ($data["status"] == "paid") {
            $p->status = 2;
            $p->btc_status = "paid";
            $p->payment_status = 2;
        }

        if ($data["status"] == "confirmed") {
            $p->status = 2;
            $p->btc_status = "confirmed";
            $p->payment_status = 2;
        }

        $p->save();
    }
    }

    public function orderview($orderid){
        $order = Order::where('orderid',$orderid)->first();
        

        if(!$order) {
            return redirect('me/tokenico');
        }
        $id = $order->id;
        $token = Token::where('id',$order->tokenid)->first();
        return view('me/orderview',compact('token', 'order'));
    }

    public function cancel($orderid){
        $order = Order::where('orderid',$orderid)->first();
        

        if(!$order) {
            return redirect('me/tokenico');
        }
        $id = $order->id;
        $token = Token::where('id',$order->tokenid)->first();

        Order::where('id', $id)->update([
            'payment_status' => 0,
            'status' => 4
        ]);

        TokenTransactions::create([
            'tokenid' => $token->id,
            'userid' => $order->userid,
            'orderid' => $orderid,
            'amount' => $order->amount,
            'rate' => $order->rate,
            'status' => 1,
            'tdesc' => "Canceled by User"
        ]);


        return redirect('/me/tokenico/'.$order->orderid.'/view');
    }

    public function paycancel   ($orderid){
        $order = Order::where('orderid',$orderid)->first();
        

        if(!$order) {
            return redirect('me/tokenico');
        }
        $id = $order->id;
        $token = Token::where('id',$order->tokenid)->first();

        Order::where('id', $id)->update([
            'payment_status' => 0,
            'status' => 1
        ]);


        return redirect('/me/tokenico/'.$order->orderid.'/view');
    }

    public function payorder(Request $request,$orderid){
        $order = Order::where('orderid',$orderid)->first();
        

        if(!$order) {
            return redirect('me/tokenico');
        }
        $token = Token::where('id',$order->tokenid)->first();
        $id = $order->id;
        

        if($request->ppay == "bitcoin") {

            $server = "";
            
            $invoice = array(
                "uid" => $order->userid,
                "orderid" => $order->orderid,
                "token" => $token->symbol,
                "value" => bcmul($order->rate,$order->amount),
                "currency" => "USD",
                "status" => "new",
                "pdesc" => "ICO " . $token->symbol,
                "ipn" => "https://".$server."xchangeumbrella.com/tipn"
            );

            $postdata = json_encode($invoice);

            $opts = array('http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/json',
                'content' => $postdata,
            ),
            );
            $port = 3000;

            $context = stream_context_create($opts);
            
            $res = json_decode(file_get_contents('http://127.0.0.1:' . $port, false, $context), true);

            

            if(isset($res["url"])) {

                Order::where('id', $id)->update([
                'payment_status' => 1,
                'payment_type' => $request->ppay,
                'url' => $res['url'],
                'btc_amount' => $res['btcPrice'],
                'btc_status' => $res['status'],
                'btc_address' => $res['bitcoinAddress'],
                'btc_rate' => $res['rate'],
                'btc_invoice' => $res['id']
                ]);
                
            }

        }

        if($request->ppay == "bank") {

            Order::where('id', $id)->update([
                'payment_status' => 1,
                'payment_type' => $request->ppay,
                'bank_code' => substr(sha1(mt_rand()),17,6),
            ]);

        }


        return redirect('/me/tokenico/'.$order->orderid.'/view');
    }


    public function order(Request $request){

        $token = Token::where('symbol',$request->ts)->first();

        

        if(!$token) {
            return redirect('me/tokenico');
        }

        // count stock

        $units = TokenTransactions::where("tokenid",$token->id)->sum("amount");
        $amount = $request->amount;


        if($units >= $amount) {

            
            $tokenrate = $token->rate;
            $tokenid = $token->id;
            $orderid = $request->orderid;
            $price = 0;
            $btc_rate = 0;
            $btc_amount = 0;
            $btc_address = "";
            $eth_address = $request->wallet;
            $url ="";
            $api = "";
            $ipn = "";
            $status = "0";
            $orderid = md5(uniqid());
        

            Order::create([
                'tokenid' => $tokenid,
                'userid' => Auth::user()->id,
                'orderid' => $orderid,
                'amount' => $amount,
                'rate' => $tokenrate,
                'btc_rate' => $btc_rate,
                'eth_address' => $eth_address,
                'status' => 1
            ]);

            TokenTransactions::create([
                'tokenid' => $tokenid,
                'userid' => Auth::user()->id,
                'orderid' => $orderid,
                'amount' => -$amount,
                'rate' => $tokenrate,
                'status' => 1
            ]);



            return redirect('/me/tokenico/'.$token->symbol.'/order')->with('success', 'ok');
                
    
        } else {
        
            return redirect('/me/tokenico/'.$token->symbol.'/order')->with('success', 'error');
        }
    }
  
}
