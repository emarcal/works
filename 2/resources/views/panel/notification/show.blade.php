@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$token->name}}
            {{$token->lastname}}

            <a href="/tokens/{{$token->id}}/edit" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i>
                Edit</a>
    
       
               

        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i>
                    Dashboard</a>
            </li>
            <li>
                <a href="/tokens">tokens</a>
            </li>
            <li class="active">
                {{$token->name}}</li>
        </ol>
    </section>
   
    <section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-info"></i> Information</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-bank"></i> Deposits</a></li>
              <li><a href="#tab_2_5" data-toggle="tab"><i class="fa fa-share"></i> Withdrawals</a></li>
            
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box-body">  
                    <div style="width:50%;float:left">
                            <blockquote>
                                <img style="width:53px" src=" <?= $url.'/storage/'.$token->img ?> " alt=""> 
                            </blockquote>
                        </div>
                        <div style="width:50%;float:left">
                        <blockquote>
                            <p style="font-size:10pt">
                                Name
                            </p>
                            <p>
                                {{ isset($token->name) ? $token->name : 'empty'}} ( {{ isset($token->symbol) ? $token->symbol : 'symbol'}})
                            
                            </p>
                        </blockquote>
                    </div>
                        <div style="width:50%;float:left">
                            <blockquote>
                                <p style="font-size:10pt">
                                    Decimals
                                </p>
                                <p>
                                {{ isset($token->decimals) ? $token->decimals : 'decimals'}}
                                </p>
                            </blockquote>
                        </div>
                        <div style="width:50%;float:left">
                            <blockquote>
                                <p style="font-size:10pt">
                                    Rate
                                </p>
                                <p>
                                {{ isset($token->rate) ? $token->rate : 'rate'}}
                                </p>
                            </blockquote>
                        </div>
                        <div style="width:50%;float:left">
                            <blockquote>
                                <p style="font-size:10pt">
                                Status
                                </p>
                                <p>
                                <?php
                                            $stat = $token->status;
                                                if ($stat == 1){
                                                    echo '<span class="badge" style="background-color:#00a65a">Active</span>';
                                                }else{
                                                    echo '<span class="badge" style="background-color:#dd4b39">Inactive</span>';
                                                }
                                        ?>
                                </p>
                            </blockquote>
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body">  
                </div>
              </div>
              <div class="tab-pane" id="tab_2_5">
                <div class="box-body">  
                </div>
              </div>
              <!-- /.tab-pane -->
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
    
        <!-- /.col -->

  
      
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection