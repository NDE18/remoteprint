<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-university"></i>
      Liste des Secretariats en attentes
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Clients</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
    <div class="box-header" style="font-family:cambria">
        <a href="<?php echo base_url('admin/Secretariat/afficher')?>" class="w3-btn w3-blue w3-round">
        <button type="button" class="btn btn-primary btn-lg">Ajouter</button></a>
        <br>
        </div>
        <br>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">

        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped" style="font-family:cambria">
            <tfoot style="display:table-header-group">
            <tr>
                <th>Nom du secretariat</th>
                <th>Nom du secretaire</th>
                <th>Region</th>
                <th>ville</th>
                <th>boite-postal</th>
                <th>telephone</th>
                <th>action</th>
            </tr>
        </tfoot>
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
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->id;?>')"class="lock w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                <button class="btn btn-success btn-xs val" id="valider"><i class=" fa fa-check"></i>Valider</button>
                                </a>
                                <?php
                                switch ($liste->statut)
                                {
                                    case '0':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->id.'" id="'.$liste->id.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)"  data-toggle="modal"  data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>
                                        <button class="btn suspendre btn-danger btn-xs" id="suspendre"><i class="fa fa-trash-o "></i>suspendre</button>';
                                      //  echo '<a title="Suspendre" class = "  susp_'.$liste->id.'" id="'.$liste->id.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                    case '1':
                                        echo '<a title="Suspendre" class = " susp_'.$liste->id.'" id="'.$liste->id.'"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                      //  echo '<a title="Activer" class = "activer  vali_'.$liste->id.'" id="'.$liste->id.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="font-family:cambria">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel" style="font-family:cambria">Information complete</h4>
						      </div>
						      <div class="modal-body">
                              <div class="panel-body">
                              <div class="task-content">

                           <div class="form-group">
                             <div class="task-title">
                             <input class="form-control id"  id="id" name="id" type="text" disabled hidden="true">

                            <label class="col-sm-3 col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                            <input class="form-control nom" id="nom" name="nom" type="text" disabled>
                            <br>
                            </div>

                            <label class="col-sm-3 col-sm-3 control-label">Prenom</label>
                            <div class="col-sm-9">
                            <input class="form-control prenom " id="prenom"  name="prenom" type="text" disabled value="" >
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">region</label>
                            <div class="col-sm-9">
                            <input class="form-control region" id="region"  name="region" type="text" disabled value="">
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">ville</label>
                            <div class="col-sm-9">
                            <input class="form-control ville" id="ville"  name="ville" type="text" disabled value="">
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">telephone</label>
                            <div class="col-sm-9">
                            <input class="form-control phone" id="phone" name="phone" type="text" disabled value="">
                            <br>
                            </div>
                            <label class="col-sm-3 col-sm-3 control-label">boite-postal</label>
                            <div class="col-sm-9">
                            <input class="form-control mail" id="mail" name="mail" type="text" disabled >
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



<script type="text/javascript">
   $(document).ready(function() {
    $('#example1').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
    $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

  $('.val').click(function(){
  	swal({
		title: "Etes vous sur?",
		text: "Etes vous sure de vouloir valider ce  secretariat!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Oui',
		cancelButtonText: "Non",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
    if (isConfirm){
      var form_data = {
    id : $('.id').val(),
    ajax : '1'
    };
    $.ajax({
        url: "<?php echo site_url('admin/Secretariat/verif_condition'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {
        var t=JSON.parse(msg);
       if(t.val!=0)
            {
              sweetAlert("Oops...", t.msg, "error"); }
          else
            if(t.val==0)
            {
             swal("Deleted!", "Your imaginary file has been deleted!", "success");  }
             setTimeout(function() {
              location.reload()
                 },1000);
        }
            });

    } else {
      swal("Sortie", "aucune modification  :)", "error");
    }
	});

});
$('.suspendre').click(function(){
  var table = $('#example1').DataTable();
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
    swal.showInputError("Desole vous ne pouvez pas suspendre un secretariat sans motif!");
    return false
  }
  if (inputValue !== false) {
    var form_data = {
    id : $('.id').val(),
    motif : inputValue,
    ajax : '1'
    };
    $.ajax({
        url: "<?php echo site_url('admin/Secretariat/suspension'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {

        $this.parent().parent().addClass('selected');
        swal("Supprimer!",msg, "success");
        table.row('.selected').remove().draw( false );
        table.columns.adjust().draw();
        }
            });
    swal("Nice!", "You wrote: " + inputValue, "success");
  }


});
 /* swal({
  title: "Etes vous sur?",
  text: "Etes vous sure de vouloir supprimer!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    var form_data = {
    id : $('.id').val(),
   // motif : value,
    ajax : '1'
    };
    $.ajax({
        url: "<?php echo site_url('admin/Secretariat/suspension'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {

        $this.parent().parent().addClass('selected');
        swal("Supprimer!",msg, "success");
        table.row('.selected').remove().draw( false );
        }
            });

  } else {
    swal("Sortie", "Aucune modification :)", "error");
  }
});*/

});
    $('#example1').find('tr').click(function(){

        var $this = $(this);
	var ligneID = $(this).attr("id");
  //alert(ligneID);
    //var nom= $(this).find(".nom").html();
       var nom= $(this).find("#nomsecretariat").text();
       var prenom= $(this).find("#nom").text();
       var region= $(this).find("#nomregion").text();
       var ville= $(this).find("#ville").text();
       var email= $(this).find("#bp").text();
       var phone= $(this).find("#phone").text();
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
       swal("Modification!",msg, "success");
       setTimeout(function() {
        location.reload()
           },1000);
     /*  $this.find("#nomsecretariat").text(form_data.nom);
       $this.find("#nom").text(form_data.prenom);
       $this.find("#nomregion").text(form_data.region);
       $this.find("#ville").text(form_data.ville);
       $this.find("#bp").text(form_data.email);
       $this.find("#phone").text(form_data.phone);*/

        }
            });
    return false;
        });


});
</script>
