<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>REMOTE-</b>PRINT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" id="notif_container">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notif_anchor">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success" id="notif_count">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Vous avez 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" id="notif_ul">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php  img_url('img_avatar.png')?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">Voir tous les Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning notif">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="footer"><a href="#">Voir tous les notifications</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php  img_url('img_avatar.png')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php  echo session_data('login')?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php  img_url('img_avatar.png')?>" class="img-circle" alt="User Image">

                <p>
                <?php  echo session_data('login')?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('account/logout')?>" class="btn btn-default btn-flat">Deconnexion</a>
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
            $.post("<?php echo site_url('admin/Notifications/countNotif'); ?>",function(data){
                $(".notif").text(data);
            });
        }
        setInterval(recupNotif,10000);
    });
</script>
  <script>
  /*var notif = $('#notif_container');
  var notif_count = notif.find('#notif_count');
  var notif_ul = notif.find('#notif_ul');

  var last_notif_id = 0;
  // memastikan mengirim AJAX hanya jika ada notif baru ketika menekan dropdown button notifikasi
  var is_new_notif = false;
    window.setInterval(function () {
                /*notificationStream(
                    1 // id user yang sedang login
                );*/
          /*     $.ajax({
                  url: "Secretariat/notification",
                  dataType: 'json',
                  data: {'sender_id': 1}
                  }).done(function (data) {
                    if (0 == notif_ul.children().length) {
                      if (0 != data.length) {
                        is_new_notif = true;
                      last_notif_id = data[0].id;
                        append_li(data);
                      }
                    } else {
                      // ada notifikasi baru
                      if (0 != data.length && last_notif_id < data[0].id) {
                        is_new_notif = true;
                        last_notif_id = data[0].id;
                        append_li(data);
                      }
                    }
                });

    }, 1000);

    function append_li(data) {
      if (1 < data.length)
        notif_ul.empty();

      var new_nodes = '';
      $.each(data, function(index, obj) {
        new_nodes += '' +
        '<li data-notif-id="' + obj.id + '">' +
          '<a>' +
            obj.message +
          '</a>' +
        '</li>';
      });

      notif_ul.prepend(new_nodes);
      notif_count.text(data.length);

      // notif dropdown hanya memuat maks 8
      if (8 < notif_ul.children().length) {
        // hitung selisih
        var deleted_elements = notif_ul.children().length - 8;
        // hapus selisih
        for (var i = 0; i < deleted_elements; i++) {
          notif_ul.children().last().remove();
        }
      }
    }
  // perbarui last_notif di tabel user ketika menekan notifikasi
  $('#notif_anchor').click(function(event) {
    // ubah jumlah notifikasi menjadi 0
    notif_count.text(0);
    if (is_new_notif) {
      $.ajax({
        url: "<?= site_url('print/Secretariat/update_last_notif') ?>",
        dataType: 'json',
        data: {'notif_id': notif_ul.children()[0].dataset['notifId']}
        });
      is_new_notif = false;
    }

  });*/
</script>
