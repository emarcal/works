@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$user->name}}
            {{$user->lastname}}
            <a href="/user/show/{{$user->id}}" class="btn btn-info btn-xs">
                <i class="fa fa-info"></i>
                Show</a>
            <a href="/user/verify/{{$user->id}}" class="btn btn-primary btn-xs">
                <i class="fa fa-search"></i>
                Verify</a>
                <?php
                  $current = $user->id;
                  $next = $current + 1;
                  $previous = $current - 1;
                ?>
                <a href="/user/edit/{{$previous}}" class="btn btn-primary btn-xs">
                <i class="fa fa-fast-backward"></i>
                Previous</a>
                <a href="/user/edit/{{$next}}" class="btn btn-primary btn-xs">
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
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">

                     
                        <!-- form start -->
            <form method="POST" action="{{ action('UserController@userupdate')}}" accept-charset="UTF-8" style="display:inline">
     
                {{ csrf_field() }}
              <input type="text" name="id"  value="{{$user->id}}" hidden>
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control" placeholder="" value="{{$user->lastname}}">
                </div>
                <div class="form-group">
                  <label>CPF</label>
                  <input type="text" name="cpf" class="form-control" placeholder="" value="{{$user->cpf}}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" placeholder="" value="{{$user->email}}">
                </div>
                <div class="form-group">
                  <label>Birth</label>
                  <input type="text" name="contact" class="form-control" placeholder="" value="{{$user->birth}}">
                </div>
               
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="">
                      <?php
                      $v = "";
                      $u = "selected";

                      if($user->status == "1"){
                        $v = "selected";
                        $u = "";
                      }
                    ?>
                      <option value="1" {{$v}}>Active</option>
                      <option value="0" {{$u}}>Blocked</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Verified</label>
                  <select class="form-control" name="verified" id="">
                      <?php
                      $v = "";
                      $u = "selected";

                      if($user->verified == "1"){
                        $v = "selected";
                        $u = "";
                      }
                    ?>
                      <option value="1" {{$v}}>Verified</option>
                      <option value="0" {{$u}}>Unverified</option>
                  </select>
                </div>
               
               
               
              </div>

              <!-- /.box-body -->

              <div class="box-footer pull-right">
              <a href="/users"  class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
                    </div>
                    <!-- /.box-body -->
                    
                </div>
                <!-- /.box -->
            </div>
            
            {{-- Box to change status --}}

            
            <div class="row">
           
                <div class="col-xs-5">
                <?php $g2fa = $user->g2fa_status ?>

         
                  
        
                  <div class="box col-12">
                    <div class="box-header"></div>
                    <div class="box-body">
                  <form method="POST" action="{{ action('UserController@changepassword')}}" accept-charset="UTF-8" style="display:inline">
                      {{ csrf_field() }}
                  
                    <input type="hidden" name="id"  value="{{$user->id}}">
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="text" name="password" class="form-control" placeholder="Password" value="" pattern=".{6,}"  onkeypress="check_pass()" required>
                      </div>
                      
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input id="confirm_password" type="text" name="confirm_password" class="form-control" placeholder="Confirm Password" value="" pattern=".{6,}"  onkeypress="check_pass()" required>
                      </div>
                    
                    <div class="box-footer pull-right">
                        <a href="/users"  class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                  </form>
                  <script>                      
                  var password = document.getElementById("password")
                  , confirm_password = document.getElementById("confirm_password");

                    function validatePassword(){
                      if(password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwords Don't Match");
                      } else {
                        confirm_password.setCustomValidity('');
                      }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                    
                  </script>
                  </div>

                    </div>
              </div>
              </div>
              
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
  var currentcountry = "<?= $user->country; ?>";
</script>
<script src="/js/countries.js?_<?= time(); ?>"></script>
@endsection