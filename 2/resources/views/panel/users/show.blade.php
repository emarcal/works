@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$user->name}}
            {{$user->lastname}}

            <a href="/user/edit/{{$user->id}}" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i>
                Edit</a>
       
            <a href="/user/verify/{{$user->id}}" class="btn btn-primary btn-xs">
                <i class="fa fa-search"></i>
                Verify</a>
                <?php
                  $current = $user->id;
                  $next = $current + 1;
                  $previous = $current - 1;
                ?>
                <a href="/user/show/{{$previous}}" class="btn btn-primary btn-xs">
                    <i class="fa fa-fast-backward"></i> Previous</a>
                <a href="/user/show/{{$next}}" class="btn btn-primary btn-xs">
                    <i class="fa fa-fast-forward"></i> Next
                </a>

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
   
    <section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1_1" data-toggle="tab"><i class="fa fa-info"></i> Informations</a></li>
      
         
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1_1">
              <div class="box-body">                                   
                <div style="width:50%;float:left">
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
                
                <div style="width:50%;float:left">
                    <blockquote>
                        <p style="font-size:10pt">
                            Email
                        </p>
                        <p>
                        {{ isset($user->email) ? $user->email : 'empty'}}
                        </p>
                    </blockquote>
                </div>
             
                <div style="width:50%;float:left">
                    <blockquote>
                        <p style="font-size:10pt">
                            CPF
                        </p>
                        <p>
                            {{ isset($user->cpf) ? $user->cpf : 'empty'}}
                        </p>
                    </blockquote>
                </div>
               
                <div style="width:50%;float:left">
                    <blockquote>
                        <p style="font-size:10pt">
                        Status
                        </p>
                        <p>
                        <?php $status = $user->status ?>
                        @if($status == 1)
                            <span class="badge" style="background-color:#00a65a">Active</span>
                        @else
                            <span class="badge" style="background-color:#dd4b39">Blocked</span>
                        @endif
                        </p>
                    </blockquote>
                </div>
                <div style="width:50%;float:left">
                    <blockquote>
                        <p style="font-size:10pt">
                        Account
                        </p>
                        <p>
                        <?php $verified = $user->verified ?>
                        @if($verified == 1)
                            <span class="badge" style="background-color:#00a65a">Verified</span>
                        @else
                            <span class="badge" style="background-color:#dd4b39">Unverified</span>
                        @endif
                        </p>
                    </blockquote>
                </div>
             
                
                <div style="width:50%;float:left">
                    <blockquote>
                        <p style="font-size:10pt">
                            Birth
                        </p>
                        <p>
                            {{$user->birth}}
                        </p>
                    </blockquote>
                </div>
                
                <div style="width:50%;float:left">
                    <blockquote>
                        <p style="font-size:10pt">
                        Created at
                        </p>
                        <p>
                            {{$user->created_at}}
                        </p>
                    </blockquote>
                </div>
                <div style="width:50%;float:left">
                    <blockquote>
                        <p style="font-size:10pt">
                        Updated at
                        </p>
                        <p>
                        {{$user->updated_at}}
                        </p>
                    </blockquote>

                </div>
              
              

                </div>
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        </div>
    <!-- Main content -->
       

      
    </section>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function(){
        $('#walletstable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
        });
        $('#activitiestable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
        });
        $('#uploadstable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
        });
        $('#loginlogstable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
        });
        $('#moderatorlogstable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
        });
    });
</script>

@endsection