<div class="content-wrapper" style="font-family:cambria">
<section class="content-header">
<h1  style="font-family:cambria">
<i class="fa fa-plus" aria-hidden="true"></i>
      Ajouter un secretariat
      </h1>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Secretariat</a></li>
        <li class="active">Ajouter </li>
      </ol>
      <br>
      <a href="liste">
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
            <form role="form"  method="post" enctype="multipart/form-data" id="form_notif" accept-charset="utf-8" action="<?php  echo base_url() ?>admin/Secretariat/save">
            <?php if(isset($error)) { ?>
                    <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" onclick="$(this).parrent().hide()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?php echo $error ?>
                    </div>
                <?php } ?>
                <div class="box-body">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="panel panel-primary">
                <div class="panel-heading">
                <h4 style="font-family:cambria ;text-align:center">Information sur le secretariat</h4>
                </div>
              </div>

                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomsecretariat"  placeholder="Nom du secretariat">
                        <?= form_error('nomsecretariat') ?>
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Boite postal</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="boitepostal" placeholder="Boite postal du secretariat">
                        <?= form_error('boitepostal') ?>
                      </div>
                      </div>
                      <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Telephone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="phone" placeholder="telephone du secretariat">
                        <?= form_error('phone') ?>
                      </div>
                      </div>
                      <br><br>
                    <div class="form-group">
                        <label for="inputEmail4" class="col-sm-2 control-label" >Region</label>
                  <div class="col-sm-10">

                  <select class="form-control" id="region"  name="region">

                        <option value=""></option>
                       </select>
                  </div>
                </div>
                      <br><br><br>
                        <div class="form-group">
                        <label for="inputEmail4" class="col-sm-2 control-label">Ville</label>
                      <div class="col-sm-10">
                      <select class="form-control" id="ville" name="ville">
                      </select>
                      <?= form_error('ville') ?>
                      </div>
                    </div>
                      </div>
                      <div class="col-md-6">
                      <div class="panel panel-warning">
                <div class="panel-heading">
                <h4  style="font-family:cambria;text-align:center" >Information sur le secretaire</h4>
                </div>
              </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="input_message">
                        <?= form_error('nom') ?>
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Prenom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="prenom" placeholder="Prenom">
                        <?= form_error('prenom') ?>
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Telephone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="telephone" placeholder="Telephone">
                        <?= form_error('telephone') ?>
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label" >E-mail</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="email" placeholder="E-mail">
                        <?= form_error('email') ?>
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Login</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="login" placeholder="Login">
                        <?= form_error('login') ?>
                      </div>
                    </div>
                    <br><br>
                   <div class="form-group">
                        <br>
                        <br>
                        <label class="control-label col-md-2">Mot de passe</label>
                         <div class="col-sm-10">
                          <input type="text" name="mdp" id="password-indicator-visible" class="form-control m-b-5" />
                          <?= form_error('mdp') ?>
                         <div id="passwordStrengthDiv2" class="is0 m-t-5"></div>
                         </div>
                </div>
                    <br><br>
                    </div>
                      </div>
                    <br><br>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="save" id="form_submit">Enrégistrer</button>
                </div>
            </form>
          </div>
    </section>
    </div>
    </div>
</div>
  <div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo  js_url('cameroun_fr'); ?>"></script>
<script language="javascript">

$(document).ready(function() {

/*  $('#form_notif').find('#form_submit').click(function(event) {
	event.preventDefault();
	var input_message = $('#input_message');

	if ('' == input_message.val()) {
		alert('input kosong');
		return;
	}
	$.ajax({
		url: "create",
		type: "post",
		dataType: 'json',
		data:{
			'user_id': 1,
			'message': input_message.val()
		}
    });
	// reset form
	input_message.val('');
    alert('terkirim');
});*/
putRegion('#region');
$('#region').on('change', function(){
    var r=$(this);
    if (r.val()!=="other")
    {
        putDepartement('#ville', r.val());
    }
});
       });


  </script>
