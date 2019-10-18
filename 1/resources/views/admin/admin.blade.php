<!DOCTYPE html> 
<html lang="en">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blockchain City Admin</title>

        <!-- Vendors -->

        <!-- Animate CSS -->
        <link
            href="admin/vendors/bower_components/animate.css/animate.min.css"
            rel="stylesheet">

        <!-- Material Design Icons -->
        <link
            href="admin/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css"
            rel="stylesheet">

        <!-- Malihu Scrollbar -->
        <link
            href="admin/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"
            rel="stylesheet">

        <!-- Full Calendar -->
        <link
            href="admin/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css"
            rel="stylesheet">

        <!-- Site CSS -->
        <link href="admin/css/app-1.min.css" rel="stylesheet">

        <!-- Page loader -->
        <script src="admin/js/page-loader.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    </head>

    <body >
        <!-- Page Loader -->
        <div id="page-loader">
            <div class="preloader preloader--xl preloader--light">
                <svg viewbox="25 25 50 50">
                    <circle cx="50" cy="50" r="20"/>
                </svg>
            </div>
        </div>

        <!-- Header -->
        @include('layouts.admin.header')
        <section id="main">
            @include('layouts.admin.menu')
            <section id="content">
                @yield('content')
            </section>
            @include('layouts.admin.footer')
        </section>

        <!-- Javascript Libraries -->

        <!-- jQuery -->
        <script src="admin/vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Malihu ScrollBar -->
        <script
            src="admin/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Bootstrap Notify -->
        <script
            src="admin/vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

        <!-- Moment -->
        <script src="admin/vendors/bower_components/moment/min/moment.min.js"></script>

        <!-- FullCalendar -->
        <script
            src="admin/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

        <!-- Simple Weather -->
        <script
            src="admin/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>

        <!-- Salvattore -->
        <script src="admin/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>

        <!-- Flot Charts -->
        <script src="admin/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="admin/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="admin/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>

        <!-- Sparkline Charts -->
        <script src="admin/vendors/jquery.sparkline/jquery.sparkline.min.js"></script>

        <script
            src="admin/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

        <script src="admin/js/flot-charts/curved-line.js"></script>
        <script src="admin/js/flot-charts/line.js"></script>
        <script src="admin/js/easy-pie-charts.js"></script>
        <script src="admin/js/misc.js"></script>
        <script src="admin/js/sparkline-charts.js"></script>
        <script src="admin/js/calendar.js"></script>

        <!-- Site Functions & Actions -->
        <script src="admin/js/app.min.js"></script>
    </body>
</html>