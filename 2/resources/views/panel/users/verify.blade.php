@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        
            {{$user->name}}
            {{$user->lastname}} <?php $verified = $user->verified;?>
                                      @if($verified != "0")
                                        <span class="badge" style="background-color:#00a65a">Verified</span>
                                      @else
                                        <span class="badge" style="background-color:#dd4b39">Unverified</span>
                                      @endif
            <a href="/user/show/{{$user->id}}" class="btn btn-info btn-xs">
                <i class="fa fa-info"></i>
                Show</a>
         
            <a href="/user/edit/{{$user->id}}" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i>
                Edit</a>
          
                <?php
                  $current = $user->id;
                  $next = $current + 1;
                  $previous = $current - 1;
                ?>
                <a href="/user/verify/{{$previous}}" class="btn btn-primary btn-xs">
                <i class="fa fa-fast-backward"></i>
                Previous</a>
                <a href="/user/verify/{{$next}}" class="btn btn-primary btn-xs">
                <i class="fa fa-fast-forward"></i>
                Next</a>

        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i>
                    Dashboard</a>
            </li>
            <li>
                <a href="/users">Users</a>
            </li>
            <li class="active">
                {{$user->name}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-7">
                <div class="box">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">

                     <div class="row">
                     <div style="width:33%;float:left">
                                <blockquote>
                                    <p style="font-size:10pt">
                                        Name
                                    </p>
                                    <p>
                                        {{ isset($user->name) ? $user->name : 'empty'}}
                                        {{ isset($user->lastname) ? $user->lastname : 'empty'}}
                                    </p>
                                </blockquote>
                            </div>
                            <div style="width:33%;float:left">
                                <blockquote>
                                    <p style="font-size:10pt">
                                        E-Mail
                                    </p>
                                    <p>
                                        {{$user->email}}
                                    </p>
                                </blockquote>
                            </div>
                            <div style="width:33%;float:left">
                                <blockquote>
                                    <p style="font-size:10pt">
                                        CPF
                                    </p>
                                    <p>
                                        {{$user->cpf}}
                                    </p>
                                </blockquote>
                            </div>
                     </div>
                     <hr>
                        <!-- form start -->
            <form method="POST" onsubmit="return check()" action="{{ action('UserController@docupdate')}}" accept-charset="UTF-8" style="display:inline">
     
                {{ csrf_field() }}
              <input type="text" name="id"  value="{{$user->id}}" hidden>
              <div class="box-body">
                <div class="form-group">
                  <label>Document Status</label>
                  <select name="doc_id" id="doc_id" oninput="check_front_id()" class="form-control">
                      <?php 
                        $current_status = $doc->status_id; 
                        $status = ucfirst($current_status);
                      ?>
                      <option value="{{$current_status}}">{{$status}}</option>
                      <?php $status = $doc->status_id;?>
                      @if($status != "new")
                        <option value="new">New</option>
                      @endif
                      @if($status != "sent")
                       <option value="sent">Sent</option>
                      @endif
                      @if($status != "processing")
                       <option value="processing">Processing</option>
                      @endif
                      @if($status != "accepted")
                       <option value="accepted">Accepted</option>
                      @endif
                      @if($status != "refused")
                       <option value="refused">Refused</option>
                      @endif

                  </select>
                </div>
                
              </div>
              <!-- /.box-body -->
              <hr>
              <div class="box-body pull-right">
                <a href="/users"  class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
              </div>
            </form>
      
            <script>
            // Old Data
              var id_front = "<?= $doc->status_id;?>"
              var id_verse = "<?= $doc->status_id_verse;?>"
              var id_address = "<?= $doc->status_address;?>"
              function check_front_id(){
                var new_id_front = document.getElementById('doc_id').value;
                if(new_id_front == "refused"){
                        $('#refused_front_id').modal('show');
                    }
              }
              function check_verse_id(){
                var new_id_verse = document.getElementById('doc_id_verse').value;
                if(new_id_verse == "refused"){
                        $('#refused_verse_id').modal('show');
                    }
              }
              function check_address(){
                var new_address = document.getElementById('doc_address').value;
                if(new_address == "refused"){
                        $('#refused_address').modal('show');
                    }
              }
              function check(){
                // Geting Current
                var new_id_front = document.getElementById('doc_id').value;
                var new_id_verse = document.getElementById('doc_id_verse').value;
                var new_address =  document.getElementById('doc_address').value;
                

                  // Check Front ID
               
                  if(id_front != "refused"){
                    if(new_id_front == "refused"){
                        $('#refused_front_id').modal('show');
                        return false;
                    }
                  }
                  // Check Verse ID
               
                  if(id_verse != "refused"){
                    if(new_id_verse == "refused"){
                        $('#refused_verse_id').modal('show');
                        return false;
                    }
                  }
                  // Check Address
               
                  if(id_address != "refused"){
                    if(new_address == "refused"){
                        $('#refused_address').modal('show');
                        return false;
                    }
                  }
                }
          </script>  
                    </div>
                    <!-- /.box-body -->
                </div>

          <!-- DIRECT CHAT WARNING -->
        
          <!--/.direct-chat -->
        </div>
                <!-- /.box -->
          
           
            <!-- /.col -->
            <div class="col-xs-5">
                <div class="box">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">

                     
                        <!-- form start -->
                        <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      CPF
                      </a>
                    </h4>
                    <span class="pull-right-container" style="float:right">
                       <a target="_blank" href="{{$url}}/storage/{{$doc->doc_id}}/<?= $extension =  substr($doc->doc_id, -36);?>">View document</a>
                    </span>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                     <?php   
                        $document = $doc->doc_id; 
                        $extension =  substr($document, -4);
                     ?>
                    @if($extension == ".pdf")
                        <embed src="{{$url}}/storage/{{$document}}" width="100%" height="375" type="application/pdf">
                    @else
                        @if(empty($document))
                            <img width="100%" src="/img/empty.png"  alt="">
                        @else
                            <img width="100%" src="{{$url}}/storage/{{$document}}/<?= $extension =  substr($document, -36);?>"  alt="">

                            
                        
                        @endif
                    @endif
                    
                    </div>
                  </div>
                </div>
            
              </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- .modal Front ID -->

 
@endsection