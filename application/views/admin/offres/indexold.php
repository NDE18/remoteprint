<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-id-card" aria-hidden="true"></i>
      Liste des offres en cours de traitement
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">offres</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
     <br><br>
     <div class="container-fluid">
     <div class="row">
       <div class="box-body">
       <div class="col-md-4"></div>
       <div class="col-md-4">
         <div class="form-group">
             <label for="sel1">Statut:</label>
             <select class="form-control" id="critere" name="Appeloffre">
               <option value="1">Offre en entente</option>
               <option value="2">Offre choisie</option>
               <option value="3">Offre Payée</option>
               <option value="4">Offre en cours traitement</option>
               <option value="5">Offre terminer en entente contentieux</option>
               <option value="6">Offre payée par l'administrateur en entente de validation</option>
               <option value="7">Offre terminée</option>
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
            <th>Appel offre</th>
            <th>Service</th>
            <th>Secretariat</th>
            <th>Numero client</th>
            <th>Temps restant</th>
            <th>transaction </th>
            <th>action</th>
            </tr>
            </thead>
            <tbody id="display">
            <?php
                 //var_dump($offre);
                 /*die();*/
                    if(isset($offre) and count($offre)>0)
                    {
                        $i=0;
                        foreach($offre as $liste)
                        {
                            ?>

                            <?php
                            $d2=new datetime($liste->dateRecuperation);
                            $d1=new datetime($liste->dateValidation);
                            $d3=$d1->diff($d2);
                            //var_dump($caracteristique);
                            echo '<tr id="' . $liste->id . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nom">' . $liste->num. '</td>';
                            echo '<td >' . $liste->nomservice. '</td>';
                            echo '<td id="prenom">' . $liste->nomsecretariat. '</td>';
                            echo '<td id="nomregion">' . $liste->numeroClient. '</td>';
                            echo '<td bgcolor="red" id="ville">' . $d3->format('%d')." jours"." ".$d3->format('%m')." mois". '</td>';
                             if(empty($liste->intitule))
                             echo '<td bgcolor="red">' ."pas encore effectué ". '</td>';
                             else
                                echo '<td bgcolor="red">' . $liste->intitule. '</td>';
                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->identifiantoffre;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="Bloquer">
                                   <button class="btn btn-warning btn-xs lock" id="<?php  echo $liste->identifiantoffre;?>"><i class="fa fa-trash-o "></i>Stopper</button>
                                </a>
                                <?php
                                switch ($liste->statut)
                                {
                                    case '0':
                                        /*echo '<a title="Activer"  class = "activer  vali_'.$liste->id.'" id="'.$liste->id.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->id.'" id="'.$liste->id.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';*/
                                        break;
                                    case '3':
                                   echo '
                                   <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                   echo '<a title="Suspendre" class = " suspendre susp_'.$liste->identifiantoffre.'" id="'.$liste->identifiantoffre.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
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
                        echo '<tr><td colspan="6"  class="h3 text-center">Aucun pour le moment ...<td></tr>';
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
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Liste des offres </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="demo-modal">

          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Modal -->

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
  $(function(){
        $("#critere").change(function(){
           var valeur =   $("#critere").val();
            $.post('<?php echo site_url('admin/Offre/statutoffre') ?>',{valeur:valeur},function(data){
                $("#display").html(data);
                $('table').dataTable();
            });

        });
    });
       
    $('.lock').click(function(){
  var table = $('#example1').DataTable();
  var ligneID = $(this).attr("id");
  var $this = $(this);
  swal({
  title: "Motif!",
  text: "Entrez le motif de suspension:",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Motif"
},
function(inputValue){
  if (inputValue === false) return false;

  if (inputValue === "") {
    swal.showInputError("Desole vous ne pouvez pas suspendre une offre sans motif!");
    return false
  }
  if (inputValue !== false) {
    var form_data = {
    id : ligneID,
    motif : inputValue,
    ajax : '1'
    };
    $.ajax({
        url: "<?php echo site_url('admin/Offre/bloquer'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {

        $this.parent().parent().addClass('selected');
        table.row('.selected').remove().draw( false );
        table.columns.adjust().draw();
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
    
  }

});
});
</script>
