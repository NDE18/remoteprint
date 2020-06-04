<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-university"></i>
      Liste des Localites
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Localites</a></li>
        <li class="active">Liste </li>
      </ol>
      <br>
      <br>
    </section>
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
              <th></th>
              <th>Region</th>
              <th>Ville</th>
            </tr>
        </tfoot>
              <thead>
            <tr>
            <th class="text-center">#</th>
              <th>Region</th>
              <th>Ville</th>
              <th>Nombre secretariat</th>
              <th>Nombre de client</th>
              <th>Nombre d'appel d'offre</th>
              <th>Nombre d'offre</th>
              <th>action </th>
            </tr>
            </thead>
            <tbody>
            <?php
                   //var_dump($localite);
                   //die;
                    if(isset($localite) and count($localite)>0)
                    {
                        $i=0;
                        foreach($localite as $liste)
                        {
                            ?>

                            <?php
                            echo '<tr id="' . $liste->id . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nom">' . $liste->nomregion. '</td>';
                            echo '<td id="prenom">' . $liste->ville. '</td>';
                            echo '<td id="nom">' . $liste->nombre. '</td>';
                            echo '<td id="nom">' . $liste->nbuser. '</td>';
                            echo '<td id="nom">' . $liste->idappeloffre. '</td>';
                            echo '<td id="nom">' . $liste->offre. '</td>';
                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->id;?>')"class="lock w3-btn w3-white w3-small w3-margin-small" title="modifier">
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal" ><i class=" fa fa-check"></i>Modifier</button>
                                </a>
                            </td>
                            <?php echo "</tr>";
                        }
                    }
                    else
                    {
                        echo '<tr><td colspan="6"  class="h3 text-center"><a href="#" class="text-warning">Aucun Tarifs enregistré pour le moment ...</a><td></tr>';
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
						        <h4 class="modal-title" style="font-family:cambria">Information complete</h4>
						      </div>
						      <div class="modal-body">
                              <div class="panel-body">
                              <div class="task-content">
                                <input class="form-control id" name="id" type="text" disabled hidden="true">
                           <div class="form-group">
                             <div class="task-title">
                            <label class="col-sm-3 col-sm-3 control-label">Region</label>
                            <div class="col-sm-9">
                            <input class="form-control nom" name="nom" type="text">
                            <br>
                          </div>
                            <label class="col-sm-3 col-sm-3 control-label">Ville</label>
                            <div class="col-sm-9">
                            <input class="form-control prenom" name="prenom" type="text" >
                            <br>
                            </div>
                             </div>
                             </div>
                            </div>
                          </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" id='fermer' data-dismiss="modal">Fermer</button>
						        <button type="submit" id="submit" class="btn btn-primary">Envoyer</button>
						      </div>
						    </div>
						  </div>
						</div>
      				</div>
<!-- Modal add begin -->

<!-- modal add end -->
        <!-- /.container-fluid -->



<script src="<?php echo  js_url('cameroun_fr'); ?>"></script>
<script type="text/javascript">
   $(document).ready(function() {

     putRegion('#region');
     $('#region').on('change', function(){
         var r=$(this);
         if (r.val()!=="other")
         {
             putDepartement('#ville', r.val());

         }
     });
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
$('#fermer').click(function()
{
  setTimeout(function() {
   location.reload()
 },10);
});
    $('#example1').find('tr').click(function(){

        var $this = $(this);
	var ligneID = $(this).attr("id");
       var nom= $(this).find("#nom").text();
       var prenom= $(this).find("#prenom").text();
       //alert(prenom);
       $('.nom').attr({value : nom});
       $('.prenom').attr({value : prenom});
       $('.id').attr({value : ligneID});
        $('.id').hide();

        $('#submit').click(function() {
    var form_data = {
    id : $('.id').val(),
    nom : $('.nom').val(),
    prenom : $('.prenom').val(),
    ajax : '1'
                    };
        $.ajax({
        url: "<?php echo site_url('admin/Parametre/location_update'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {
        var t=JSON.parse(msg);
        if(t.val!=0)
             {
               swal("Modification!",t.msg, "success");
                }
          else {
                 sweetAlert("Oops...", t.msg, "error");
               }

        }
            });
    return false;
        });

});
</script>
