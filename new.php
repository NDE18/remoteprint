<div class="content-wrapper">
<section class="content-header">
<h1>
      Ajouter un client
      </h1>
<ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Clients</a></li>
        <li class="active">Ajouter </li>
      </ol>
     
    </section>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ajouter un secretariat</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php  echo base_url() ?>Secretariat/save">
                <div class="box-body">
                    <?php
                    /*if($val = get_flash_data()){
                       // echo $val;
                        foreach($val as $item=>$value){

                            ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $value;?>
                            </div>
                            <?php
                        }
                    }*/?>
                    <h4 class="box-title">Information sur le secretariat</h4>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomsecretariat" id="text" placeholder="Nom du secretariat">
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Boite postal</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="boitepostal" placeholder="Boite postal du secretariat">
                      </div>
                      </div>
                      <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Telephone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="phone" placeholder="telephone du secretariat">
                      </div>
                      </div>
                      <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Region</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="region" placeholder="region du secretariat">
                      </div>
                      </div>
                      <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Ville</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="ville" placeholder="ville du secretariat">
                      </div>
                      </div>
                      <br><br><br>
                    <h4 class="box-title">Information sur le secretaire</h4>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="nom" placeholder="Nom">
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Prenom</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="prenom" placeholder="Prenom">
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Telephone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="telephone" placeholder="Telephone">
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label" >E-mail</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="email" placeholder="E-mail">
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Login</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="text" name="login" placeholder="Login">
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <label for="inputEmail4" class="col-sm-2 control-label">Mot de passe</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="text" name="mdp" placeholder="mot de passe">
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="exampleInputFile">Avatar</label>
                        <input type="file" id="exampleInputFile" name="upload">
                    </div>
                    <br><br>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="save" id="save">Enrégistrer</button>
                </div>
            </form>
          </div>
    </section>
    </div>
    </div>
</div>
  <div class="control-sidebar-bg"></div>
</div>
  