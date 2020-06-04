
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar" style="font-family:cambria">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="font-family:cambria">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="<?php  img_url('img_avatar.png')?>" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
          <p>Ferdinand Yetna</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li >
          <a href="<?php echo site_url('admin/welcome') ?>">
            <i class="fa fa-home"></i> <span>Accueil</span>
            </a>
        </li>
        <li class="">
        <a href="<?php echo base_url('admin/Client/liste')?>">
        <i class="fa fa-users"></i>
        <span>Les Clients</span>
      </a>
        </li>
        <li class="">
        <a href="<?php echo base_url('admin/Tarifs')?>">
        <i class="fa fa-tags" aria-hidden="true"></i>
        <span>Les Tarifs</span>
      </a>
        </li>
        <li class="">
        <a href="<?php echo base_url('admin/Parametre/Localite')?>">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <span>Localite</span>
      </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/Settings') ?>">
            <i class="fa fa-th"></i> <span>Les Parametres</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-university"></i>
            <span>Les Secretariats</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/Secretariat/secretariat_suspendu')?>"><i class="fa fa-times"></i> Les Secretariats suspendus</a></li>
            <li><a href="<?php echo base_url('admin/Secretariat/liste')?>"><i class="fa fa-paper-plane"></i> Listes Des Secretariats</a></li>
            <li><a href="<?php echo base_url('admin/Secretariat/affilier')?>"><i class="fa fa-paper-plane"></i>Nos Partenaires</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-folder-open"></i>
        <span>Appel d'offre</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/Appeloffre') ?>"><i class="fa fa-th-list"></i>Les Appels d'offres en cours</a></li>
        <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Les Appels d'offres traites</a></li>
      </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-folder-open"></i>
        <span>Offres</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/Offre') ?>"><i class="fa fa-th-list"></i>Les offres en cours</a></li>
        <li><a href="<?php echo base_url('admin/Offre/terminer') ?>"><i class="fa fa-thumbs-o-up"></i> Les offres terminées</a></li>
      </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-money" aria-hidden="true"></i> <span>Les Transactions</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/Transaction') ?>"><i class="fa fa-th-list"></i> Les transactions en cours</a></li>
        <li><a href="<?php echo base_url('admin/Transaction/endtransaction') ?>"><i class="fa fa-thumbs-o-up"></i> Les transactions traitées</a></li>
      </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-suitcase"></i> <span>Les Contentieux</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/Contentieux') ?>"><i class="fa fa-th-list"></i> Les Contentieux en cours  </a></li>
        <li><a href="<?php echo base_url('admin/Contentieux/Contentieuxend') ?>"><i class="fa fa-thumbs-o-up"></i> Les Contentieux terminés </a></li>
      </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-suitcase"></i> <span>Les services</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/Service') ?>"><i class="fa fa-th-list"></i> La liste des services  </a></li>
        <li><a href="<?php echo base_url('admin/Service/image') ?>"><i class="fa fa-thumbs-o-up"></i> Les Images </a></li>
      </ul>
        </li>
      </ul>
    </section>
    <br>
    <br>
    <br>
    <br>
    <!-- /.sidebar -->
  </aside>
