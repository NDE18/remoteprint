<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-id-card" aria-hidden="true"></i>
      Liste des Appels d'offres
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Appels d'offres</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
     <div class="box-header">
        <a href="<?php echo base_url('admin/Appeloffre/afficher')?>" class="w3-btn w3-blue w3-round">
        <button type="button" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter</button></a>
                <br>
        </div>
     <br><br>
     <div class="container-fluid">
     <div class="row">
       <div class="box-body">
       <div class="col-md-4"></div>
       <div class="col-md-4">
         <div class="form-group">
             <label for="sel1">Statut:</label>
             <select class="form-control" id="critere" name="Appeloffre">
               <option value="1">En attente</option>
               <option value="2">traitée</option>
             </select>
           </div>
       </div>
       <div class="col-md-4"></div>
       </div>
       </div>
     </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">

        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th class="text-center">#</th>
            <th>Num</th>
            <th>service</th>
            <th>Emit par</th>
            <th>date de lancement</th>
            <th>nombreexemplaire</th>
            <th>action</th>
            </tr>
            </thead>
            <tbody id="display">
            <?php
                  //var_dump($appeloffre);
                    if(isset($appeloffre) and count($appeloffre)>0)
                    {
                        $i=0;
                        foreach($appeloffre as $liste)
                        {
                            ?>

                            <?php
                            $caracteristique = json_decode($liste->caracteristique,true);
                            //var_dump($caracteristique);
                            echo '<tr id="' . $liste->id . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nom">' . $liste->num. '</td>';
                            echo '<td id="prenom">' . $liste->nom. '</td>';
                            echo '<td id="nomregion">' . $liste->nomuser. '</td>';
                            echo '<td id="ville">' . $liste->dateL. '</td>';
                          //  echo '<td id="bp">' . $caracteristique['livraison']. '</td>';
                            echo '<td >' . $caracteristique['nombreExemplaire']. '</td>';
                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->id;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                   <button class="btn btn-warning btn-xs lock" id="<?php  echo $liste->id;?>"><i class="fa fa-trash-o "></i>Bloquer</button>
                                </a>
                                <?php
                                switch ($liste->statut)
                                {
                                    case '0':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->id.'" id="'.$liste->id.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->id.'" id="'.$liste->id.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                    case '3':
                                   echo '
                                   <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                   echo '<a title="Suspendre" class = " suspendre susp_'.$liste->id.'" id="'.$liste->id.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                   break;
                                    default:
                                        echo "";
                                        break;
                                }
                                ?>
                            </td>
                            <?php echo "</tr>";
                        }
                    }
                    else
                    {
                        echo '<tr><td colspan="6"  class="h3 text-center">Aucun pour le moment ...><td></tr>';
                    }
                    ?>

            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    </div>
    </div>
    </div>
    </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                             <input class="form-control id" id="disabledInput" name="id" type="text" disabled hidden="true">

                            <label class="col-sm-3 col-sm-3 control-label">Numero</label>
                            <div class="col-sm-9">
                            <input class="form-control nom" id="disabledInput1" name="nom" type="text" disabled>
                            <br>
                            </div>

                            <label class="col-sm-3 col-sm-3 control-label">Service</label>
                            <div class="col-sm-9">
                            <input class="form-control prenom " id="disabledInput" name="prenom" type="text" disabled value="" >
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">Client</label>
                            <div class="col-sm-9">
                            <input class="form-control region" id="disabledInput" name="region" type="text" disabled value="">
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">Date de lancement</label>
                            <div class="col-sm-9">
                            <input class="form-control ville" id="disabledInput" name="ville" type="text" disabled value="">
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">detail</label>
                            <div class="col-sm-9">
                            <input class="form-control mail" id="disabledInput" name="phone" type="text" disabled value="">
                            <br>
                            </div>
                             <div class="pull-right hidden-phone">
                            <button class="btn btn-primary update btn-xs fa fa-pencil">modifier</button>
                             </div>
                             </div>
                             </div>
                            </div>
                          </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						        <button type="submit" id="submit" class="btn btn-primary">Envoyer</button>
						      </div>
						    </div>
						  </div>
						</div>
      				</div>
    <!-- /.container-fluid -->

</div>

<script type="text/javascript">

     $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });

       $('.lock').click(function()
          {
       var ligneID = $(this).attr("id");
       var table = $('#example1').DataTable();
   alert(ligneID);
     var $this = $(this);
     swal({
     title: "Etes vous sur?",
     text: "De vouloir bloquer cet appel d offre!",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "Oui!",
     closeOnConfirm: false
   },
   function(){

     var form_data = {
       id : ligneID,
       ajax : '1'
       };
       //if(ligneID==2)
       $.ajax({
           url: "<?php echo site_url('admin/Client/bloquer'); ?>",
           type: 'POST',
           async : false,
           data: form_data,
           success: function(msg) {
           $this.parent().parent().parent().addClass('selected');
             var t=JSON.parse(msg);
             if (t.val==1) {
               swal("Bloquer!", t.msg, "success");
              table.row('.selected').remove().draw( false );
             }
             else
             {
                /*if(t.val==2)
                {

                }*/
                sweetAlert("Oops...", t.msg, "error");

             }

           }
               });

   });

    });

    $(function(){

        $("#critere").change(function(){
           var valeur =   $("#critere").val();
            $.post('<?php echo site_url('admin/Appeloffre/statutappeloffre') ?>',{valeur:valeur},function(data){
                $("#display").html(data);
                $('table').dataTable();
            });

        });
    });
    $('#example1').find('tr').click(function(){
	var ligneID = $(this).attr("id");
    //var nom= $(this).find(".nom").html();
       var nom= $(this).find("#nom").html();
       var prenom= $(this).find("#prenom").html();
       var region= $(this).find("#nomregion").html();
       var ville= $(this).find("#ville").html();
       var email= $(this).find("#bp").html();
       var phone= $(this).find("#phone").html();
       //alert(prenom);
       $('.nom').attr({value : nom});
       $('.prenom').attr({value : prenom});
       $('.region').attr({value : region});
       $('.ville').attr({value : ville});
       $('.phone').attr({value : phone});
       $('.mail').attr({value : email});
       $('.id').attr({value : ligneID});
        $('.id').hide();
        $('.update').click(function()
        {


            $(".nom").prop( "disabled", false );
            $(".prenom").prop( "disabled", false );
            $(".region").prop( "disabled", false );
            $(".ville").prop( "disabled", false );
            $(".phone").prop( "disabled", false );
            $(".mail").prop( "disabled", false );

        });

        $('#submit').click(function() {
    var form_data = {
    id : $('.id').val(),
    nom : $('.nom').val(),
    prenom : $('.prenom').val(),
    region : $('.region').val(),
    ville : $('.ville').val(),
    phone : $('.phone').val(),
    mail : $('.mail').val(),
    ajax : '1'
        };
        $.ajax({
        url: "<?php echo site_url('admin/Client/updateinfo'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg){
        //$('#message').html(msg);
        alert("enregistrement reussie");
        }
            });
    return false;
        });
});
</script>
