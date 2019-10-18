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
                    <a href="/notifications">Notifications</a>
                </li>
                <li class="active">
                Create
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

                        <form method="POST" action="{{ url('/notifications') }}" accept-charset="UTF-8" enctype="multipart/form-data" style="display:inline">
                            {{ csrf_field() }}
                            <div class="box-body">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="text" class="control-label">{{ 'Text' }}</label>
                                <textarea  class="form-control" rows="10" name="text"></textarea>
                                <input type="text" name="status" value="0" hidden>
                            </div>
                            

                        </div>
                        <div class="box-footer pull-right">
                                <a href="/notifications"  class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
              

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
