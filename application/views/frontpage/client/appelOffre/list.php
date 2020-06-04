<script>
    <?php
    if($val = get_flash_data()){
            echo 'swal({   title: "'.$val[2].'",   text: "'.$val[0].'",   type: "'.$val[1].'"}, function(){   });';
            }
     ?>
</script>

    <section class="slider" >
        <div class="top-brands"  >

            <h3 style="margin-top: -40px">Mes appels d'offre</h3><br>

            <div class="container-fluid table-responsive" style="background-color: white">
            <br>
                <table class="table table-bordered  table-striped table-primary table-hover table-responsive" width="100%" id="dataTable" cellspacing="0" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px;">
                    <tfoot style="display: table-header-group;">
                    <tr>

                        <th>Numéro appel offre</th>
                        <th>Service concerné</th>
                        <th>Date lancement</th>
                        <th>Nombre de réponses</th>
                    </tr>
                    </tfoot>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Numéro appel offre</th>
                        <th>Service concerné</th>
                        <th>Date lancement</th>
                        <th>Nombre de réponses</th>
                        <th>Option</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i = 0;
                    foreach($appels as $appel){
                        $i++
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $appel->num ?></td>
                            <td><?php echo ucfirst($appel->nom) ?></td>
                            <td><?php echo "Le ". date("d/m/y à H:i",strtotime($appel->dateL)) ?></td>
                            <td><?php echo nombreReponses($appel->id); ?></td>
                            <td><a id="<?php echo $appel->id ?>"  class="btn btn-danger rounded bt-delete tool" data-placement="bottom" title="Voir les offres correspondantes" href="<?php echo base_url('client/appel/printOffre/'.$appel->id)?>"><i class="fa fa-eye"></i> </a></td>

                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>


            </div>


        </div></section>
    <!-- //flexSlider -->

<script>
    $(function(){
        $("table").DataTable( {
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value="">Afficher Tout</option></select>')
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
        $('.tool').tooltip({
            "html" : true,
            "placement": "bottom",
            "trigger": "hover",
            "template": '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
        });
    });

</script>