
<div class="content-wrapper" style="font-family:cambria">
<section class="content-header">
<h1 style="font-family:cambria">
<i class="fa fa-unlock-alt" aria-hidden="true"></i>
      Liste des Secretariats suspendus
      </h1>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Secretariats</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
    <div class="box-header">
        <a href="<?php echo base_url('Secretariat/afficher')?>" class="w3-btn w3-blue w3-round">
        <button type="button" class="btn btn-primary btn-lg">Ajouter</button></a>
                <br>
        </div>
        <br>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
        
                <br>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th class="text-center">#</th>
              <th>Nom du secretariat</th>
              <th>Nom du secretaire</th>
              <th>Region</th>
              <th>ville</th>
              <th>boite-postal</th>
              <th>telephone</th>
              <th>action </th>
            </tr>
            </thead>
            <tbody>
            <?php
                  // var_dump($secretariats);
                    if(isset($secretariats) and count($secretariats)>0)
                    {
                        $i=0;
                        foreach($secretariats as $liste)
                        {
                            ?>

                            <?php
                            echo '<tr id="' . $liste->id . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nomsecretariat">' . $liste->nomsecretariat. '</td>';
                            echo '<td id="nom">' . $liste->nom. '</td>';
                            echo '<td id="nomregion">' . $liste->nomregion. '</td>';
                            echo '<td id="ville">' . $liste->ville. '</td>';
                            echo '<td id="bp">' . $liste->boitepostal. '</td>';
                            echo '<td id="phone">' . $liste->telephone. '</td> ';
                            //echo '<td>' . $liste->nationnalite. '</td>';
                            //echo '<td class="detail"><b>' . $liste->libelle.'</b>';
                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->id;?>')"class="lock w3-btn w3-white w3-small w3-margin-small"  title="plus de détail">
                                <button class="btn btn-success btn-xs valider" id="<?php  echo $liste->id;?>"><i class=" fa fa-check"></i>Valider</button>
                                </a>
                                <?php
                                switch ($liste->statut)
                                {
                                    case '0':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->id.'" id="'.$liste->id.'">    
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>
                                        <button class="btn suspendre btn-danger btn-xs" id="suspendre"><i class="fa fa-trash-o "></i>suspendre</button>';
                                        echo '<a title="Suspendre" class = "  susp_'.$liste->id.'" id="'.$liste->id.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                    case '1':
                                        echo '<a title="Suspendre" class = " susp_'.$liste->id.'" id="'.$liste->id.'"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        echo '<a title="Activer" class = "activer  vali_'.$liste->id.'" id="'.$liste->id.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
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
                        echo '<tr><td colspan="6"  class="h3 text-center"><a href="#" class="text-warning">Aucun Secretariat enregistré pour le moment ...</a><td></tr>';
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
    
        <!-- /.container-fluid -->



<script type="text/javascript">
    
    $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });
  $('.valider').click(function(){
    var ligneID = $(this).attr("id");
    var table = $('#example1').DataTable();
    //alert(ligneID);
  var $this = $(this);
  swal({
  title: "Etes vous sur?",
  text: "Voulez vous vraiment active ce secretariat!",
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
    $.ajax({
        url: "<?php echo site_url('Secretariat/active_compte'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {
        $this.parent().parent().parent().addClass('selected');
          var t=JSON.parse(msg);
          if (t.val=1) {
            swal("Supprimer!", t.msg, "success");
           // table.row('.selected').remove().draw( false );
          }
          else
          {
            swal("Activer!", t.msg, "success");
            
          }
          table.row('.selected').remove().draw( false );
         
        }
            });

});
});

    $('#example1').find('tr').click(function(){
        //alertify.alert('Alert Title', 'Alert Message!', function(){ alertify.success('Ok'); });
      //  alert('tt');
	var ligneID = $(this).attr("id");
    //var nom= $(this).find(".nom").html();
       var nom= $(this).find("#nomsecretariat").html();
       var prenom= $(this).find("#nom").html();
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
        url: "<?php echo site_url('Secretariat/updateinfo'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {
        //$('#message').html(msg);
       // alert("enregistrement reussie");
       alertify.success(msg);
        }
            });
    return false;
        });


});
</script>

