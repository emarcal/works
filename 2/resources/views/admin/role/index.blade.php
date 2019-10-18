@extends('app')

@section('content')
<?php @$sk = $_GET['search'];?>
    <div class="container">
        <div class="row">


       
            <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Roles</div>
                            <div class="card-body">
                        <a href="{{ url('/admin/role/create') }}" class="btn btn-success btn-sm" title="Add New role">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/role') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." id="inputsearch" value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        
                        
                        <div class="table-responsive">
           
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th style="width:30%">Name</th><th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($role as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <a href="/admin/role/{{$item->id}}/edit" class=" btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
       

                            <div class="pagination-wrapper"> {!! $role->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection