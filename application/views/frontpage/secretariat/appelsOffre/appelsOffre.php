<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Liste des appels d'offre

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Appel offre</li>
        </ol>
    </section>

    <section class="content">
        <div class="callout callout-info">
            <h4>Information !</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>
        <div class="col-sm-12 table-responsive">
            <div class="box box-default">

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-3">
                            <label>Voir les appels d'offre</label>
                            <select id="critere" class="form-control">
                                <option value="0" selected>En attente</option>
                                <option value="1">Traités</option>
                            </select>
                        </div>

                        <div class="col-sm-12 table-responsive">
                            <br>
                        <table class="table table-bordered table-hover table-responsive" width="100%" id="dataTable" cellspacing="0">
                            <tfoot style="display: table-header-group;">
                            <tr>
                                <th>#</th>
                                <th>Numero appel offre</th>
                                <th>Service concerné</th>
                                <th>Nombre page document</th>
                                <th>Adresse de provenance</th>
                                <th>Nombre exemplaires</th>

                            </tr>
                            </tfoot>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Numero appel offre</th>
                                <th>Service concerné</th>
                                <th>Nombre page document</th>
                                <th>Adresse de provenance</th>
                                <th>Nombre exemplaires</th>
                                <th>Date lancement</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody id="display">

                            <?php
                            $i = 0;

                            foreach($appels as $appel){
                                $i ++;
                                $caracteristique = json_decode($appel->caracteristique,true);
                                ?>
                                <div id="<?php echo $appel->id; ?>" class="w3-modal" style="z-index:5 ; overflow: scroll; margin-left: 50px;">
                                    <div class="w3-modal-content w3-animate-bottom">
                                        <div class="w3-container w3-padding w3-orange w3-text-white">
                                        <span
                                            onclick="document.getElementById('<?php echo $appel->id; ?>').style.display='none'"
                                            class="w3-right w3-xxlarge w3-closebtn"><i class="fa fa-remove"></i></span>

                                            <h4><?php echo "Appel d'offre N° $appel->num" ?></h4></span>
                                        </div>
                                        <div class="w3-container">
                                           <?php echo $caracteristique['description'] ?>
                                        </div>


                                    </div>
                                </div>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $appel->num ?></td>
                                    <td><?php echo $appel->nom ?></td>
                                    <td><?php echo totalPage($appel->id); ?></td>
                                    <td><?php echo "$appel->nomregion $appel->ville $appel->quartier " ?></td>
                                    <td><?php echo $caracteristique['nombreExemplaire']; ?></td>
                                    <td><?php echo "Le ". date("d/m/y à H:i",strtotime($appel->dateL)) ?></td>
                                    <td class="text-center">
                                        <a id="<?php echo $appel->id ?>" class="btn btn-primary rounded bt-edit fa fa-plus" data-toggle="tooltip" data-placement="bottom" onclick="document.getElementById('<?php echo $appel->id; ?>').style.display='block'" title="Autre détails"></a>
                                        <a id="<?php echo $appel->id ?>"  class=" btn btn-success rounded bt-delete fa fa-file-pdf-o" data-toggle="tooltip" data-placement="bottom" title="Etablir un devis et envoyer" href="<?php echo base_url('secretariat/appelOffre/devis/'.$appel->id)?>"></a>
                                    </td>
                                </tr>
                                <?php

                                    ?>

                                <?php

                            }
                            ?>

                            </tbody>
                        </table>
                            </div>
                    </div>

                    <!-- /.box-body -->
                </div>
            </div>

        </div>


    </section>
</div>
<script>
    $(function(){
        $("table").DataTable( {
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value="">Afficher tout</option></select>')
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
        $("#critere").change(function(){
           var valeur =   $("#critere").val();
            $.post('<?php echo site_url('secretariat/appelOffre/changeCritere') ?>',{valeur:valeur},function(data){
                $("#display").html(data);
                $('table').dataTable();
            });

        });
    });
    <?php
    if($val = get_flash_data()){
            echo 'swal({   title: "Succes",   text: "'.$val.'",   type: "success"}, function(){   });';
            }
     ?>
</script>