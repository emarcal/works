<div class="page-header" data-parallax="true">
    <div class="container">

        <div id="slide">

            <div class="row">
                <div class="col-md-7" id="main-title" style="margin-top: -70px;">
                    <h1 class="title" style="color: #FFF; font-family: 'Gotham'">The new exchange to swap your
                        <span style="font-family: 'Gotham'">crypto assets</span>
                    </h1>

                    <p style="margin-top: -5px; font-size: 15pt">Using the latest blockchain technology with full 24/7 support</p>

                    <!-- <a href="#_self" id="showcbt" class="btn btn-primary btn-round
                    btn-full-blue"> <i class="material-icons">sync</i> Swap Now! </a> -->

                </div>
                <div class="col-md-4 col-md-offset-1">
                   
                </div>
                <div class="col-md-12"></div>
            </div>
        </div>

       

        @if(session()->has('message'))
        <div class="row" style="">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-danger text-center">

                    <div class="alert-icon">
                        <i class="material-icons">lock</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </span>
                    </button>
                    Your account has been blocked, you cannot login.

                </div>

                <div class="col-md-3"></div>

            </div>
            @endif
       <?php Session::forget('message');?>
            <div id="conversor" style="display:none;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="margin-top: -90px">
                        <div class="brand">
                            <h2
                                class="title"
                                style="font-family: 'Gotham'; color: #29ABE2;margin-bottom:-10px">
                                <strong style="color: #fff;font-weigth:bold">X</strong>
                                <span>CHANGE</span>
                            </h2>

                            <h3 class="title" id="info">Make your Swap</h3>

                            <br></div>
                    </div>
                </div>
                <div class="swap row">

                    <div class="col-md-8 col-md-offset-2">
                        <!--------------------------------- Left
                        ------------------------------------------------>
                        <div class="select-left" id="row-sel-left">
                            <div class="label-select" id="amountl">Amount</div>
                            <div class="label-select" id="tol" style="display:none">To</div>
                            <div id="onlyleft">
                                <div class="input-select">
                                    <input
                                        type="number"
                                        class="input-select-input"
                                        name="inp1"
                                        oninput="swapcalcleft()"
                                        id="inputleft"
                                        value="1">
                                </div>
                                <div class="select-select">
                                    <select
                                        class="my-select my-select1 select-select-select selectleft"
                                        id="swapperleft">
                                        @foreach($tokens as $token)
                                        <?php $status = $token->status;?>
                                        @if($status==1)
                                        <option value="{{$token->id}}" data-img-src="/storage/{{$token->img}}">{{$token->symbol}}</option>
                                        @endif @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------- Button
                        ------------------------------------------------>
                        <div class="row-button" id="row-btn">
                            <button
                                class="change-button select-swap"
                                id="btnswap"
                                style="background-color: transparent; border:none; margin-left:-3px">
                                <div>
                                    <i class="material-icons">swap_horiz</i>
                                </div>
                            </a>
                        </button>
                    </div>
                    <!--------------------------------- Right
                    ------------------------------------------------>
                    <div class="select-right" id="row-sel-right">
                        <div class="label-select" id="amountr" style="display:none">Amount</div>
                        <div class="label-select" id="tor">To</div>

                        <div id="onlyright">
                            <div class="input-select">
                                <input
                                    type="text"
                                    class="input-select-input"
                                    oninput="swapcalcright()"
                                    id="inputright"
                                    name="inp2">
                            </div>
                            <div class="select-select">
                                <select
                                    class="my-select my-select2 select-select-select selectright"
                                    id="swapperright">

                                    @foreach($tokens as $token)
                                <?php 
                                            $id = $token->id;
                                            if($id == 7){
                                                $select = 'selected';
                                            }else{
                                                $select = '';
                                            }
                                            $status = $token->status;
                                        ?>
                                    @if($status==1)
                                    <option
                                        value="{{$token->decimals}}"
                                        {{ $select }}
                                        data-img-src="/storage/{{$token->img}}">{{$token->symbol}}</option>
                                    @endif @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="row buttons_option">
            <div class="col-md-12 text-center">
                <a
                    href="#_self"
                    id="cscbt"
                    class="btn btn-simple btn-round btn-trans-blue"
                    style="border: 2px solid #29ABE2;color: #29ABE2">
                    <i class="material-icons">arrow_left</i>
                    Cancel
                </a>
                <a
                    href="{{url('me/dashboard')}}"
                    id="swap_now"
                    class="btn btn-primary btn-round btn-full-blue">
                    <i class="material-icons">sync</i>
                    Swap Tokens
                </a>
            </div>
        </div>
    </form>
</div>
</div>

</div>
</div>
