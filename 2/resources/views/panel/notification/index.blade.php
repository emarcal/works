@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Notifications  <a href="{{ url('/notifications/create') }}" class="btn btn-primary btn-xs" title="Add New Notification">
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
                        <table id="notificationstable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="2%" style="text-align:center">ID</th>
                                    <th width="40%">Text</th>
                                    <th width="16%" style="text-align:center">Status</th>
                                    <th width="16%" style="text-align:center">Date</th>
                                    <th width="25%" style="text-align:center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notification as $item)
                                <tr>
                                    <td style="text-align:center">
                                        {{$item->id}}
                                    </td>
                           
                                    
                                    <td style="text-align:left;font-size:9pt">
                                    <?php
                                            $str = $item->text;
                                            if (strlen($str) > 350)
                                            $str = substr($str, 0, 350) . '...';
                                          
                                             echo  nl2br($str);
                                       ?>
                                    </td>


                                 
                                    <td style="text-align:center">
                                        <?php
                                            $stat = $item->status;
                                                if ($stat == 1){
                                                    echo '<span class="badge" style="background-color:#00a65a">published</span>';
                                                }else{
                                                    echo '<span class="badge" style="background-color:#dd4b39">not published </span>';
                                                }
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                      {{ $item->date }}
                                       
                                    </td>
                                    <td style="text-align:center">
                                          <div>
                                            <a href="{{ url('/notifications/' . $item->id . '/edit') }}" title="Edit Notification"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                @if($item->status == "0")
                                                <a href="{{ url('/notifications/publish/'.$item->id) }}" class="btn btn-primary btn-xs" style="width:80px" title="Publish">
                                                        <i class="fa fa-share" aria-hidden="true"></i> Publish
                                                </a>
                                                @else
                                                <a href="{{ url('/notifications/hide/'.$item->id) }}" class="btn btn-danger btn-xs" style="width:80px" title="Hide">
                                                        <i class="fa fa-close" aria-hidden="true"></i> Hide
                                                </a>
                                                @endif
                                            <form method="POST" action="{{ url('/notifications' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete Notification" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form> 
                                          </div>
                                          
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
        $('#notificationstable').DataTable({
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