
<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-id-card" aria-hidden="true"></i>
      Liste des images des Services
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Service</a></li>
        <li>images</li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
     <div class="box-header">
        <a href="<?php echo base_url('Service/afficher')?>" class="w3-btn w3-blue w3-round">
        <button type="button" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter</button></a>
                <br>
        </div>
     <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="row">
          <?php //var_dump($service);
          if(isset($service) and count($service)>0)
          {
              $i=0;
              $j=0;
              foreach($service as $liste)
              {

              ?>
              <?php
                if($liste->image==null)
                {
                  ?>
                  <div class="col-xs-4">
                  <div class="card" style="width:200px">
                  <img src="<?php  img_url('img_avatar.png')?>" class="card-img-top" alt="User Image" style="width:75%">
                  <div class="card-body ">
                    <h4 class="card-title"><?=  $liste->nomservice; ?></h4>
                    <p class="card-text bg-secondary text-white" ><?=  $liste->description; ?></p>
                    <a href="#" class="btn btn-primary modifier" id="<?= $liste->identifiant; ?>" data-toggle="modal" data-target="#myModal1">modifier</a>
                  </div>
                  </div>
                </div>
                <br>
                <br>
                  <?php
                }
               ?>
                <div class="col-xs-4">
                <div class="card" style="width:200px">
                <img src="<?php echo base_url('assets/uploads/images/service').'/'.$liste->image ?>" class="card-img-top" alt="User Image" style="width:75%">
                <div class="card-body ">
                  <h4 class="card-title"><?=  $liste->nomservice; ?></h4>
                  <p class="card-text bg-secondary text-white" ><?=  $liste->description; ?></p>
                  <a href="#" class="btn btn-primary modifier" id="<?= $liste->identifiant; ?>" data-toggle="modal" data-target="#myModal1">modifier</a>
                </div>
                </div>
              </div>
              <br>
              <br>
              <?php
              }
            }
          ?>

        </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Information complete</h4>
                </div>
                <div class="modal-body">
                            <div class="panel-body">
                            <div class="task-content">
                         <div class="form-group">
                           <div class="task-title">
                             <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/service/save_image'); ?>">
                               <input type="text" name="id" id="id" class="form-control id" hidden=hidden>
                          <div class="col-sm-9">
                            <label id="dip"> Image descriptive du service </label>
                        		<div class="file-loading">
                        		<input id="kv-explorer" type="file" name="fiche" multiple>
                        		</div>
                        		</div>
                          <br>
                          </div>
                           </div>
                           </div>
                          </div>
                        </div>
                        </from>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                  <button type="submit" id="submit" class="btn btn-primary">Envoyer</button>
                </div>
              </div>
            </div>
          </div>
<script language="javascript">

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
            maxFilePreviewSize: 10240,
            overwriteInitial: false,
            initialPreviewAsData: true,
          });
          $('.modifier').click(function()
        {
          var ligneID = $(this).attr("id");
                alert(ligneID);
                $('.id').attr({value : ligneID});
                $('.id').hide();
        });
          });


</script>
