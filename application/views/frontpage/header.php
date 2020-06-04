<!DOCTYPE html>
<html>
<head>
    <title><?= (isset($titre))?$titre: '' ?></title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->

    <link href="<?php echo css_url('bootstrap'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('font-awesome.min'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('AdminLTE'); ?>"rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('w3'); ?>"rel="stylesheet" type="text/css" media="all" />

    <link href="<?php echo css_url('saxo'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('style'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('gsi-step-indicator.min'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('tsf-step-form-wizard.min'); ?>" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->


    <link href="<?php echo css_url('bootstrap3-wysihtml5.min'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('spinnerQueue'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('custom'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('customRadio'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('sweetalert'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo css_url('datatables/dataTables.bootstrap4')?>" media="all" rel="stylesheet" type="text/css">

    <!-- //font-awesome icons -->
    <!-- js -->

    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <link rel="stylesheet" href="<?php echo css_url('flexslider'); ?>" type="text/css" media="screen" property="" />
    <script defer src="<?php echo js_url('jquery.flexslider'); ?>"></script>
    <script src="<?php echo js_url('jquery'); ?>"></script>
    <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
    <script src="<?php echo js_url('tsf-wizard-plugin'); ?>"></script>
    <script src="<?php echo js_url('AdminLTE.min'); ?>"></script>
    <script src="<?php echo js_url('minicart'); ?>"></script>
    <script src="<?php echo js_url('bootstrap3-wysihtml5.all.min'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('move-top'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('easing'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('spinnerQueue'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('sweetalert-dev'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('theme.customMsbt.init'); ?>"></script>
    <script src="<?php echo js_url('datatables/jquery.dataTables')?>"></script>
    <script src="<?php echo js_url('datatables/dataTables.bootstrap4')?>"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '70b0b2e9546b7f270156f2121a1177d0cf41f6be';
        window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
<?php include_once "topbar.php" ?>
   <div class="container">
    <div class="row">
        <div class="col-md-12">
<?php include_once "menu.php";?>