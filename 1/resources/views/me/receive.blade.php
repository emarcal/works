@extends('me') @section('content')
<div class="content__header">
                    <h2><i class="zmdi zmdi-arrow-left-bottom"></i> RECEIVE</h2>

                    <div class="actions">
                        <a href=""><i class="zmdi zmdi-refresh"></i></a>
                       
                    </div>
                </div>

                <div class="card">
                    <div class="card__header">
 
                    </div>
                    <!-- Aditional Css Table -->
                    <style>.table-striped{width:100%;}.table-striped td{padding:10px 5px;}.table-striped th{padding:10px 5px;}.zmdi{margin-right:5px;}</style>
                    <div class="card__body" style="text-align:center">
     

                        <img src="/storage/{{$token->img}}" alt="">

                             <h2>Name: {{$token->name}} ({{$token->symbol}})</h2>
                             <p>Decimals: {{$token->decimals}} $</p>
               
                    </div>                   
                    </div>
                </div>

@endsection