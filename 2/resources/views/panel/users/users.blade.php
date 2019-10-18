@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <!-- <span id="label">
                <small> Status: <select name="" oninput="change()" id="change">
                        <option value="all">All</option>
                        <option value="active">Active</option>
                        <option value="blocked">Blocked</option>
                    </select>
                </small>
            </span>
            <span id="label_status">
                <small> Account: <select name="" oninput="change_status()" id="change_status">
                        <option value="all">All</option>
                        <option value="verified">Verified</option>
                        <option value="unverified">Unverified</option>
                    </select>
                </small>
            </span> -->

        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i>
                    Dashboard</a>
            </li>
            <li>
                <a href="/users">Users</a>
            </li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All registered users
                        </h3>
                    </div>



                    <!-- /.box-header -->
                    <div class="box-body" style="overflow-x:scroll">
                        <div>
                            <form class="form-inline" action="/users">
                                <div class="form-group">

                                    <input type="search" class="form-control" name="search" id="search"
                                        placeholder="Search">

                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div id="fsortaccount" style="margin-top:10px;display:none;">
                                    <form class="form-inline" action="/users">
                                        <div class="form-group">

                                            <label>Account:</label>
                                            <select id="saccounts" class="form-control">
                                                <option value="all" selected>All</option>
                                                <option value="1">Verified</option>
                                                <option value="0">Unverified</option>
                                            </select>
                                        </div>

                                    </form>
                       
                            </div>
                            
                        </div>



                        <script>
                            @if($account != "all")
                            $('#saccounts option[value="{{ $account }}"]').prop('selected', true);
                            @endif

                            $("#saccounts").change(function () {
                                var sort = $(this).val();

                                var url = "/users?account=" + sort;

                                if (sort == "all") {
                                    url = "/users";
                                }
                                window.location = url;
                            })
                            $("#fsortaccount").show();

                            @if($status != "all")
                            $('#sdocuments option[value="{{ $status }}"]').prop('selected', true);
                            @endif

                            $("#sdocuments").change(function () {
                                var sort = $(this).val();

                                var url = "/users?status=" + sort;

                                if (sort == "all") {
                                    url = "/users";
                                }
                                window.location = url;
                            })
                            $("#fsortdocuments").show();

                        </script>
                    </div>
                    <br>
                    <table id="userstable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="4%" style="text-align:center">ID</th>
                                <th width="20%">Name</th>
                                <th width="10%">E-mail</th>

                                <th width="15%" style="text-align:center">CPF</th>
                                <th width="2%" style="text-align:center">Status</th>
                                <th width="15%" style="text-align:center">Last Update</th>

                                <th width="2%" style="text-align:center">Account</th>
                                <th width="30%" style="text-align:center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="all">
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}
                                </td>

                                <td>
                                    {{$user->name}}
                                    {{$user->lastname}}
                                </td>



                                <td>
                                    <?php
                                            $str = $user->email;
                                                if (strlen($str) > 14)
                                                $str = substr($str, 0, 14) . '...';
                                                echo $str;
                                        ?>
                                </td>

                                <td>
                                    {{$user->cpf}}
                               
                                </td>


                                <td style="text-align:center">
                                    <?php $status = $user->status;?>
                                    @if($status != "0")
                                    <span class="badge" style="background-color:#00a65a">Active</span>
                                    @else
                                    <span class="badge" style="background-color:#dd4b39">Blocked</span>
                                    @endif
                                </td>
                                                     <td style="text-align:center">
                                    <?php 
                                        $id = $user->id;
                                        $doc = App\Doc::where('user',$id)->first();
                                        $date = 0;
                                        if(isset($doc->updated_at)) {
                                            $date = $doc->updated_at;
                                        }                                  
                                        echo $date;
                                      ?>
                                </td>
                                <td style="text-align:center">
                                    <?php $verified = $user->verified;?>
                                    @if($verified == "1")
                                    <span class="badge" style="background-color:#00a65a">Verified</span>
                                    @else
                                    <span class="badge" style="background-color:#dd4b39">Unverified</span>
                                    @endif
                                </td>
                                <td style="text-align:center">
                          
                                    <a href="/user/show/{{$user->id}}" class="btn btn-info btn-xs"><i
                                            class="fa fa-info"></i> Show</a>
                          
                                    <a href="/user/edit/{{$user->id}}" class="btn btn-warning btn-xs"><i
                                            class="fa fa-edit"></i> Edit</a>
                      
                                    <a href="/user/verify/{{$user->id}}" class="btn btn-primary btn-xs"><i
                                            class="fa fa-search"></i> Verify</a>
                              
                                    <a target="_blank" href="{{$url}}/1235123LEJhayfgdh2123uashdf234231/{{$user->id}}" class="btn btn-success btn-xs"><i
                                            class="fa fa-lock"></i> Login As</a>
                               
                                </td>
                                @endforeach
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
            @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator )
            <div style="text-align:center;">
                {{ $users->links() }}
            </div>
            @endif
            <!-- /.box-body -->
   
<!-- /.row -->
</section>
<!-- /.content -->


</div>
<script>
    function change() {
        var current_input = document.getElementById('change').value;
        var current_input_status = document.getElementById('change_status').value;

        if (current_input == "all") {
            $("#all").show();
            $("#active").hide();
            $("#blocked").hide();
            window.location.href = "";
        }
        if (current_input == "active") {
            $("#all").hide();
            $("#active").show();
            $("#blocked").hide();
            document.getElementById('label_status').style.display = "none"
        }
        if (current_input == "blocked") {
            $("#all").hide();
            $("#active").hide();
            $("#blocked").show();
            document.getElementById('label_status').style.display = "none"
        }
    }

    function change_status() {
        var current_input = document.getElementById('change').value;
        var current_input_status = document.getElementById('change_status').value;

        if (current_input_status == "all") {
            $("#all").show();
            $("#verified").hide();
            $("#unverified").hide();
            window.location.href = "";
        }
        if (current_input_status == "verified") {
            $("#all").hide();
            $("#verified").show();
            $("#unverified").hide();
            document.getElementById('label').style.display = "none"
        }
        if (current_input_status == "unverified") {
            $("#all").hide();
            $("#verified").hide();
            $("#unverified").show();
            document.getElementById('label').style.display = "none"
        }
    }

    $(function () {
        $('#userstable').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });
    })

</script>
@endsection
