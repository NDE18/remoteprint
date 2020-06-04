<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Liste des commandes

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Commandes</li>
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
            <div class="modal  fade" id="modal-defaut">
            </div>
            <div class="box box-default">

                <div class="box-body">

                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <br>
                            <table class="table table-bordered table-hover table-responsive" width="100%" id="dataTable" cellspacing="0">
                                <tfoot style="display: table-header-group;">
                                <tr>
                                    <th>#</th>
                                    <th>Numero de la commande</th>
                                    <th>Service concerné</th>
                                    <th>A terminer avant le</th>
                                    <th>Etat</th>

                                </tr>
                                </tfoot>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Numero de la commande</th>
                                    <th>Service concerné</th>
                                    <th>A terminer avant le</th>
                                    <th>Etat</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody id="display">

                                <?php
                                $i = 0;

                                foreach($commandes as $commande){
                                    $i ++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo "Cmd$commande->num" ?></td>
                                        <td><?php echo $commande->nom ?></td>
                                        <td><?php echo addDays($commande->dateValidation,null,null,3)->format('d-m-Y'); ?></td>
                                        <td class="<?php echo ($commande->statut == 1)?"text-danger":"text-success" ?>">

                                            <?php if($commande->statut == OFFRECHOISIE){
                                                echo "En cours de traitement...";
                                            }elseif($commande->statut == OFFREIMPRIMEE){
                                                echo "Imprimé";
                                            }else{
                                                echo "Imprimé et récupéré par le proprietaire";
                                            }?>
                                        </td>
                                        <td class="text-center">
                                            <a id="<?php echo $commande->idAppel ?>" class="btn btn-primary rounded tool fa fa-plus details" data-toggle="tooltip" data-placement="bottom"  title="Autre détails"></a>
                                            <?php  if($commande->statut == OFFRECHOISIE){
                                                ?>
                                                <a id="<?php echo $commande->id ?>" target="_blank" href="<?php echo base_url('secretariat/commande/telechargerDoc/'.$commande->idAppel)?>" class="btn btn-success rounded tool fa fa-download" data-toggle="tooltip" data-placement="bottom"  title="Télécharger les fichiers"></a>
                                                <a id="<?php echo $commande->id ?>"  class="btn btn-danger rounded tool fa fa-stop stop" data-toggle="tooltip" data-placement="bottom" title="Terminer la commande" ></a>
                                                <?php
                                            }elseif($commande->statut == OFFREIMPRIMEE){
                                                ?>
                                                <a id="<?php echo $commande->id ?>" class="btn btn-success rounded tool fa fa-user client" data-toggle="tooltip" data-placement="bottom"  title="Informations du client"></a>
                                                <a id="<?php echo $commande->id ?>"  class="btn btn-danger rounded tool fa fa-bus recuperer" data-toggle="tooltip" data-placement="bottom" title="Le client a recupéré sa commande" ></a>

                                                <?php
                                            }else{
                                                ?>
                                                <a id="<?php echo $commande->id ?>" target="_blank" href="<?php echo base_url('secretariat/commande/telechargerRecu/'.$commande->idAppel).'.html'?>" class="btn btn-success rounded tool fa fa-print imprimer" data-toggle="tooltip" data-placement="bottom" title="Imprimer le recu" ></a>
                                                <?php
                                            }?>

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
        $('.tool').tooltip({
            "html" : true,
            "placement": "bottom",
            "trigger": "hover",
            "template": '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
        });
        $(".stop").click(function(){
            var id =   $(this).attr('id');
            swal({
                title: "Confirmation",
                text: "Etes vous sur d'avoir terminé l'impression?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Oui!",
                closeOnConfirm: false
            },function(){
                $.post('<?php echo site_url('secretariat/commande/updateImpression')?>',{id:id},function(data){
                   window.location = '<?php echo site_url('secretariat/commande/liste')?>' ;
                });
            });


        });
        $(".details").click(function(){
            var offre = $(this).attr("id");
            $.post("<?php echo site_url('secretariat/commande/detail')?>",{Aoffre:offre},function(data){
                $('#modal-defaut').html(data);
                $('#modal-defaut').modal('show');
            });


        });
        $(".client").click(function(){
            var offre = $(this).attr("id");
            $.post("<?php echo site_url('secretariat/commande/detailClient')?>",{offre:offre},function(data){
                $('#modal-defaut').html(data);
                $('#modal-defaut').modal('show');
            });


        });
        $(".recuperer").click(function(){
            var id =   $(this).attr('id');
            swal({
                title: "Confirmation",
                text: "Etes vous sur que le client a récupéré sa commande?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Oui!",
                closeOnConfirm: false
            },function(){
                $.post('<?php echo site_url('secretariat/commande/updateRecuperer')?>',{id:id},function(data){
                    window.location = '<?php echo site_url('secretariat/commande/liste')?>' ;
                });
            });
        });
    });

</script>