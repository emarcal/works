@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{$tokens->name}}
           <a href="/tokens/{{$token->id}}" class="btn btn-info btn-xs">
            <i class="fa fa-info"></i>
            Show</a>
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
                </li>
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

                     

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/tokens/' . $token->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="box-body">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="control-label">{{ 'Name' }}</label>
                            <input class="form-control" name="name" type="text" id="name" value="{{ isset($token->name) ? $token->name : ''}}" required>
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('symbol') ? 'has-error' : ''}}">
                            <label for="symbol" class="control-label">{{ 'Symbol' }}</label>
                            <input class="form-control" name="symbol" type="text" id="symbol" value="{{ isset($token->symbol) ? $token->symbol : ''}}" required>
                            {!! $errors->first('symbol', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('img') ? 'has-error' : ''}}">
                            <label for="img" class="control-label">{{ 'Img' }}</label>
                            <input class="form-control" name="img" type="file" id="img" value="{{ isset($token->img) ? $token->img : ''}}" >
                            {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('decimals') ? 'has-error' : ''}}">
                            <label for="decimals" class="control-label">{{ 'Decimals' }}</label>
                            <input class="form-control" name="decimals" type="number" maxlength="2" id="decimals" value="{{ isset($token->decimals) ? $token->decimals : ''}}" required disabled>
                            {!! $errors->first('decimals', '<p class="help-block">:message</p>') !!}
                        </div>

                        
                        
                        <div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
                            <label for="rate" class="control-label">{{ 'Rate' }}</label>
                            <input class="form-control" name="rate" type="text" id="rate" value="{{ isset($token->rate) ? $token->rate : ''}}" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" required>
                            {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
                        </div>

                        

                        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                            <label for="status" class="control-label">{{ 'Status' }}</label>
                            <select class="form-control" name="status" type="text" id="status" value="" required>
                                <?php 
                                    $status = $token->status; 
                                    if($status == 1){
                                        $showstatus = "Active";
                                    }else{
                                        $showstatus = "Inactive";
                                    }       
                                ?>
                                <option value="{{ isset($token->status) ? $token->status : ''}}">{{ $showstatus }}</option>
                                @if($status == 1)
                                    <option value="0">Inactive</option>
                                @endif
                                @if($status == 0)
                                    <option value="1">Active</option>
                                @endif
                                
                            </select>
                        
                            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                        </div>


                            </div>
                            <div class="box-footer pull-right">
                                <a href="/tokens"  class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>


                        </div>
                    <!-- /.box-body -->
                  
                    <!-- /.box-body -->
                </div>
                </div>
                <div class="col-xs-2">
                <div class="box">
                
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img style="width:100%" src=" <?= $url.'/storage/'.$token->img ?> " alt=""> 
                    </div>
                     
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

{{-- Script para restrição de characters no token/edit --}}
<script>
    $(document).ready(function(){

      $("#decimals").keypress(function(e){
        var keyCode = e.which;
        /*
        8 - (backspace)
        32 - (space)
        48-57 - (0-9)Numbers
        */
        if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
          return false;
        }
      });
      $("#decimals").prop('disabled', false);
    });

   // Script para limitar input de characters para somente numeros e pontos
function fun_AllowOnlyAmountAndDot(txt)
{
    if(event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46)
    {
       var txtbx=document.getElementById(txt);
       var amount = document.getElementById(txt).value;
       var present=0;
       var count=0;

       if(amount.indexOf(".",present)||amount.indexOf(".",present+1));
       {
      // alert('0');
       }

      /*if(amount.length==2)
      {
        if(event.keyCode != 46)
        return false;
      }*/
       do
       {
       present=amount.indexOf(".",present);
       if(present!=-1)
        {
         count++;
         present++;
         }
       }
       while(present!=-1);
       if(present==-1 && amount.length==0 && event.keyCode == 46)
       {
            event.keyCode=0;
            //alert("Wrong position of decimal point not  allowed !!");
            return false;
       }

       
       if(count==1)
       {
        var lastdigits=amount.substring(amount.indexOf(".")+1,amount.length);
       
       }
            return true;
    }
    else
    {
            event.keyCode=0;
            //alert("Only Numbers with dot allowed !!");
            return false;
    }

}

    var max_chars = 2;

    $('#decimals').keydown( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });

    $('#decimals').keyup( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
        
    });
    
</script>
@endsection