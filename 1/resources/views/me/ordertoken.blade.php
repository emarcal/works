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
            width: 40% !important;
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

</style>

<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>
<script src="/js/jquery.countdown.min.js"></script>
<script src="/js/orderico.js?_<?=time()?>"></script>
<script src="/js/kl.js?_<?=time()?>"></script>

<div class="content__header">
    <h2 style="font-size:20pt"><i class="zmdi zmdi-balance-wallet"></i> <span style="color:white;">ORDER</span> <b
            style="color:#1e88e5">ICO</b></h2>
</div>
<div class="card" id="card">
    @if(Auth::user()->verified == "0")
    <div
        style="position:absolute;width:100%;height:100%;background-color:;z-index:10;text-align:center;padding-top:140px">
        <h3 style="text-transform:uppercase;color:#f05b5b">User must validate account</h3>
    </div>
    @endif
    <div class="card__body" style="padding:20px 20px 0px 20px">
        @if(Auth::user()->verified == "0")
        <div id="tokenorder" style="filter:blur(2px)">
            @endif
            <img style="max-width:100px;" src="{{$token->img}}" alt="Logo {{$token->name}}">

            <h2 style="font-size:20pt;margin-bottom:5px;"> <span style="color:white;">{{$token->name}}</span> - <b
                    style="color:#1e88e5">{{$token->symbol}} </b></h2>
            <div><small><a href="{{$token->url}}" target="_blank">{{$token->url}}</a></small></div>
            <hr>
            <input type="hidden" id="au" value="{{$units}}">

            <div id="tokenorder" style="margin-bottom: 20px;">
                <form action="{{ url('new_order') }}" id="order">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th width="50%"></th>
                                <th width="50%" style="text-align:right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                    <td colspan="2">  <p>Introduce your desired amount</p></td>
                                </tr> -->
                            <tr>
                                <td style="font-size:16px;">
                                    <p>UNITS AVAILABLE</p>
                                </td>
                                <td style="font-size:16px;text-align:right;">
                                    <p><b>{{numberFormat($units, 3, '.', ',')}} <span
                                                style="color:#1e88e5">{{$token->symbol}}</span></b></p>
                                </td>
                            </tr>
                            @if($units > 0) 
                            <tr>
                                <td style="font-size:16px;"> <p>RATE</p>
                                </td>
                                <td style="font-size:16px;text-align:right;">
                                    <p><b>{{$token->rate}}{{$token->forex}} </b></p>
                                </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td style="text-align:right"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group" style="width:100%">
                                        <input id="amount" type="text" onkeyup="calc()" name="amount"
                                            class="form-control input-lg" placeholder="Enter your desired amount"
                                            required>
                                        <input type="hidden" id="trate" value="<?=$token->rate?>">
                                        <input type="hidden" id="tsym" value="<?=$token->forex?>">
                                        <input type="hidden" id="ts" name="ts" value="<?=$token->symbol?>">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group" style="width:100%">
                                        <input id="wallet" type="text" name="wallet" onkeyup="calc()"
                                            class="form-control input-lg" placeholder="Ethereum Wallet" required>
                                        <i class="form-group__bar"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            <td style="font-size:16px;"> 
                                    <p>ORDER PRICE</p>
                                </td>
                                <td style="text-align:right;font-size:16px;">
                                    <p><b id="display"></b></p>
                                </td>
                            </tr>
                        </tbody>


                    </table>
                    <br>
                    
                    <button class="btn btn-lg btn-primary" onclick="orderValidation()" id="btnsubmit" disabled
                        style="float:left;border-radius:0px;width:100%">ORDER NOW</button>
                    
                    @else
                    </tbody>
                    </table>

                    @endif

            </div>
            @if(Auth::user()->verified == "0")
        </div>
        @endif
        <div id="confirmorder" style="display:none;margin-bottom: 20px;">
            <table style="width:100%">
                <thead>
                    <tr>
                        <th width="50%"></th>
                        <th width="50%" style="text-align:right"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                                    <td colspan="2">  <p>Introduce your desired amount</p></td>
                                </tr> -->
                    <tr>
                        <td>
                            <p>TOKEN</p>
                        </td>
                        <td style="text-align:right">
                            <p><b style="text-transform:uppercase"> {{$token->name}}</b></p>

                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td style="text-align:right"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="text-align:center;padding:50px 0px">
                                <p>Confirm you want order
                                    <span id="display2"></span>
                                    @ {{$token->rate}} {{$token->forex}} =
                                    <b><span id="display3"></span></b> <br><br>
                                    Destination Wallet:
                                    <span style="padding-top:30px;text-transform:uppercase" id="displaywallet"></span>
                                </p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding:0px 15%">
                <a href="#" onclick="orderCancel()" class="btn btn-lg btn-default"
                    style="float:left;border-radius:0px;width:47%">CANCEL</a>
                <button type="submit" onclick="sendorder()" class="btn btn-lg btn-primary"
                    style="float:left;border-radius:0px;width:47%;margin-left:6%">CONFIRM</button>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>
</form>
@if(Auth::user()->verified == "1")
<h2 style="font-size:20pt;color:white;"><i class="zmdi zmdi-balance-wallet"></i> MY ORDERS</h2>

<table id="" class="table table-striped">
    <thead>
        <tr>
            <th width="4%" style="text-align:center">Status</th>
            <th width="10%" style="text-align:center">Date</th>
            <th width="10%">Amount</th>
            <th width="3%">Rate</th>
            <th width="10%">Total</th>
            <th width="10%"></th>


        </tr>
    </thead>
    <tbody id="all">
        @foreach($orders as $order)

        @php

        $from = \Carbon\Carbon::parse($order->created_at);
        $to = $from->addDays(5);


        $days = \Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInDays($to);

        @endphp
        <tr>
            <td style="text-align:center;font-size:16px;">
            @if($order->status == '1')
                        <span style="background-color:orange;border-color:orange" class="badge badge-warning">Pending
                            Payment</span>
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
            </td>

            <td style="font-size:16px;">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d-m-Y H:m:s') }}
                
                
                @if($order->status == 1)
                <br>
                <div id="o{{$order->orderid}}" style="color:red"></div>
                <script type="text/javascript">
                    $("#o{{$order->orderid}}")
                        .countdown("{{$to->format('Y/m/d H:m:s')}}", function (event) {
                            $(this).text(
                                event.strftime('%D days %H:%M:%S left')
                            );
                        });

                </script>
                @endif
            </td>

            <td style="font-size:16px;">
                {{numberFormat($order->amount, 3, '.', ',')}} <b style="color:#1e88e5">{{$token->symbol}}</b>
            </td>

            <td style="font-size:16px;">
                {{$order->rate}}{{$token->forex}}
            </td>

            <td style="font-size:16px;">
                <strong> {{numberFormat($order->amount*$order->rate, 3, '.', ',')}}{{$token->forex}}</strong>
            </td>

            <td style="font-size:16px;">
                <a href="/me/tokenico/{{$order->orderid}}/view" class="btn btn-sm btn-primary">View Order</a>
            </td>



        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
