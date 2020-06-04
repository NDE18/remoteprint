<?php

$carac_offre = json_decode($apercu->caracteristique,true);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Apercu du devis</h4>
        </div>
        <div class="modal-body">
            <div class="row" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 12px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Service concerné: <b><?php echo ucfirst($apercu->nom)?></b></label>

                    </div>
                    <div class="form-group">
                        <label>Date d'etablissement: </label>
                        <?php echo date("d/m/y à H:i",strtotime($apercu->dateE)); ?>
                    </div>
                    <div class="form-group">
                        <label>Adresse de provenance: </label>
                        <b><?php echo "$apercu->nomregion $apercu->ville $apercu->quartier" ?></b>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Petit Message : </label>
                        <?php if(isset($carac_offre['message'])) echo $carac_offre['message']; ?>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container-fluid" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 12px;">
                <div class="row table-responsive">
                    <table class="table table-bordered table-hover table-responsive" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 12px;">
                        <thead class="thead-primary">
                        <tr>
                            <th>Caractéristique : Option choisie</th>
                            <th>Nombre de pages</th>
                            <th>Nombre d'exemplaire</th>
                            <th>Prix unitaire</th>
                            <th>Prix total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        $i = 0;

                        $carac = json_decode($apercu->detailAppel,true);
                        $recuprix = json_decode($apercu->prix,true);
                        foreach($carac as $key=>$value) {
                            $i++;
                            $values = isset($recuprix[$i])? $recuprix[$i] : $recuprix[$i."allpage"];
                            $prix = $values * totalPage($apercu->idAppel) * $carac['nombreExemplaire'];
                            $prix2 = $values* 1 * $carac['nombreExemplaire'];
                            if(isset($recuprix[$i."allpage"])){
                                $total = $total + $prix;
                            }else{
                                $total = $total+$prix2;
                            }

                            if ($key != 'nombreExemplaire' && $key != 'description') {


                                ?>
                                <tr>
                                    <td><?php echo Ucfirst(getNom($key)) ?> :<b> <?php echo ucfirst($value);  ?></b></td>
                                    <td><?php echo totalPage($apercu->idAppel) ?></td>
                                    <th><?php echo $carac['nombreExemplaire'] ?></th>
                                    <td>
                                        <?php if((isset($recuprix[$i."allpage"]))){
                                            echo number_format($values, 2, ',', ' ').'<span class="text-primary small"><em> Appliqué à toutes les pages</em></span>';
                                        }else{
                                            echo number_format($values, 2, ',', ' ');
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo (isset($recuprix[$i."allpage"])) ? number_format($prix, 2, ',', ' ') : number_format($prix2, 2, ',', ' ') ?></td>

                                </tr>

                                <?php
                            }
                        }
                        if(isset($carac_offre['nbrechamp'])) {
                            for ($i = 0; $i < $carac_offre['nbrechamp']; $i++) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $carac_offre['descri' . $i] ?></td>
                                    <td><?php echo $carac_offre['nombrepage' . $i] ?></td>
                                    <td><?php echo $carac_offre['nombreExem' . $i] ?></td>
                                    <td><?php echo $carac_offre['prixU' . $i] ?></td>
                                    <td><?php echo $carac_offre['prixTotal' . $i] ?></td>
                                </tr>

                                <?php
                            }
                        }
                        ?>



                        </tbody>

                    </table>
                    <div class="col-md-5">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Total</h3>
                            </div>
                            <div class="box-body">
                                <label class="">Total + Frais Om: </label> <span class="pull-right"><?php  echo isset($carac_offre['remise'])? number_format($apercu->prixTotal+$carac_offre['remise']-$carac_offre['total_om'], 2, '.', '') : $apercu->prixTotal?></span>
                                <hr style="border: 0; height: 1px; background-color: #ced2de;">
                                <label class="">Frais OM et MOMO: </label> <span class="pull-right"><?php  echo $carac_offre['total_om']?></span>
                                <hr style="border: 0; height: 1px; background-color: #ced2de;">
                                <label class="pull-left">Remise: </label><span class="pull-right" ><?php echo isset($carac_offre['remise'])?number_format($carac_offre['remise'], 2, '.', '') : "0"?></span><br>
                                <hr style="border: 0; height: 1px; background-color: #ced2de;">
                                <label class="pull-left">Total TTC: </label><span class="pull-right" ><?php echo number_format($apercu->prixTotal, 2, '.', '')?></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-primary payer" data-offres="<?php echo $offres?>" data-offre="<?php echo $offre?>" data-secretariat="<?php echo $secre?>"  data-prixT = "<?php echo $prixT ?>" >Accepter</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<script>
    $(".payer").click(function(){
        var offres = $(this).attr("data-offres");
        var offre = $(this).attr("data-offre");
        var secretariat = $(this).attr("data-secretariat");
        var prixT = $(this).attr("data-prixT");

        $.post("<?php echo site_url('client/appel/paiement')?>",{offre:offre,secretariat:secretariat, prixT:prixT,offres:offres},function(data){
            $('.modal-dialog').html(data);

        });
    });
</script>
