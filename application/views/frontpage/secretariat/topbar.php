<header class="main-header">

    <!-- Logo -->
    <a href="<?php  echo base_url()?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>RM</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">REMOTE-PRINT</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?php  echo base_url()?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="<?php  echo base_url('secretariat/notifications')?>" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning notif" ></span>
                    </a>

                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       Connecté en tant que
                        <span class="hidden-xs"><?php  echo session_data('login')?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            Connecté en tant que

                            <p>
                                <?php  echo session_data('login')?>

                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">

                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Mon profil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('account/logout')?>" class="btn btn-default btn-flat">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>

    </nav>
</header>
<script>
    $(function(){

        recupNotif();
        function recupNotif(){
            $.post("<?php echo site_url('secretariat/notifications/countNotif'); ?>",function(data){
                $(".notif").text(data);
            });
        }
        setInterval(recupNotif,10000);
    });
</script>