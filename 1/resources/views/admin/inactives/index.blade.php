@extends('layouts.app')

@section('content')
<?php @$sk = $_GET['search'];?>
    <div class="container">
        <div class="row">


        @include('admin.sidebar')
            <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Users Inactives</div>
                            <div class="card-body">
                        <form method="GET" action="{{ url('/admin/inactives') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <?php if(empty($sk)){ ?>
                            <table id="tlistinactives" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th style="width:30%">Name</th><th style="width:30%">Email</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                </tbody>
                            </table>
                        <?php }else{ ?>
                            <table id="tsearchinactives" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th style="width:30%">Name</th><th style="width:30%">Email</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                </tbody>
                            </table>
                        <?php } ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection