@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

        @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card card-default">
                    <div class="card-header">permission {{ $permission->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/permission') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/permission/' . $permission->id . '/edit') }}" title="Edit permission"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/permission', $permission->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete permission',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                    
                        <div class="table-responsive">
                            <table uid="<?=$permission->id?>" id="tshowpermissions" class="table table-borderless">
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection