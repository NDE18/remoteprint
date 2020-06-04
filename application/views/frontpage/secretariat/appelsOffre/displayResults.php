<?php
$i=0;
foreach($appels as $appel){
    $i++;
    $caracteristique = json_decode($appel->caracteristique,true);
    ?>
    <div id="<?php echo $appel->id; ?>" class="w3-modal"  style="z-index:5 ; overflow: scroll; margin-left: 50px;">
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
        <td class="bg-success"><?php echo $i;?></td>
        <td><?php echo $appel->num ?></td>
        <td><?php echo $appel->nom ?></td>
        <td><?php echo totalPage($appel->id); ?></td>
        <td><?php echo "$appel->nomregion $appel->ville $appel->quartier " ?></td>
        <td><?php echo $caracteristique['nombreExemplaire']; ?></td>
        <td><?php echo "Le ". date("d/m/y à H:i",strtotime($appel->dateL)) ?></td>
        <td class="text-center">
            <a id="<?php echo $appel->id ?>" class="btn btn-primary rounded bt-edit fa fa-plus" data-toggle="tooltip" data-placement="bottom" onclick="document.getElementById('<?php echo $appel->id; ?>').style.display='block'" title="Autre détails"></a>
            <?php if($option == 0){ ?>
            <a id="<?php echo $appel->id ?>"  class=" btn btn-success rounded bt-delete fa fa-file-pdf-o" data-toggle="tooltip" data-placement="bottom" title="Etablir un devis et envoyer" href="<?php echo base_url('secretariat/appelOffre/devis/'.$appel->id)?>"></a>
           <?php } else{ ?>
            <a id="<?php echo $appel->id ?>"  class=" btn btn-warning rounded bt-delete fa fa-eye" data-toggle="tooltip" data-placement="bottom" title="Voir le devis" href="<?php echo base_url('secretariat/appelOffre/apercuDevis/'.$appel->id)?>"></a>
        <?php } ?>
        </td>
    </tr>
    <?php

    ?>

    <?php

}
?>

