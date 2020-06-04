<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-id-card" aria-hidden="true"></i>
      Liste des Utilisateurs
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Utilisateurs</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
     <div class="box-header">
        <a href="<?php echo base_url('admin/Client/afficher')?>" class="w3-btn w3-blue w3-round">
        <button type="button" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter</button></a>
                <br>
        </div>
     <br><br>
     <div class="container-fluid">
     <div class="row">
       <div class="box-body">
       <div class="col-sm-4">
               <div class="dropdown">
                 <button class="btn bg-maroon btn-flat margin dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
                    <i class="fa fa-users" aria-hidden="true"></i>Les Clients
                 <span class="caret"></span></button>
                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('admin/Client/l_client')?>">Listes</a></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('admin/Pdf/l_clientpdf')?>">Imprimer pdf</a></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Exporter excel</a></li>
                   <li role="presentation" class="divider"></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Autre</a></li>
                 </ul>
              </div>
       </div>
       <div class="col-sm-4">
              <div class="dropdown">
                 <button class="btn bg-navy btn-flat margin dropdown-toggle" id="menu2" type="button" data-toggle="dropdown">
                    <i class="fa fa-university" aria-hidden="true"></i>Les Secretaires
                 <span class="caret"></span></button>
                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('admin/Client/l_secretariat')?>">Listes</a></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('admin/Pdf/l_secretariatpdf')?>">Imprimer pdf</a></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Exporter excel</a></li>
                   <li role="presentation" class="divider"></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Autre</a></li>
                 </ul>
              </div>
       </div>
       <div class="col-sm-4">
               <div class="dropdown">
                 <button class="btn bg-olive btn-flat margin dropdown-toggle" id="menu3" type="button" data-toggle="dropdown">
                    <i class="fa fa-user-secret" aria-hidden="true"></i> Les administrateurs
                 <span class="caret"></span></button>
                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('admin/Client/l_admin')?>">Listes</a></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1"  href="<?php echo base_url('admin/Pdf/l_adminpdf')?>" >Imprimer pdf</a></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Exporter excel</a></li>
                   <li role="presentation" class="divider"></li>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Autre</a></li>
                 </ul>
              </div>
       </div>
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
            <th>Nom</th>
            <th>prenom</th>
            <th>email</th>
            <th>Telephone</th>
            <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                  //var_dump($client);
                    if(isset($client) and count($client)>0)
                    {
                        $i=0;
                        foreach($client as $liste)
                        {
                            ?>

                            <?php
                            echo '<tr id="' . $liste->user . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nom">' . $liste->nom. '</td>';
                            echo '<td id="prenom">' . $liste->prenom. '</td>';
                            echo '<td id="bp">' . $liste->mail. '</td>';
                            echo '<td id="phone">' . $liste->telephone. '</td> ';
                           // echo '<input type="text" id="role" hidden>' . $liste->role. '</input>';
                            //echo '<td class="detail"><b>' . $liste->libelle.'</b>';
                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->user;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                   <button class="btn btn-warning btn-xs lock" id="<?php  echo $liste->user;?>"><i class="fa fa-trash-o "></i>Bloquer</button>
                                </a>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->user;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                   <button class="btn bg-maroon roleuser btn-xs" id="<?php  echo $liste->user; ?>" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus-circle" aria-hidden="true"></i>add role</button>
                                </a>
                                <?php
                                switch ($liste->statut)
                                {
                                    case '0':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->user.'" id="'.$liste->user.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->user.'" id="'.$liste->user.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                     case '1':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->user.'" id="'.$liste->user.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->user.'" id="'.$liste->user.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                      case '2':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->user.'" id="'.$liste->user.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->user.'" id="'.$liste->user.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                    case '3':
                                   echo '
                                   <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                   echo '<a title="Suspendre" class = " suspendre susp_'.$liste->user.'" id="'.$liste->user.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
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
                        echo '<tr><td colspan="6"  class="h3 text-center"><a href="" class="text-warning">Choisir la catégorie</a><td></tr>';
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

                            <label class="col-sm-3 col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                            <input class="form-control nom" id="disabledInput1" name="nom" type="text" disabled>
                            <br>
                            </div>

                            <label class="col-sm-3 col-sm-3 control-label">Prenom</label>
                            <div class="col-sm-9">
                            <input class="form-control prenom " id="disabledInput" name="prenom" type="text" disabled value="" >
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">telephone</label>
                            <div class="col-sm-9">
                            <input class="form-control phone" id="disabledInput" name="phone" type="text" disabled value="">
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">email</label>
                            <div class="col-sm-9">
                            <input class="form-control mail" id="disabledInput" name="mail" type="text" disabled >
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
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifier le role d'un utilisateur</h4>
      </div>
      <div class="modal-body">
      <div class="radio">
  <label><input type="radio"  class="userole" value="1" name="optradio">Client </label>
</div>
<div class="radio">
  <label><input type="radio"  class="userole" value="3" name="optradio" >administrateur </label>
</div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary role" >Ajouter</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
 
$(document).ready(function(){
    $(".dropdown-toggle").dropdown("toggle");
});
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
     var $this = $(this);
     swal({
     title: "Etes vous sur?",
     text: "De vouloir bloquer cet utilisateur!",
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
                
                sweetAlert("Oops...", t.msg, "error");

             }

           }
               });

   });

   

    });


    $('#example1').find('tr').click(function(){
	var ligneID = $(this).attr("id");
    //var nom= $(this).find(".nom").html();
       var nom= $(this).find("#nom").html();
       var prenom= $(this).find("#prenom").html();
       var email= $(this).find("#bp").html();
       var phone= $(this).find("#phone").html();
       //alert(prenom);
       $('.nom').attr({value : nom});
       $('.prenom').attr({value : prenom});
       $('.phone').attr({value : phone});
       $('.mail').attr({value : email});
       $('.id').attr({value : ligneID});
        $('.id').hide();
        $('.update').click(function()
        {


            $(".nom").prop( "disabled", false );
            $(".prenom").prop( "disabled", false );
            $(".phone").prop( "disabled", false );
            $(".mail").prop( "disabled", false );

        });

        $('#submit').click(function() {
    var form_data = {
    id : $('.id').val(),
    nom : $('.nom').val(),
    prenom : $('.prenom').val(),
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
          var t=JSON.parse(msg);
          if(t.val==1){
          swal("Modification!", t.msg, "success");
          setTimeout(function() {
        location.reload()
           },1000);
          }
          else
          {
            sweetAlert("Oops...", msg, "error");

          }
        }
        
            });
    return false;
        });
});

$('.roleuser').click(function()
{
  var ligneID = $(this).attr("id");
 // alert(ligneID);
$('.role').click(function() {
 
 var id = $("input[name='optradio']:checked").val();
 alert(id);
    var form_data = {
    iduser:ligneID,
    role : id,
    ajax : '1'
        };
        $.ajax({
        url: "<?php echo site_url('admin/Client/changerrole'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg){
        //$('#message').html(msg);
        //alert("enregistrement reussie");
        }
            });
    return false;
  });
        });
</script>
