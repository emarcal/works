@extends('layouts.app')

@section('content')
<?php @$sk = $_GET['search'];?>
    <div class="container">
        <div class="row">


        @include('admin.sidebar')
            <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">History</div>
                            <div class="card-body">
                     

                        
                        
                        <div class="table-responsive">
                        <?php if(empty($sk)){ ?>
                            <table id="tlisthistorys" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th style="width:50%">Descryption</th><th>Actions</th><th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                </tbody>
                            </table>
                        <?php }else{ ?>
                            <table id="tsearchhistorys" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th style="width:30%">Name</th><th>Actions</th>
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