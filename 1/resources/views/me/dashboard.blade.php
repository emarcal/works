
@extends('me')

@section('content')
<style>
    @media (min-width:0px) and (max-width:360px){ 
        .icon-dashboard{
            font-size: 50pt;
        }
        .text-dashboard{
            font-size: 10pt;
            font-weight:500;
        }
    }
   
    @media (min-width:761px){ 
        .icon-dashboard{
            font-size: 50pt;
        }
        .text-dashboard{
            font-size: 15pt;
            font-weight:500;
        }
    }
    .verify{
        font-size:12pt;
        text-align:center;
    }
/* The alert message box */
.alert {
  padding: 20px;
  background-color: #3c843f;
  color: white;
  margin-bottom: 15px;
  border-color: transparent;

}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}
</style>



   
</div>
<div class=" widget-pie-grid" style="padding:10px 0px 40px 10px">
    <div class="col-xs-12 col-sm-6 col-md-4 ">
         <img style="width:100%" src="/img/infor.png?_1" alt="">
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 ">
    <h2><b style="color:white">Welcome to Your Blockchain City Exchange Membership</b> </h2><br>
         <p>We're showing appreciation for our most loyal foxy customers through 
         exclusive benefits, perks, and a better user experience. As a Member, 
         you’ll be able to take advantage of these perks across the entire suite 
         of <b>Blockchain City</b> services!</p>
         {{-- <a href="{{ url('../')}}" class="btn btn-primary" > <i class="zmdi zmdi-refresh"></i> SWAP NOW</a> --}}
    </div>
  
</div>
<?php $emailstatus;?>
@if(!empty($user->new_email))
                        @if($user->email != $user->new_email)
                            <div style="padding: 0%">
                                <div class="verify alert alert-warning" role="alert">
                                    <i class="zmdi zmdi-email"></i> Please verify your inbox to confirm your email alteration.
                                </div>
                            </div>
                        @endif
                    @endif   
                    <style>
                                @media (min-width:0px) and (max-width:350px){
                                    .box_black{
                                        height:240px;
                                    }
                                    .box_white{
                                        height:240px;
                                    }
                                }
                                @media (min-width:351px) and (max-width:525px){
                                    .box_black{
                                        height:180px;
                                    }
                                    .box_white{
                                        height:180px;
                                    }
                                }
                                @media (min-width:526px) and (max-width:750px){
                                    .box_black{
                                        height:165px;
                                    }
                                    .box_white{
                                        height:165px;
                                    }
                                }
                                @media (min-width:526px) and (max-width:750px){
                                    .box_black{
                                        height:165px;
                                    }
                                    .box_white{
                                        height:165px;
                                    }
                                }
                                @media (min-width:751px) and (max-width:950px){
                                    .box_black{
                                        height:230px;
                                    }
                                    .box_white{
                                        height:230px;
                                    }
                                }
                            </style>
                    @if($verified == 0)
                            <div class="card widget-pie-grid">
                          
                                <div class="col-xs-12 col-sm-12 col-md-12s widget-pie-grid__item box_white">
                                    <h1 class="icon-dashboard" style="color:<?=$idcolor;?>"><i class="zmdi zmdi-account-box"></i></h1>
                                    <p class="text-dashboard" style="color:<?=$idcolor;?>"><i  class="zmdi zmdi-<?=$idstatus;?>-circle"></i> <?=$idmessage;?></p>
                                    @if($idlink==1)
                                        <a href="/me/account/#docsto"><small>Upload</small></a>
                                    @else
                                       <small style="color:transparent">@by Elvis Marçal</small>
                                    @endif
                                
                                </div>
                                
                            
                            </div>
                    @else
                           
                            <div style="padding: 0%">
                                    <div class="verify alert alert-warning" role="alert" style="font-size:15pt">
                                    <i class="zmdi zmdi-check-circle"></i> Your account is verified.
                                    </div>
                                </div>
                            
                    @endif    
                    <style>

.carousel-indicators active{
    width:10px !important;
    height:10px !important;
}

</style>



                        </div>
                    </div>

             


        @endsection
