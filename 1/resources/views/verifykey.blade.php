

@extends('layouts.login') @section('content')
<div class="login center-abs">
<a href="{{url('./')}}"><img class="login-box-logo" src="/img/logo.png" alt=""></a>
<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}


   ::-webkit-input-placeholder { /* Edge */
  color: #999 !important;
}

</style>
    <div class="login__block toggled " id="l-login">
        <div class="login__block__header">
            <i class="fa fa-qrcode"></i>
            QR Code Authentication
        </div>

        <form method="GET" onsubmit="return checkqr()" id="checkqrform" action="{{ action('Auth\\G2faController@verify')}}">
            @csrf
            <div class="login__block__body">
            <div id="alert"></div>
            <?php
                    $ga = new $phpg2fa;
                    $secret = Auth::user()->g2fa_key;
                    
                    $qrCodeUrl = $ga->getQRCodeGoogleUrl('xchangeBlockchain City.com', $secret);
                    echo "<img src='".$qrCodeUrl."'><br><br>";
            ?>
            <div class="col-12" style="font-size:8pt; text-align:center">
                    <p>
                        1 - Download the app for your Operational<br> System <a target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=pt">Android</a> , <a href="https://itunes.apple.com/pt/app/google-authenticator/id388497605?mt=8">IOS</a>  and <a href="https://www.microsoft.com/en-us/p/authenticator/9nblggh08h54?activetab=pivot:overviewtab">Windows Phone.</a> <br>      
                        2 - Scan the barcode with the app<br> or use your manual entry code above.<br>
                        3 - Click next to enable 2FA. 
                    </p>
                         <p  style="font-size:9.5pt;">   <span><input style="margin-bottom:-10px" type="checkbox"  id="check2fa"></span> Please write down your manual entry code in  case you lose access: <b><?= $secret;?></b>  </p>
            </div>
 
                       
            <div class="col-lg-4 col-md-6">
						
						</div>
                <div
                    class="form-group">
                    <input
                        id="code"
                        type="number"
                        class="form-control text-center" style="padding:5px;"
                        name="code"
                      
                        placeholder="Type your code here"
                        required
                       >

                   <script>
                    $('input#code').attr('maxLength','6').keypress(limitMe);

                    function limitMe(e) {
                        if (e.keyCode == 6) { return false; }
                        return this.value.length < $(this).attr("maxLength");
                    }
                   </script>
                   
                    <i class="form-group__bar"></i>
                </div>
                <div class="modal fade" id="help">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Help</h4>
                                    </div>
            
                                    <div class="modal-body">
                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-link">Save changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>   
                <!-- <div class="form-group">
                    {!! captcha_img() !!}
                </div> -->
                <div class="form-group">
                    <div class="input-centered">
                        
                        <!-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                        <br>
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Create an account?') }}
                        </a> -->
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-small">
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>
                </form>
               
                <script>
                    function checkqr(){
                        var code = document.getElementById('code').value;
                        var checkBox = document.getElementById("check2fa");
                        if(code.length < 6){
                            $('#alert').empty();
                           $('#alert').append('<div style="padding: 0%"> <div class="alert alert-warning" role="alert"> The code has 6 digits.</div></div>');
                            return false;
                        }
                        if(checkBox.checked == true){
                            return true;
                        }else{
                           
                           $('#alert').empty();
                           $('#alert').append('<div style="padding: 0%"> <div class="alert alert-warning" role="alert"> Please check the checkbox.</div></div>');
                        return false;
                        }
                        
                    }
                </script>
            </div>
        </div>
        </div>
        </div>
    </div>


 @endsection

