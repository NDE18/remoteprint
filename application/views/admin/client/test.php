<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v3.0/admin/html/form_plugins.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2017 22:02:18 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Form Plugins</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<!--<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
	<!--<link href="assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />-->
	<!--<link href="assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />-->
	<link href="<?php base_url('assets/css/password-indicator.css')?>" rel="stylesheet" />
	<!--<link href="assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<!--<link href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />-->
	<!--<link href="assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />-->
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<!--<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Form Stuff</a></li>
				<li class="active">Form Plugins</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Form Plugins <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    
                    <!-- end panel -->
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-plugins-9">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Password Indicator</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered">
								<!--<div class="form-group">
									<label class="control-label col-md-4">Password</label>
									<div class="col-md-8">
										<input type="password" name="password" id="password-indicator-default" class="form-control m-b-5" />
										<div id="passwordStrengthDiv" class="is0 m-t-5"></div>
									</div>
								</div>-->
								<div class="form-group">
									<label class="control-label col-md-4">Visible Password</label>
									<div class="col-md-8">
										<input type="text" name="password-visible" id="password-indicator-visible" class="form-control m-b-5" />
										<div id="passwordStrengthDiv2" class="is0 m-t-5"></div>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
                <!-- begin col-6 -->
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
        <!-- end theme-panel -->
        
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	
	<!--<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>-->
	<script src="<?php js_url('jquery-ui.min')?>"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php js_url('jquery.slimscroll.min')?>"></script>
	
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<!--<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>-->
	</div>
                <script src="<?php js_url('jquery-ui.min')?>"></script>
                <script src="<?php js_url('jquery.slimscroll.min')?>"></script>
                <script src="<?php js_url('ion.rangeSlider.min')?>"></script>
            <script src="<?php js_url('bootstrap-colorpicker.min')?>"></script>
            <script src="<?php js_url('masked-input.min')?>"></script>
            <script src=" <?php js_url('bootstrap-timepicker.min')?>"></script>
        <script src="<?php js_url('password-indicator')?>"></script>
	<script src="<?php js_url('form-plugins.demo.min')?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			FormPlugins.init();
		});
	</script>
<script>
 
</script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v3.0/admin/html/form_plugins.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Sep 2017 22:04:54 GMT -->
</html>

                    <!-- end panel -->
                