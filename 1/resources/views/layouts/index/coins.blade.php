<style>

    .carousel-indicators active{
        width:10px !important;
        height:10px !important;
    }
 
</style>
<div class="row" style="margin-top:-90px">

    <div id="sliderTokenRate" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner" role="listbox" style="border-radius:10px">
            <div class="item active">
                <div
                    class="social-line social-line-big-icons"
                    style="background:rgba(35, 35, 35,0.8);">
                    <div class="content" style="padding:0px 14px 0px 14px">
                        <div class="row">
                            @foreach($tokens_1 as $token)
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <a href="#" class="btn btn-simple btn-just-icon btn-white" >
                                        <div class="row" >
                                            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-7" style="border:none">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-5" style="border:none">
                                                        <img style="width:45px;margin-top:0px" src="/storage/{{$token->img}}" alt="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-7">
                                                        <div
                                                            style="font-size:12pt;text-align:left;text-transform:capitalize;border:none">{{$token->symbol}}</div>
                                                        <div style="font-size:7pt;text-align:left;color:#ddd">{{$token->name}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-5" style="border:none">
                                                <?php 
                                                    $rate = $token->rate;
                                                    $decimals = $token->decimals;
                                                    $rate_value = number_format($rate,2,'.',',')
                                                ?>
                                                <div
                                                    style="font-size:12pt;text-align:right;text-transform:capitalize;border:none">{{ $token->forex }}
                                                    {{$rate_value}}</div>
                                            </div>
                                        </div>

                                        <div class="ripple-container"></div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="item ">
                <div
                    class="social-line social-line-big-icons"
                    style="background:rgba(35, 35, 35,0.7)">
                    <div class="content" style="padding:0px 14px 0px 14px">
                        <div class="row">
                            @foreach($tokens_2 as $token)
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <a href="#" class="btn btn-simple btn-just-icon btn-white">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-7" style="border:none">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-5" style="border:none">
                                                        <img style="width:45px;margin-top:0px" src="/storage/{{$token->img}}" alt="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-7">
                                                        <div
                                                            style="font-size:12pt;text-align:left;text-transform:capitalize;border:none">{{$token->symbol}}</div>
                                                        <div style="font-size:7pt;text-align:left;color:#ddd">{{ $token->name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-5" style="border:none">
                                                <?php 
                                                    $rate = $token->rate;
                                                    $decimals = $token->decimals;
                                                    $rate_value = number_format($rate,2,'.',',')
                                                ?>
                                                <div
                                                    style="font-size:12pt;text-align:right;text-transform:capitalize;border:none">{{ $token->forex }}
                                                    {{$rate_value}}</div>
                                            </div>
                                        </div>

                                        <div class="ripple-container"></div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
       
</div>