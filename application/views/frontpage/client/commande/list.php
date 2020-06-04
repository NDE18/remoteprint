<script>
    <?php
    if($val = get_flash_data()){
            echo 'swal({   title: "Succes",   text: "'.$val.'",   type: "success"}, function(){   });';
            }
     ?>
</script>


    <section class="slider">
        <div class="top-brands"  >
            <div class="modal  fade" id="modal-defaut">
            </div>

            <h3 style="margin-top: -40px">Apercu de mes commandes</h3><br>

            <div class="container-fluid table-responsive" style="background-color: white">
                <br>
                <table class="table table-bordered table-hover table-striped table-responsive" width="100%" id="dataTable" cellspacing="0" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px;">
                    <tfoot style="display: table-header-group;">
                    <tr>
                        <th>#</th>
                        <th>Numéro commande</th>
                        <th>Service concerné</th>
                        <th>Date déclenchement</th>
                        <th>Etat de la commande</th>

                    </tr>
                    </tfoot>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Numéro commande</th>
                        <th>Service concerné</th>
                        <th>Date déclenchement</th>
                        <th>Etat de la commande</th>
                        <th>Options</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i = 0;
                    foreach($cmds as $appel){
                        $i++
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo "Cmd".$appel->num ?></td>
                            <td><?php echo ucfirst($appel->nom) ?></td>
                            <td><?php echo "Le ". date("d/m/y à H:i",strtotime($appel->dateChoisi)) ?></td>
                            <td class="
                            <?php
                            if($appel->payer == OFFREIMPAYEE){
                                    echo "text-warning";
                                }elseif($appel->payer == CODEINCORRECT){
                                echo "text-danger";
                                }else{
                                    if($appel->statut == OFFRECHOISIE){
                                        echo "text-primary";
                                    }elseif($appel->statut == OFFREIMPRIMEE || $appel->statut == OFFRERECUPEREE){
                                       echo "text-success";
                                    }
                                }
                            ?>
                            ">
                                <?php
                                if($appel->payer == OFFREIMPAYEE){
                                    echo "En attente de confirmation de paiement";
                                }elseif($appel->payer == CODEINCORRECT){
                                    echo "Code de transaction incorrect";
                                }else{
                                    if($appel->statut == OFFRECHOISIE){
                                        echo "En cours d'impression";
                                    }elseif($appel->statut == OFFREIMPRIMEE){
                                        echo "Impression terminée";
                                    }else{
                                        echo "Impression terminée et récupérée";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a id="<?php echo $appel->appel_offre?>"  data-secre = "<?php echo $appel->secretariat?>" class="btn btn-primary rounded  tool plusDetail" data-placement="bottom" title="Plus de détail"><i class="fa fa-plus"></i> </a>
                                <?php
                                if($appel->payer == OFFREIMPAYEE){
                                    echo "";
                                }elseif($appel->payer == CODEINCORRECT){
                                    ?>
                                    <a id="<?php echo $appel->id ?>"  class="btn btn-warning rounded  tool edittransac" data-placement="bottom" title="Veuillez ressaisir le numero de transaction"><i class="fa fa-edit"></i> </a>
                                    <?php

                                }else{
                                    if($appel->statut == OFFRECHOISIE){
                                        echo "";
                                    }elseif($appel->statut == OFFREIMPRIMEE){
                                        ?>
                                        <a id="<?php echo $appel->id ?>"  class="btn btn-success rounded  tool detailSecre" data-placement="bottom" title="Entrer en contact avec le secretariat"><i class="fa fa-user"></i> </a>
                                        <?php
                                    }elseif($appel->statut == OFFRERECUPEREE){
                                        ?>
                                        <?php
                                        $s = strtotime(moment()->format('Y-m-d H:i:s'))-strtotime($appel->dateRecuperation);
                                        $d = intval($s/86400);
                                        if($d <= 7) {
                                            ?>
                                            <a id="<?php echo $appel->id ?>" class="btn btn-danger rounded  tool contencieux"
                                               data-placement="bottom" title="Ouvrir un contencieux"><i
                                                    class="fa fa-file-pdf-o"></i> </a>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </td>

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
        $(".edittransac").click(function(){
            var offre = $(this).attr("id");
            $.post("<?php echo site_url('client/commande/edittransac')?>",{offre:offre},function(data){
                $('#modal-defaut').html(data);
                $('#modal-defaut').modal('show');
            });
        });
        $(".contencieux").click(function(){
            var offre = $(this).attr("id");
            $.post("<?php echo site_url('client/commande/contencieux')?>",{offre:offre},function(data){
                $('#modal-defaut').html(data);
                $('#modal-defaut').modal('show');
            });
        });
        $(".detailSecre").click(function(){
            var offre = $(this).attr('id');
            $.post("<?php echo site_url('client/commande/detailSecre')?>",{offre:offre},function(data){
                $('#modal-defaut').html(data);
                $('#modal-defaut').modal('show');
            });

        });
        $(".plusDetail").click(function(){

            var offres =0;
            var offre = $(this).attr("id");
            var secretariat = $(this).attr("data-secre");
            var appelO = 0;
            var prixT =0;
            $.post("<?php echo site_url('client/appel/detail')?>",{offre:offre,secretariat:secretariat,appelO:appelO , prixT:prixT , offres:offres},function(data){
                $('#modal-defaut').html(data);
                $('#modal-defaut').modal('show');
            });


        });

    });

</script>