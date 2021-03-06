<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-id-card" aria-hidden="true"></i>
      Liste des Services
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Services</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
     <div class="box-header">
        <a href="<?php echo base_url('admin/Service/afficher')?>" class="w3-btn w3-blue w3-round">
        <button type="button" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter</button></a>
                <br>
        </div>
     <br><br>
     <div class="container-fluid">
     <div class="row">
        <div class="col-md-7">
       <div class="box-body">
       <div class="col-sm-2">
             <button class="btn bg-maroon btn-flat margin" data-toggle="modal" data-target="#myModal1" id="menu1" type="button">
                    <i class="fa fa-pencil"></i></i>Editer
                </button>
       </div>
       <div class="col-sm-2">
               <button class="btn bg-navy btn-flat margin" id="menu1" type="button" >
                    <i class="fa fa-trash-o "></i>Suspendre
                 </button>
       </div>
       </div>
      </div>
       <div class="col-md-4">
         <div class="form-group">
             <label for="sel1">Statut:</label>
             <select class="form-control" id="critere" name="Appeloffre">
               <option value="1">Valide</option>
               <option value="2">Bloquer</option>
             </select>
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
            <th>description</th>
            <th>Image</th>
            <th>Caracteristique</th>
            <th>action</th>
            </tr>
            </thead>
            <tbody id="display">
            <?php

                    if(isset($service) and count($service)>0)
                    {
                        $i=0;
                        $j=0;
                        foreach($service as $liste)
                        {
                                $var=json_decode($liste->detail);

                            ?>

                            <?php
                            echo '<tr id="' . $liste->identifiant . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nom">' . $liste->nomservice. '</td>';
                            echo '<td id="prenom">' . $liste->description. '</td>';
                            echo '<td id="nomregion">' . $liste->image. '</td>';
                               //$valeur;
                               if($liste->nom==null)
                               {
                                echo '<td id="nomregion">aucune</td>';
                               }
                               else{
                                $valfinal="";
                                 foreach($var as $variable)
                            {
                                 $valfinal=$valfinal." ".$variable;

                            }
                                echo '<td id="nomregion">' . $liste->nom.'('.$valfinal.')'. '</td>';

                           }

                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->identifiant;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                   <button class="btn btn-warning btn-xs lock" id="<?php  echo $liste->identifiant;?>"><i class="fa fa-trash-o "></i>Bloquer</button>
                                </a>
                                <?php
                                switch ($liste->statut)
                                {
                                    case '0':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->identifiant.'" id="'.$liste->identifiant.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->identifiant)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->identifiant.'" id="'.$liste->identifiant.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                    case '3':
                                   echo '
                                   <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->service)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                   echo '<a title="Suspendre" class = " suspendre susp_'.$liste->identifiant.'" id="'.$liste->identifiant.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
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
                        echo '<tr><td colspan="6"  class="h3 text-center"><td></tr>';
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
                             <input class="form-control id" id="disabledInput" name="id" type="text" disabled hidden="true">

                            <label class="col-sm-3 col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                            <input class="form-control nom" name="nom" type="text" disabled>
                            <br>
                            </div>

                            <label class="col-sm-3 col-sm-3 control-label">Prenom</label>
                            <div class="col-sm-9">
                            <input class="form-control prenom " id="disabledInput" name="prenom" type="text" disabled value="" >
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">region</label>
                            <div class="col-sm-9">
                            <input class="form-control region" id="disabledInput" name="region" type="text" disabled value="">
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						       <h4 class="modal-title"  id="service"> </h4>

						      </div>
						      <div class="modal-body">
                              <div class="panel-body">
                              <div class="task-content">

                           <div class="form-group">
                             <div class="task-title">

                            <label class="col-sm-3 col-sm-3 control-label">Caracteristique</label>
                            <div class="col-sm-9">
                            <form method="post" action="Service/caracteristique">

                        <div class="form-group fieldGroup">
                            <div class="input-group">
                                <input class="form-control id" id="disabledInput" name="id" type="text" >
                                <input type="text" name="caracteristique[]" class="form-control" placeholder="Entrez la caracteristique"/>
                                <input type="text" name="detail[]" class="form-control" placeholder="Entrez les details"/>
                                <div class="input-group-addon">
                                    <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter</a>
                                </div>
                            </div>
                        </div>
                        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Envoyer"/>
                </form>
                            <div class="form-group fieldGroupCopy" style="display: none;">
                        <div class="input-group">
                            <input type="text" name="caracteristique[]"  class="form-control" placeholder="Enter name"/>
                            <input type="text" name="detail[]" class="form-control" placeholder="Enter email"/>
                            <div class="input-group-addon">
                                <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Supprimer</a>
                            </div>
                        </div>
                    </div>
                             </div>
                            </div>
                          </div>
			 </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
					</div>
				 </div>
				</div>
				</div>
      				</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    //group add limit
    var maxGroup = 10;

    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });

    //remove fields group
    $("body").on("click",".remove",function(){
        $(this).parents(".fieldGroup").remove();
    });
});
     $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });
  });

       $('.lock').click(function()
          {
       var ligneID = $(this).attr("id");
       var table = $('#example1').DataTable();
     var $this = $(this);
     swal({
     title: "Etes vous sur?",
     text: "De vouloir bloquer ce service!",
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
           url: "<?php echo site_url('admin/Service/bloquer'); ?>",
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

    $(function(){

        $("#critere").change(function(){
           var valeur =   $("#critere").val();
            $.post('<?php echo site_url('admin/service/statutservice') ?>',{valeur:valeur},function(data){
                $("#display").html(data);
                $('table').dataTable();
            });

        });
    });
    $('#example1').find('tr').click(function(){
	var ligneID = $(this).attr("id");
        
       var nom= $(this).find("#nom").html();
       var prenom= $(this).find("#prenom").html();
       var region= $(this).find("#nomregion").html();
       var ville= $(this).find("#ville").html();
       var email= $(this).find("#bp").html();
       var phone= $(this).find("#phone").html();
       
       $('.nom').attr({value : nom});
       $('.prenom').attr({value : prenom});
       $('.region').attr({value : region});
       $('.ville').attr({value : ville});
       $('.phone').attr({value : phone});
       $('.mail').attr({value : email});
       $('.id').attr({value : ligneID});
        $('.id').hide();
        var element = document.getElementById("service");
        element.innerHTML=nom;


       /* $('#submit').click(function() {
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
        url: "<?php echo site_url('Service/caracteristique'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg){
        //$('#message').html(msg);
        alert("enregistrement reussie");
        }
            });
    return false;
        });*/
});
</script>
