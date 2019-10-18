@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Token ICO <b>{{$token->name}}</b> <a href="{{ url('/tokens/'.$token->id.'/ico/create') }}" class="btn btn-primary btn-xs" title="Add New Token">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i>
                    Dashboard</a>
            </li>
            <li>
                <a href="/logs">Logs</a>
            </li>
            <li class="active">All</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                      
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body"  style="overflow-x:scroll">
                        <table id="tokenstable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align:center">User ID</th>
                                    <th width="4%" style="text-align:left">Order ID</th>
                                    <th width="10%" style="text-align:right">Price</th>
                                    <th width="10%" style="text-align:right">Amount</th>
                                    <th width="7%" style="text-align:right">Rate</th>
                                    <th width="12%" style="text-align:center">Status</th>
                                    <th width="25%" style="text-align:center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tokens as $item)
                                <tr>
                                    <td style="text-align:center">
                                    {{$item->userid}}
                                    </td>
                                    <td style="padding:0px;text-align:center">
                                    {{$item->orderid}}
                                    </td>
                                    <td style="text-align:right">
                                    {{$item->price}}
                                    </td>
                                    <td style="text-align:right">
                                    {{$item->amount}}
                                    </td>
                                    <td style="text-align:right">   
                                    {{$item->rate}}  
                                    </td>
                                    <td style="text-align:center">
                                    <?php
                                            $stat = $item->status;
                                                if ($stat == 1){
                                                    echo '<span class="badge" style="background-color:#00a65a">Active</span>';
                                                }else{
                                                    echo '<span class="badge" style="background-color:#dd4b39">Inactive</span>';
                                                }
                                        ?>
                                       
                                    </td>

                                    <td style="text-align:center">
                                    @if($item->status == "0")
                                    <a href="{{ url('/tokens/activate/'.$item->id.'/'.$item->tokenid) }}" class="btn btn-primary btn-xs" style="width:76px" title="Activate">
                                            <i class="fa fa-check" aria-hidden="true"></i> Activate
                                    </a>
                                    @else
                                    <a href="{{ url('/tokens/deactivate/'.$item->id.'/'.$item->tokenid) }}" class="btn btn-danger btn-xs" title="Deactivate">
                                            <i class="fa fa-close" aria-hidden="true"></i> Deactivate
                                    </a>
                                    @endif
                                    <a href="{{ url('/tokens/'.$item->id.'/ico/edit?page=one') }}" title="Edit Token"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                   
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function(){
        $('#tokenstable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
        });
    })
</script>
@endsection