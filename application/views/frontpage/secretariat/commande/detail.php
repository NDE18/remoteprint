<?php

$carac_offre = json_decode($apercuSec->caracteristique,true);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <b><h2 class="modal-title text-success">Détails de la commande Cmd<?php echo $apercuSec->num ?></h2></b>
        </div>
        <div class="modal-body">

            <div class="row" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 12px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Service concerné: <b><?php echo ucfirst($apercuSec->nom)?></b></label>

                    </div>
                    <div class="form-group">
                        <label>Date d'etablissement: </label>
                        <?php echo date("d/m/y à H:i",strtotime($apercuSec->dateE)); ?>
                    </div>
                    <div class="form-group">
                        <label>Adresse de provenance: </label>
                        <b><?php echo "$apercuSec->nomregion $apercuSec->ville $apercuSec->quartier" ?></b>
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
                    <table class="table table-bordered table-hover table-responsive" >
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

                        $carac = json_decode($apercuSec->detailAppel,true);
                        $recuprix = json_decode($apercuSec->prix,true);
                        foreach($carac as $key=>$value) {
                            $i++;
                            $values = isset($recuprix[$i])? $recuprix[$i] : $recuprix[$i."allpage"];
                            $prix = $values * totalPage($apercuSec->idAppel) * $carac['nombreExemplaire'];
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
                                    <td><?php echo totalPage($apercuSec->idAppel) ?></td>
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
                                <label class="">Total HT: </label> <span class="pull-right"><?php  echo isset($carac_offre['remise'])? number_format(intval($apercuSec->prixTotal)+intval($carac_offre['remise'])-intval($carac_offre['total_om']), 2, '.', '') : number_format(intval($apercuSec->prixTotal)-intval($carac_offre['total_om']), 2, '.', '')?></span>
                                <hr style="border: 0; height: 1px; background-color: #ced2de;">
                                <label class="">Frais OM et MOMO: </label> <span class="pull-right"><?php  echo $carac_offre['total_om']?></span>
                                <hr style="border: 0; height: 1px; background-color: #ced2de;">
                                <label class="pull-left">Remise: </label><span class="pull-right" ><?php echo isset($carac_offre['remise'])?number_format($carac_offre['remise'], 2, '.', '') : "0"?></span><br>
                                <hr style="border: 0; height: 1px; background-color: #ced2de;">
                                <label class="pull-left">Total TTC: </label><span class="pull-right" ><?php echo number_format($apercuSec->prixTotal, 2, '.', '')?></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>

