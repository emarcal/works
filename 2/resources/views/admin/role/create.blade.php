@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Create New role</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/role') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['id'=>'fnrole','url' => '/admin/role/', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.role.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
