@extends('me') @section('content')
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
            border-radius: 12px;
        }
    }

    .table-striped {
        width: 100%;
    }

    .table-striped td {
        padding: 10px 5px;
    }

    .table-striped th {
        padding: 10px 5px;
    }

    .zmdi {
        margin-right: 5px;
    }

    @media (min-width: 992px) {
        .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
    float: right;
}
    }


</style>
<div class="content__header">

    <h2 style="font-size:20pt"><i class="zmdi zmdi-balance-wallet"></i> ACTIVE TOKEN <b style="color:#1e88e5">ICO</b>
    </h2>


</div>

<div class="row">


    @foreach ($icolist as $ico)
    <div class="col-md-4">

        <div class="card" id="card">
            <div class="card__body">
                <div class="row" style="text-align:center">

                    <img style="max-width:120px;" src="{{$ico->img}}" alt="Logo {{$ico->name}}">

                    <h2 style="color:white;"><b>{{$ico->name}}</b> </h2>
                    <h2 style="margin-top: 0px;margin-bottom: 10px;"><b>{{$ico->symbol}}</b> </h2>
                    <p><a href="{{$ico->url}}" target="_blank">{{$ico->url}}</a> </p>
                    <a href="/me/tokenico/{{$ico->symbol}}/order"><button class="btn btn-lg btn-primary">ENTER ICO</button></a>
                    <br>
                    <br>
                </div>
            </div>
        </div>

    </div>
    @endforeach



</div>



</div>

<script src="/js/kl.js?_<?=time()?>"></script>
@endsection
