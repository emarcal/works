@extends('layouts.app')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Create
               
    
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

                        <form method="GET" action="{{ url('/tokens/ico/create') }}" accept-charset="UTF-8" style="display:inline">
                            {{ csrf_field() }}
                            <div class="box-body">
                            <div class="form-group">
                                <label for="price" class="control-label">{{ 'Price' }}</label>
                                <input class="form-control" name="price" type="text" id="price" value=""  required>
                               
                            </div>
                            <div class="form-group">
                                <label for="amount" class="control-label">{{ 'Amount' }}</label>
                                <input class="form-control" name="amount" type="text" id="amount" value="" required>
                               
                            </div>
                            <input type="text" name="token" value="{{$id}}" hidden>

                        </div>
                        <div class="box-footer pull-right">
                                <a href="/tokens/{{$id}}/ico"  class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
              

                    </div>
                </div>
            </div>
        </div>
    </div>
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
