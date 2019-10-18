

@extends('layouts.login') @section('content')
<div class="login center-abs">
<a href="{{url('./')}}"><img class="login-box-logo" src="/img/logob.png" alt=""></a>
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
            Two Factor Authentication
        </div>

        <form method="GET"  id="checkqrform" action="{{ action('Auth\\G2faController@login')}}">
            @csrf
            <div class="login__block__body">
            @if(session()->has('error2fa'))
           <div style="padding: 0%">
                <div class="alert alert-danger" role="alert">
                        Your 6 digit code was incorrect, try again.
                    </div>
            </div>
          @endif 
            <?php
                    $ga = new $phpg2fa;
                    $secret = Auth::user()->g2fa_key;
                    
                    $qrCodeUrl = $ga->getQRCodeGoogleUrl('xchangeBlockchain City.com', $secret);
                    // "<img src='".$qrCodeUrl."'><br><br>";
                    
                    $oneCode = $ga->getCode($secret);
                   
                    
                    $checkResult = $ga->verifyCode($secret, $oneCode, 2);    
                    if ($checkResult) {
                     
                    } else {
              
                    }
            ?>
            <div class="col-12" style="font-size:10pt; text-align:center">
            <p>
                      Enter your six-digit number<br> from your  mobile app here
                    </p>
            </div>
            
  <div class="col-lg-4 col-md-6">
						
						</div>
                <div
                    class="form-group">
                    <input
                        id="code"
                        type="number" name="code"
                        class="form-control text-center" style="padding:5px;"
                        name="email"
                      
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
              
              
                <div class="form-group">
                    <div class="input-centered">
                      
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-small">
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>
                </form>
               
                <script>
              
            
                </script>
            </div>
        </div>
        </div>
        </div>
    </div>


 @endsection

