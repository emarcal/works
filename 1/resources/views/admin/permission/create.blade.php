@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

        @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card card-default">
                    <div class="card-header">Create New permission</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/permission') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['id'=>'fnpermission','url' => '/api/permission/new', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.permission.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
