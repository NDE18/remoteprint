<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-university"></i>
      Liste des Tarifs
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Tarifs</a></li>
        <li class="active">Liste </li>
      </ol>
      <br>
      <br>
      <div class="box-header">

         <button type="button" data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter</button>
                 <br>
         </div>
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
              <th>Prix maximun</th>
              <th>Frais</th>
            </tr>
        </tfoot>
              <thead>
            <tr>
            <th class="text-center">#</th>
              <th>Prix maximun</th>
              <th>Frais</th>
              <th>action </th>
            </tr>
            </thead>
            <tbody>
            <?php
                   //var_dump($transaction);
                   //die;
                    if(isset($tarifs) and count($tarifs)>0)
                    {
                        $i=0;
                        foreach($tarifs as $liste)
                        {
                            ?>

                            <?php
                            echo '<tr id="' . $liste->id . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nom">' . $liste->prix_max. '</td>';
                            echo '<td id="prenom">' . $liste->frais. '</td>';
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
                            <label class="col-sm-3 col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                            <input class="form-control nom" name="nom" type="text">
                            <br>
                          </div>
                            <label class="col-sm-3 col-sm-3 control-label">Prenom</label>
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

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="font-family:cambria">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" style="font-family:cambria">Ajouter un Tarifs</h4>
              </div>
              <div class="modal-body">
                          <div class="panel-body">
                          <div class="task-content">
                       <div class="form-group">
                         <div class="task-title">
                        <label class="col-sm-3 col-sm-3 control-label">Tarifs</label>
                        <div class="col-sm-9">
                          <form method="post" action="<?php echo site_url('admin/Tarifs/add') ?>">

                      <div class="form-group fieldGroup">
                          <div class="input-group">
                              <input type="text" name="caracteristique[]" class="form-control" placeholder="Prix maiximun"/>
                              <input type="text" name="detail[]" class="form-control" placeholder="Frais"/>
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
                        <br>
                      </div>
                         </div>
                         </div>
                        </div>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
<!-- modal add end -->
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
        url: "<?php echo site_url('admin/Tarifs/update'); ?>",
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

       setTimeout(function() {
        location.reload()
      },1000);
        }
            });
    return false;
        });


});
</script>
