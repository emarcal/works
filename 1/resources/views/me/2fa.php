<div class="card">
            <div class="action-header action-header--card">

                <div class="widget-past-days__chart ">
                
                </div>
                <div class="widget-past-days__info">

                    <p style="font-size:12pt; margin-top:10px">
                       Two Factor Authentication</p>
                </div>
            </div>

            <div class="list-group list-group--striped">
                <div class="list-group-item">
                    <div class="widget-past-days__chart ">
                    
                    <div class="form-group">
                    <form action="{{ action('Me\\DashboardController@change2fa')}}" id="form2fa" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <?php $g2fa_status = Auth::user()->g2fa_status; ?>
                                    @if(empty($g2fa_status) || $g2fa_status == "0")
                                    <div class="toggle-switch">
                                        <input type="checkbox" class="toggle-switcha__checkbox"  onclick="checkbtn()">
                                        <i class="toggle-switch__helper"></i>
                                    </div>
                                   
                                    @else
                                    <div class="toggle-switch">
                                        <a data-toggle="modal" href="#modal--g2fa">
                                            <input type="checkbox" class="toggle-switch__checkbox" checked>
                                            <i class="toggle-switch__helper"></i>
                                        </a>
                                    </div>

                                    @endif
                                </div>
                     </form>
                     <script>
                         function checkbtn(){
                            document.getElementById('form2fa').submit();
                         }
                     </script>
                        
                    </div>
                    <div class="widget-past-days__info">

                        <p style="font-size:12pt; margin-top:10px">Enable or Disable</p>
                    </div>
                </div>
            
            </div>
            
        </div><div class="modal fade" id="modal--g2fa">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Two Factor Authentication</h4>
                                    </div>
                                    <form method="GET" onsubmit="return checkqr()" id="checkqrformdisable" action="{{ action('Auth\\G2faController@disable2fa')}}">
            @csrf
                                    <div class="modal-body" style="text-align:center">

                                           
       
            <div class="login__block__body">
            <?php $tries = session('tries');   ?>

            @if($tries == 2)
            <div style="padding: 0%">
                    <div class="alert alert-danger" role="alert">
                    <i class="zmdi zmdi-lock"></i> You only have one try left, or your account will be blocked! 
                    </div>
            </div>
            @endif
            @if($tries == 3)
            <div style="padding: 0%">
                    <div class="alert alert-danger" role="alert">
                    <i class="zmdi zmdi-lock"></i> Your account has been blocked! 
                    </div>
            </div>
            @endif
            <?php
                    $ga = new $phpg2fa;
                    $secret = Auth::user()->g2fa_key;
                    
                    $qrCodeUrl = $ga->getQRCodeGoogleUrl('xchangeBlockchain City.com', $secret);
                    echo "<img src='".$qrCodeUrl."'><br><br>";
                    
                    $oneCode = $ga->getCode($secret);
                    echo "Manual entry: ".$secret."<br><br>";
                    
                    $checkResult = $ga->verifyCode($secret, $oneCode, 2);    
                    if ($checkResult) {
                     
                    } else {
              
                    }
            ?>
  
                <div
                    class="form-group">
                    <input
                        id="code"
                        type="number"
                        class="form-control text-center" style="padding:5px;border-bottom:1px solid #555;color:#555"
                  
                        value=""
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
                       <div class="col-12" style="font-size:9pt; text-align:center">
                       <br>
                    <p>
                       By disabling your 2FA, you will lose your current authentication.<?= $oneCode;?>
                    </p>
            </div>
                                         </div>
                                         </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-link">Disable</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
   

                        <script>
                    function checkqr(){
                        var code = document.getElementById('code').value;
                        var madecode = "<?= $oneCode;?>"
                        if(code == madecode){
                          
                            document.getElementById("checkqrformdisable").submit();
                        }else{
                          
                            
                        return false;
                        }
                        
                    }
                </script>