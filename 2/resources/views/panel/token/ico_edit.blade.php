@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          
           <a href="/tokens/{{$tokens->id}}" class="btn btn-info btn-xs">
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

                

                        <form method="POST" action="{{ action('TokenController@icoupdate')}}" accept-charset="UTF-8">
                       
                            {{ csrf_field() }}
                            <div class="box-body">
                            <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                            <label for="price" class="control-label">{{ 'Price' }}</label>
                            <input class="form-control" name="price" type="text" id="price" value="{{ isset($tokens->price) ? $tokens->price : ''}}" required>
                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                        </div>

                        
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                            <label for="amount" class="control-label">{{ 'Amount' }}</label>
                            <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($tokens->amount) ? $tokens->amount : ''}}" required>
                            {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                        </div>

                        
                        <input type="text" name="token" value="{{$tokens->tokenid}}" hidden> 
                        <input type="text" name="id" value="{{$tokens->id}}" hidden> 
                        <input type="text" name="page" value="<?= $_GET['page'];?>" hidden> 


                            </div>
                            <div class="box-footer pull-right">
                                <a href="{{ url('/tokens/' . $tokens->tokenid . '/ico') }}"  class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>


                        </div>
                    <!-- /.box-body -->
                  
                    <!-- /.box-body -->
                </div>
                </div>
               
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection