@extends('me') @section('content')
@if(session()->has('success'))
<div style="padding: 0%">
    <div class="alert alert-success" role="alert">
        Your order has successfuly been created.
    </div>
</div>
@endif

@if(session()->has('errror'))
<div style="padding: 0%">
    <div class="alert alert-danger" role="alert">
        An error ocurr. Please try again.
    </div>
</div>
@endif
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    @media (min-width:0px) and (max-width:984px) {
        #card {
            width: 100% !important;
        }
    }

    @media (min-width:985px) {
        #card {
            width: 60% !important;
        }
    }

    .iwallet {
        padding: 3px;
        color: red;
    }

    .iamount {
        padding: 3px;
        color: red;
    }

    .radio input[type=radio] {
        opacity: 1;
    }

    .badge {
        font-size: 14px;
    }

</style>

<script src="/js/jquery.countdown.min.js"></script>
<script src="/js/vieworder.js?_<?=time()?>"></script>
<script src="/js/kl.js?_<?=time()?>"></script>

<div class="content__header">
    <h2 style="font-size:20pt;margin-bottom:10px;"><i class="zmdi zmdi-balance-wallet"></i> <span
            style="color:white;">VIEW ORDER</span> <b style="color:#1e88e5">ICO</b></h2>
    <a href="/me/tokenico/{{$token->symbol}}/order" class="btn btn-sm btn-default" style="">Go Back</a>
</div>
<div class="card" id="card">

    <div class="card__body" style="padding:20px 20px 0px 20px">

        <img style="max-width:100px;" src="{{$token->img}}" alt="Logo {{$token->name}}">

        <h2 style="font-size:20pt;margin-bottom:5px;"> <span style="color:white;">{{$token->name}}</span> - <b
                style="color:#1e88e5">{{$token->symbol}} </b></h2>
        <div><small><a href="{{$token->url}}" target="_blank">{{$token->url}}</a></small></div>
        <hr>
        <table class="table" style="width:100%;font-size:16px;">
            <thead>

                <tr>
                    <th>Status:</th>
                    <th style="">

                        @if($order->status == '1')
                        <span style="background-color:orange;border-color:orange" class="badge badge-warning">Pending
                            Payment</span>
                        <button oid="{{$order->orderid}}" id="btcord" class="btn btn-sm btn-danger" style="float:right;">Cancel Order</button>
                        @elseif($order->status == '4')
                        <span style="background-color:red;border-color:red" class="badge badge-danger">Cancelled</span>
                        @elseif($order->status == '5')
                        <span style="background-color:red;border-color:red" class="badge badge-danger">Expired</span>
                        @elseif($order->status == '3')
                        <span style="background-color:green;border-color:green" class="badge badge-danger">Completed</span>
                        @elseif($order->status == '2')
                        <span style="background-color:green;border-color:green" class="badge badge-danger">Confirmation</span>
                        @else
                        <span style="" class="badge badge-warning">Waiting</span>
                        @endif

                    </th>
                </tr>

                <tr>
                    <th>Date:</th>
                    <th style="">
                        {{$order->created_at}}
                    </th>
                </tr>

                <tr>
                    <th>Order Id:</th>
                    <th style="">{{$order->orderid}}</th>
                </tr>

                <tr>
                    <th>Ethereum Wallet:</th>
                    <th style="">{{$order->eth_address}}</th>
                </tr>

                <tr>
                    <th>Amount</th>
                    <th style="">
                        <b>{{numberFormat($order->amount, 3, '.', ',')}} <span
                                style="color:#1e88e5">{{$token->symbol}}</span></b>
                    </th>

                <tr>
                    <th>Rate</th>
                    <th style="">
                        <b>{{numberFormat($order->rate, 2, '.', ',')}}{{$token->forex}}</b>
                    </th>
                </tr>

                <tr>
                    <th>Total</th>
                    <th style="">
                        <strong> {{numberFormat($order->amount*$order->rate, 2, '.', ',')}}{{$token->forex}}</strong>
                    </th>
                </tr>


            </thead>
        </table>

        @if($order->payment_status == "0" && $order->status == "1")
        <div style="margin-top:10px;padding-bottom:20px;" id="spayment">
            <h4 style="color:white;font-size:20px;">Select Payment Method</h4>
            <form action="/me/tokenico/{{$order->orderid}}/pay" id="pf">
                <div class="radio" style="margin-top:15px;margin-bottom:20px;font-size:16px;">
                    <label style="">
                        <input type="radio" name="ppay" id="optionsRadios1" value="bitcoin" checked>
                        <img src="/img/bitcoin.png" style="width:20px;"> Bitcoin
                    </label>
                </div>
                <div class="radio" style="font-size:16px;margin-bottom:15px;">
                    <label>
                        <input type="radio" name="ppay" id="optionsRadios2" value="bank">
                        <i class="fa fa-university" aria-hidden="true"></i> Bank Transfer
                    </label>
                </div>

                <button id="ppayment" class="btn btn-primary" style="">Proceed Payment</button>
            </form>
        </div>
        @elseif($order->payment_status == "1" && $order->status == "1")

        

        <div style="margin-top:30px;padding-bottom:20px;" id="apayment">
            <h4 style="color:white;font-size:20px;">Payment Method - 

            @if($order->payment_type == "bitcoin")
                <img src="/img/bitcoin.png" style="width:20px;"> Bitcoin
            @else
                <i class="fa fa-university" aria-hidden="true"></i> Bank Transfer
            @endif
        
            </h4>
            

            @if($order->payment_type == "bitcoin")

            <div>

            
            <iframe id="" style="border:none;background:transparent;height:990px;" frameborder="0" src="{{$order->url}}" width="100%" height="100%"></iframe>

            @if($order->btc_status == "new")
            <div style="padding:20px;text-align:center;">
            <button oid="{{$order->orderid}}" id="capay" class="btn btn-sm btn-danger" style="">Cancel Payment</button>
            </div>
            @endif
            </div>

            @endif

            @if($order->payment_type == "bank")

            <div>
            <table class="table" style="width:60%;">
                    <tr>
                        <td colspan="2">PSC INVESTMENT LLC</td>
                    </tr>
                    <tr>
                        <td>Bank:</td>
                        <td>Emirates Islamic Bank</td>
                    </tr>

                    <tr>
                        <td>Account:</td>
                        <td>3707365195801</td>
                    </tr>

                    <tr>
                        <td>Iban:</td>
                        <td>AE670340003707365195801</td>
                    </tr>

                    <tr>
                        <td>Swift:</td>
                        <td>MEBLAEAD</td>
                    </tr>

                    <tr>
                        <td>Use Transfer Code:</td>
                        <td>{{$order->bank_code}}</td>
                    </tr>
            </table>
            </div>

            @endif

        </div>

        @elseif($order->payment_status == "2" && $order->status == "3")

        <div style="margin-top:30px;padding-bottom:20px;" id="apayment">
            <h4 style="color:white;font-size:20px;">Payment Method - 

            @if($order->payment_type == "bitcoin")
                <img src="/img/bitcoin.png" style="width:20px;"> Bitcoin
            @else
                <i class="fa fa-university" aria-hidden="true"></i> Bank Transfer
            @endif
        
            </h4>
            

            @if($order->payment_type == "bitcoin")

            <div>
                <table class="table" style="width:60%;">
                    <tr>

                        <td>Payment Status</td>
                        <td><span style="background-color:green;border-color:green" class="badge badge-success">Completed</span></td>

                    </tr>

                    <tr>

                        <td>Bitcoin Amount:</td>
                        <td>{{$order->btc_amount}} BTC</td>

                    </tr>

                    <tr>

                        <td>Bitcoin Address:</td>
                        <td><a href="https://www.blockchain.com/btc/address/{{$order->btc_address}}" target="_blank">{{$order->btc_address}}</a></td>

                    </tr>

                    <tr>

                        <td>Bitcoin rate:</td>
                        <td>{{$order->btc_rate}}$</td>

                    </tr>
                </table>

            </div>

            @endif

        </div>



        @else

        <div style="padding:20px;">

        </div>

        @endif

    </div>
</div>



@endsection
