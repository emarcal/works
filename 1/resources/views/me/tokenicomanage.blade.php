@extends('me') @section('content')
<style>
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
@media (min-width:0px) and (max-width:984px){
    #card{
        width:100% !important;
    }
}
@media (min-width:985px){
    #card{
        width:40% !important;
    }
}
</style>
<div class="content__header">

        <h2 style="font-size:20pt"><i class="zmdi zmdi-balance-wallet"></i> TOKEN <b style="color:#1e88e5">ICO</b> Manage</h2>
        
        <table id="" class="table table-striped">
                <thead>
                    <tr>
                        <th width="4%" style="text-align:center">Order ID</th>
                        <th width="10%">Amount</th>
                        <th width="10%">Rate</th>
                        <th width="10%">ETH Address</th>
                        <th width="4%" style="text-align:center">Status</th>
                        <th width="4%" style="text-align:center">Actions</th>
                    </tr>
                </thead>
                <tbody id="all">
                 @foreach($orders as $order)
                    <tr>
                        <td>
                            {{$order->orderid}}
                        </td>
                        <td >
                            {{$order->amount}}
                        </td>
                        <td>
                            {{$order->rate}}
                        </td>
                        <td >
                            {{$order->eth_address}}
                        </td>
                        <td style="text-align:center">
                            @if($order->status == '0')
                            <span style="background-color:##1e88e5;border-color:#1e88e5"class="badge badge-warning">Pay</span>
                            @else
                            <span style="background-color:#4caf50;border-color:#4caf50"class="badge badge-warning">Sent</span>
                            @endif
                        </td>
                        <td>
                            <span style="background-color:#C9CE25;border-color:#C9CE25"class="badge badge-primary">Edit</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>    
                    </div>
                    <br>
                    <br>
                    <br>
                </div>

                
     
                    <!-- Aditional Css Table -->
                    <style>.table-striped{width:100%;}.table-striped td{padding:10px 5px;}.table-striped th{padding:10px 5px;}.zmdi{margin-right:5px;}</style>


@endsection