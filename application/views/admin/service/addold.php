<div class="content-wrapper" style="font-family:cambria">
<section class="content-header">
<h1  style="font-family:cambria">
<i class="fa fa-user-plus" aria-hidden="true"></i>
      Ajouter un Client
      </h1>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Client</a></li>
        <li class="active">Ajouter </li>
      </ol>
      <br>
      <a href="index">
      <button type="button" class="btn bg-navy margin"><i class="fa fa-hand-o-left" aria-hidden="true"></i>  Retour</button>
      </a>
    </section>
    <br>
    <br>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <form  method="post" enctype="multipart/form-data"  action="<?php  echo base_url() ?>admin/Service/save">
            <?php if(isset($error)) { ?>
                    <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" onclick="$(this).parrent().hide()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?php echo $error ?>
                    </div>
                <?php } ?>
            <div class="box-body">
                <br><br>
                <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Designation du services</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom" placeholder="Designation du services">
                    <?php echo form_error('nom') ?>
                  </div>
                </div>

                <br><br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="description" placeholder="description">
                    <?= form_error('description') ?>
                  </div>
                </div>
                <br><br>
              </div>
               <div class="col-md-4">
                <div class="form-group">
			<?php //print_r($error); ?>
		<label id="dip"> Image descriptive du service </label>
		<div class="file-loading">
		<input id="kv-explorer" type="file" name="fiche" multiple>
		</div>
		</div>
            </div>
                <br><br>
		</form>
		<div class="col-md-2">
                <button type="submit" class="btn btn-primary" name="save">Enrégistrer</button>
            </div>
            </div>
   </section>
    </div>


  <script language="javascript">
$('.select2').select2();

  $(document).ready(function () {
	$("#test-upload").fileinput({
		'theme': 'fa',
		'showPreview': false,
		'allowedFileExtensions': ['jpg', 'png', 'gif', 'pdf'],
		'elErrorContainer': '#errorBlock'
	});
	$("#kv-explorer").fileinput({
		'theme': 'explorer-fa',
		'uploadUrl': '../assets/uploads/',
		//allowedFileTypes: ['image'],
		maxFilePreviewSize: 10240,
		overwriteInitial: false,
		initialPreviewAsData: true,
	});
});
  </script>
