
<aside class="main-sidebar " style="">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php  echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Sécrétariat: <b><?php echo session_data('secName'); ?></b></p>
                <p>Pseudo: <?php  echo session_data('login')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Rechercher... ">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu principal</li>

            <li>
                <a href="<?php  echo base_url('secretariat/home')?>">
                    <i class="fa fa-home "></i> <span>Accueil</span>

                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Appels d'offre</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                    <a href="<?php  echo base_url('secretariat/appelOffre/appelOffre')?>">
                        <i class="fa fa-th"></i> <span>Les appels d'offre</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-eye"></i>
                    <span>Commandes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php  echo base_url('secretariat/commande/liste')?>">
                            <i class="fa fa-th"></i> <span>Les Commandes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Paramètres</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                    <a href="<?php  echo base_url('secretariat/configuration/configuration')?>">
                        <i class="fa fa-gear"></i> <span>Configuration des prix</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Utilisateurs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php  echo base_url('secretariat/users/userList')?>">
                            <i class="fa fa-users"></i> <span>Liste des utilisateurs</span>
                        </a>
                    </li>
                </ul>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>