@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Logs
            <small>All</small>
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
                        <h3 class="box-title">All History
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body"  style="overflow-x:scroll">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="2%" style="text-align:center">ID</th>
                                    <th width="70%">Description</th>
                                    <th width="5%">Old</th>
                                    <th width="5%">Current</th>
                                    <th width="10%" style="text-align:center">Date</th>
                              
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doclogs as $doclogs)
                                <tr>
                                    <td style="text-align:center">
                                     <?= $doclogs->id ?>
                                    </td>
           
                                    </td>

                                    <td >
                                         <?= $doclogs->description ?>
                                    </td>
                                    <td>
                                        <?php $doc = $doclogs->old ?>
                                        @if(!empty($doc))
                                        <a href="{{$url}}/storage/<?= $doclogs->old ?>" target="_blank">Open</a>
                                        @endif
                                    </td>
                                    <td>
                                        <?php $doc = $doclogs->doc ?>
                                        @if(!empty($doc))
                                        <a href="{{$url}}/storage/<?= $doclogs->doc ?>" target="_blank">Open</a>
                                        @endif
                                    </td>

                                    <td style="text-align:center">  <?php $date = $doclogs->created_at; echo date("d/m/Y",strtotime($date)); ?>
                                    </td>

                                 

                                    <div class="modal fade" id="detail_<?= $doclogs->id ?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title">Details</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p> <?php 
                                              $text = $doclogs->description;
                                             echo nl2br($text);
                                            ?></p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                       
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->

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
@endsection