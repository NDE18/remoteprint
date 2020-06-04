<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Remote-print</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php  echo css_url('bootstrap/dist/css/bootstrap.min');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php  echo css_url('font-awesome.min');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php  echo css_url('ionicons.min')?>">
    <!-- jvectormap
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php  echo css_url('AdminLTE.min')?>">
    <link rel="stylesheet" href="<?php  echo css_url('select2.min');?>">
    <link rel="stylesheet" href="<?php  echo css_url("w3")?>">

    <link href="<?php echo css_url('sweetalert'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('spinnerQueue'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('datatables/dataTables.bootstrap4')?>" media="all" rel="stylesheet" type="text/css">
    <link href="<?php  echo css_url('all')?>" media="all" rel="stylesheet" type="text/css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php  echo css_url('_all-skins.min')?>">
    <link rel="stylesheet" href="<?php  echo css_url('bootstrap3-wysihtml5.min')?>">
    <script src ="<?php  echo js_url('jquery.min');?>"></script>
    <script src="<?php echo js_url('icheck');?>"></script>
    <script src="<?php  echo js_url('bootstrap.min');?>"></script>
    <script src="<?php  echo js_url('fastclick')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php  echo js_url('adminlte.min');?>"></script>

    <script src="<?php   echo js_url('select2.full.min');?>"></script>
    <script type="text/javascript" src=<?php echo js_url('spinnerQueue'); ?>></script>
    <script type="text/javascript" src=<?php echo js_url('sweetalert-dev'); ?>></script>
    <!-- Sparkline -->
    <script src="<?php  echo js_url('jquery.sparkline.min');?>"></script>
    <!-- jvectormap  -->
    <!-- SlimScroll -->
    <script src="<?php  echo js_url('jquery.slimscroll.min.js');?>"></script>
    <!-- ChartJS --
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php  echo js_url('dashboard2.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php  echo js_url('demo.js');?>"></script>
    <script src ="<?php  echo js_url('jquery.validate.min');?>"></script>
    <script src="<?php  echo js_url('bootstrap3-wysihtml5.all.min');?>"></script>
    <script src="<?php echo js_url('datatables/jquery.dataTables')?>"></script>
    <script src="<?php echo js_url('datatables/dataTables.bootstrap4')?>"></script>
    <script src="<?php echo js_url('alertify/alertifyInitScript')?>"></script>
    <style>
    .error
    {
    color: red;


    }



</style>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition fixed skin-yellow sidebar-mini ">

<div class="wrapper">
    <?php $this->load->view("frontpage/secretariat/topbar");?>

<?php $this->load->view("frontpage/secretariat/sidenav");?>