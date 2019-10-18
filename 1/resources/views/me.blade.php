<!DOCTYPE html>
<html lang="en">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='shortcut icon' type='image/x-icon' href='/img/favicon.ico' />
        <link href="{{ asset('/vendors/bower_components/animate.css/animate.min.css') }}"  rel="stylesheet">
        <link rel="stylesheet" href="/css/me-auxiliar.css">
        <link href="{{ asset('/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}"  rel="stylesheet">
        <link  href="{{ asset('/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
        <link href="{{ asset('/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css') }}"  rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
<title>Blockchain City</title>
        <script src="/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/js/float_number.js"></script>


        <link href="/css/app-1.min.css?_<?= time()?>" rel="stylesheet">
        <script src="{{ asset('/js/page-loader.min.js') }}"></script>
      
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
        </section>
        @include('layouts.admin.footer')

        <!-- Javascript Libraries -->

        <!-- jQuery -->

       

        <!-- Bootstrap -->
        <script
            src="{{ asset('/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- Malihu ScrollBar -->
        <script
            src="{{ asset('/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

        <!-- Bootstrap Notify -->

        <!-- Moment -->
        <script
            src="{{ asset('/vendors/bower_components/moment/min/moment.min.js') }}"></script>

        <!-- FullCalendar -->
        <script
            src="{{ asset('/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>

        <!-- Simple Weather -->
        <script
            src="{{ asset('/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>

        <!-- Salvattore -->
        <script
            src="{{ asset('/vendors/bower_components/salvattore/dist/salvattore.min.js') }}"></script>

        <!-- Flot Charts -->
        <script src="{{ asset('/vendors/bower_components/flot/jquery.flot.js') }}"></script>
        <script
            src="{{ asset('/vendors/bower_components/flot/jquery.flot.resize.js') }}"></script>
        <script
            src="{{ asset('/vendors/bower_components/flot.curvedlines/curvedLines.js') }}"></script>

        <!-- Sparkline Charts -->
        <script
            src="{{ asset('/vendors/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <script
            src="{{ asset('/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>


        <!-- Site Functions & Actions -->
        <script src="{{ asset('/js/app.min.js') }}"></script>

        <!-- jQuery -->
        <script
            data-cfasync="false"
            src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

        <script
            src="{{ asset('/vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid.min.js') }}"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]> <script
        src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <!-- Demo Only -->
 <?php 
   
     $timelg = session('last_login_at'); 
     $ip = session('last_login_ip'); 
     $iduser = Auth::user()->id; 
  ?>
        <script src="{{ asset('/demo/js/data-table.js') }}"></script>
        @if (Session::has('last_login_at'))

        <script>
                            'use strict';
                                var animationDuration;
                                $(window).load(function(){
                                    //Welcome Message (not for login page)
                                    function notify(message, type){
                                        $.notify({
                                            message: message
                                        },{
                                            type: type,
                                            allow_dismiss: false,
                                            label: 'Cancel',
                                            className: 'btn-xs btn-default',
                                            placement: {
                                                from: 'bottom',
                                                align: 'left'
                                            },
                                            delay: 2500,
                                            animate: {
                                                    enter: 'animated fadeInUp',
                                                    exit: 'animated fadeOutDown'
                                            },
                                            offset: {
                                                x: 30,
                                                y: 30
                                            }
                                        });
                                    }
                                    if (!$('.login, .four-zero')[0]) {
                                        notify('Welcome! Your last login was on: <i class="zmdi zmdi-time"></i><?=  date('H:i',$timelg); ?>&nbsp;&nbsp; <i class="zmdi zmdi-calendar-alt"></i> <?=  date('d/m/Y',$timelg); ?> &nbsp;|&nbsp; <i class="zmdi zmdi-laptop"></i>  <?= $ip; ?>', '-light');
                                    }
                                });
                                $(document).ready(function() {
                                    function notify(from, align, icon, type, animIn, animOut){
                                        $.notify({
                                            icon: icon,
                                            title: ' Bootstrap Notify',
                                            message: 'Turning standard Bootstrap alerts into awesome notifications',
                                            url: ''
                                        },{
                                            element: 'body',
                                            type: type,
                                            allow_dismiss: true,
                                            placement: {
                                                from: from,
                                                align: align
                                            },
                                            offset: {
                                                x: 30,
                                                y: 30
                                            },
                                            spacing: 10,
                                            z_index: 1031,
                                            delay: 2500,
                                            timer: 1000,
                                            url_target: '_blank',
                                            mouse_over: false,
                                            animate: {
                                                enter: animIn,
                                                exit: animOut
                                            },
                                        });
                                    }
                                    $('.notifications > div > .btn').click(function(e){
                                        e.preventDefault();
                                        var nFrom = $(this).attr('data-from');
                                        var nAlign = $(this).attr('data-align');
                                        var nIcons = $(this).attr('data-icon');
                                        var nType = $(this).attr('data-type');
                                        var nAnimIn = $(this).attr('data-animation-in');
                                        var nAnimOut = $(this).attr('data-animation-out');
                                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
                                    });
                                });


        </script>
        @endif
        <?php 
            Session::forget('last_login_at');
            Session::forget('last_login_ip');
        ?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->
        <script src="/vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

                       
        <!-- Site Functions & Actions -->
    
    </body>
</html>