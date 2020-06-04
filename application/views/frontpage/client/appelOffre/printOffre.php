
    <section class="slider">
        <div class="top-brands" >

            <h3 style="margin-top: -40px">Offres de l'appel d'offre N° <?php echo $info->num ?></h3><br>
            <div class="container-fluid table-responsive" style="background-color: white" >
               <br>
                <table class="table table-bordered table-striped table-hover table-responsive" width="100%" id="dataTable" cellspacing="0" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px;">
                    <tfoot style="display: table-header-group;">
                    <tr>
                        <th>Numéro Offre</th>
                        <th>Région provenance</th>
                        <th>Ville provenance</th>
                        <th>Quartier provenance</th>
                        <th>Prix Total </th>
                    </tr>
                    </tfoot>
                    <thead>
                    <tr>
                        <th>Numéro Offre</th>
                        <th>Région provenance</th>
                        <th>Ville provenance</th>
                        <th>Quartier provenance</th>
                        <th>Prix Total </th>
                        <th>Option</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $i = 0;
                    foreach($offres as $offre){
                        $i++
                        ?>
                        <tr>
                            <td><?php  echo "OFFRE ".$i; ?></td>
                            <td><?php echo $offre->nomregion ?></td>
                            <td><?php echo $offre->ville ?></td>
                            <td><?php echo $offre->quartier ?></td>
                            <td><b><?php echo $offre->prixTotal ?> FCFA</b></td>
                            <td>  <button type="button" class="but btn btn-primary" data-offre ="<?php echo $offre->id?>"  data-appelOffre="<?php echo $offre->appel_offre?>" data-secretariat="<?php echo $offre->secretariat ?>" data-appelO = "<?php echo $offre->idAppel ?>" data-prixT = "<?php echo $offre->prixTotal ?>">Plus de détails</button></td>

                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>


            </div>
            <!--<div class="container-fluid ">
                <div class="agile_top_brands_grids">
                <?php
                $i=0;

                foreach($offres as $offre){
                    $i++;
                    ?>
                        <div class="col-md-3 top_brand_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="tag"><img src=<?php echo img_url('tag.png');  ?> alt=" " class="img-responsive" /></div>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block" >
                                                <div class="snipcart-thumb">
                                                    <br><br><br>
                                                    <center>
                                                    <h3><?php  echo "OFFRE ".$i; ?></h3>
                                                    <p>Adresse de provenance: <b><?php echo "$offre->nomregion $offre->ville $offre->quartier" ?></b></p>
                                                    <p>Prix total: <b><?php echo $offre->prixTotal ?> FCFA</b> </p>

                                                    </center>
                                                </div>
                                                <div class="snipcart-details top_brand_home_details">
                                                    <button type="button" class="buttonm" data-offre ="<?php echo $offre->id?>"  data-appelOffre="<?php echo $offre->appel_offre?>" data-secretariat="<?php echo $offre->secretariat ?>" data-appelO = "<?php echo $offre->idAppel ?>" data-prixT = "<?php echo $offre->prixTotal ?>">Plus de détails</button>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>





                    <?php
                }
                ?>
                    <div class="clearfix"> </div>
                </div>
            </div>-->
            <div class="modal  fade" id="modal-defaut" >



                <!-- /.modal-dialog -->
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
        $(".but").click(function(){
            var offres = $(this).attr("data-offre");
            var offre = $(this).attr("data-appelOffre");
            var secretariat = $(this).attr("data-secretariat");
            var appelO = $(this).attr("data-appelO");
            var prixT = $(this).attr("data-prixT");
            $.post("<?php echo site_url('client/appel/displayDevis')?>",{offre:offre,secretariat:secretariat,appelO:appelO , prixT:prixT , offres:offres},function(data){
                $('#modal-defaut').html(data);
                $('#modal-defaut').modal('show');
            });


        });
        $(".payer").click(function(){
            $(this).text("Effectuez votre paiemnet");
            $(".modal-title").text("Paiement de la commande");
            $.post("<?php echo site_url('client/appel/paiement')?>",function(data){
                $('#modal-defaut').html(data);

            });
        });
        $('.tool').tooltip({
            "html" : true,
            "placement": "bottom",
            "trigger": "hover",
            "template": '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
        });
    });

</script>