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
