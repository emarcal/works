@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tokens  <a href="{{ url('/tokens/create') }}" class="btn btn-primary btn-xs" title="Add New Token">
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
                                    <th width="2%" style="text-align:center">ID</th>
                                    <th width="4%" style="text-align:left">Logo</th>
                                    <th width="40%" style="text-align:left">Name</th>
                                    <th width="2%" style="text-align:center">Symbol</th>
                                    <th width="12%" style="text-align:center">Decimals</th>
                                    <th width="12%" style="text-align:center">Rate</th>
                              
                                    <th width="5%" style="text-align:center">Status</th>
                                    <th width="25%" style="text-align:center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($token as $item)
                                <tr>
                                    <td style="text-align:center">
                                        {{$item->id}}
                                    </td>
                                    <td style="padding:0px;text-align:center">
                                       <img style="width:35px;margin:4px 0px 5px 0px" src=" <?= $url.'/storage/'.$item->img ?> " alt=""> 
                                    </td>
                                    
                                    <td style="text-align:left">
                                        {{$item->name}}
                                    </td>

                                    <td style="text-align:center">   
                                        {{$item->symbol}}
                                    </td>
                                        
                                   
                                    <td style="text-align:center">
                                        {{$item->decimals}}
                                    </td>

                                    <td style="text-align:center">
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
                                          
                                            <a href="{{ url('/tokens/' . $item->id . '') }}" title="Show Token"><button class="btn btn-info btn-xs"><i class="fa fa-info" aria-hidden="true"></i> Show</button></a>
                                            <a href="{{ url('/tokens/' . $item->id . '/edit') }}" title="Edit Token"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <a href="{{ url('/tokens/' . $item->id . '/ico') }}" title="Token ICO"><button class="btn btn-primary btn-xs"><i class="fa fa-folder-open" aria-hidden="true"></i> Token ICO</button></a>

                                            <!-- <form method="POST" action="{{ url('/tokens' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Token" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
                                    </td>

                                  @endforeach
                                </tr>

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