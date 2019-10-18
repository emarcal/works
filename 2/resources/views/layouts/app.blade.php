<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Blockchain City</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link
            rel="stylesheet"
            href="/js/bower_components/bootstrap/dist/css/bootstrap.min.css?_ddd">
        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="/js/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link
            rel="stylesheet"
            href="/js/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/js/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

        <link rel="stylesheet" href="/js/dist/css/AdminLTE.min.css?_kjsdddj">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of
        downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/js/dist/css/skins/_all-skins.min.css?_kjsdddjss">
        <!-- Morris chart -->
        <link rel="stylesheet" href="/js/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link
            rel="stylesheet"
            href="/js/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link
            rel="stylesheet"
            href="/js/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link
            rel="stylesheet"
            href="/js/bower_components/bootstrap-daterangepicker/daterangepicker.css">
            <link rel="shortcut icon" href="/img/favicon.ico">
        <!-- bootstrap wysihtml5 - text editor -->
        <link
            rel="stylesheet"
            href="/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Countries -->
        <link rel="stylesheet" href="/css/select2.min.css?_<?= time(); ?>">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script
        src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script
        src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->

        <!-- Google Font -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
                    <!-- jQuery 3 -->
        <script src="/js/bower_components/jquery/dist/jquery.min.js?_<?= time(); ?>"></script>
        <!-- DataTables -->
        <script src="/js/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/js/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="/js/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js" type="text/javascript"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
     
             <style>.box-body{ overflow-x: hidden !important } </style>

            <header class="main-header">
                <!-- Logo -->
                <a href="/dashboard" class="logo"  style="background-color:#242C34 !important">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">
                    <img  src="/img/favicon.ico" style="width:50%" alt=""></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                    <img style="width:80%" src="/img/logo.png" id="logo" alt=""></span>
                </a>
              
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                            
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/img/avatar.png?_" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{Auth::user()->name}} {{Auth::user()->lastname}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="/img/avatar.png?_" class="img-circle" alt="User Image">
                                            <p>
                                                {{Auth::user()->name}} {{Auth::user()->lastname}}
                                                <small>{{Auth::user()->email}}</small>
                                            </p>
                                    </li>
                                    <!-- Menu Body -->
                                   
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                       
                                        <div class="text-center">
                                            <a   href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="btn btn-default btn-flat">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                @include('layouts.sidebar')
                <!-- /.sidebar -->
            </aside>

            @yield('content')

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b>
                    1.2.5
                </div>
                <strong>Copyright &copy; 2019
                    <a target="_blank" href="/">Blockchain City</a>.</strong>
                All rights reserved.
            </footer>

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed immediately after the
            control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->


        <!-- jQuery UI 1.11.4 -->
        <script src="/js/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
      
        <!-- Morris.js charts -->
        <script src="/js/bower_components/raphael/raphael.min.js"></script>
        <script src="/js/bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script
            src="/js/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/js/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="/js/bower_components/moment/min/moment.min.js"></script>
        <script src="/js/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script
            src="/js/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <!-- Bootstrap WYSIHTML5 -->
        <script src="/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/js/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/js/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/js/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
       
        <!-- AdminLTE for demo purposes -->
        

    </body>
</html>