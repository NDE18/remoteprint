<?php
$i=0;
if(isset($appels) and count($appels)>0)
{
foreach($appels as $appel){
    $i++;
    $caracteristique = json_decode($appel->caracteristique,true);
    //var_dump($caracteristique);
    ?>
    <!--<div id="<?php echo $appel->id; ?>" class="w3-modal" style="z-index:5 ; overflow: scroll">
        <div class="w3-modal-content w3-animate-left">
            <div class="w3-container w3-padding w3-orange w3-text-white">
                                        <span
                                            onclick="document.getElementById('<?php echo $appel->id; ?>').style.display='none'"
                                            class="w3-right w3-xxlarge w3-closebtn"><i class="fa fa-remove"></i></span>

                <h4><?php echo "Appel d'offre N° $appel->num" ?></h4></span>
            </div>
            <div class="w3-container">
                <?php //echo $caracteristique['description'] ?>
            </div>


        </div>
    </div>-->
    <tr>
        <td class="bg-success"><?php echo $i;?></td>
        <td><?php echo $appel->num ?></td>
        <td><?php echo $appel->nom ?></td>
        <td><?php echo $appel->nomuser //echo totalPage($appel->id); ?></td>
        <td><?php echo "Le ". date("d/m/y à H:i",strtotime($appel->dateL)) ?>
        </td><?php
        if(empty($caracteristique['nombreExemplaire']))
                          echo '<td >' ."aucun". '</td>';
                          else
                             echo '<td >' . $caracteristique['nombreExemplaire']. '</td>';?>
       <?php if(empty($appel->offre))
                             echo '<td >' ."aucune". '</td>';
                             else
                                echo '<td >' . count($appel->offre). '</td>'; ?>
        <td class="text-center">
          <a href="#" onclick="document.getElementById('<?php  echo $appel->id;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
             <button class="btn btn-warning btn-xs lock" id="<?php  echo $appel->id;?>"><i class="fa fa-trash-o "></i>Bloquer</button>
          </a>
            <?php if($option == 0){ ?>
              <a title="Activer"  class = "activer  vali_'.$liste->id.'" id="'.$appel->id.'">
              <button class="btn btn-primary btn-xs" onclick="document.getElementById($appel->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a> <?php } else{ ?>
                <a href="#" onclick="loadDynamicContentModal('<?php  echo $appel->id;?>')" class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                   <button class="btn btn-primary btn-xs detail"  data-toggle="modal"  data-target="#myModal" id="<?php  echo $appel->id;?>"><i class="fa fa-eye" aria-hidden="true"></i>Detail</button>
                 </a>
        <?php } ?>
        </td>
    </tr>
    <?php

    ?>

    <?php

}
}
else
{
    echo '<tr><td colspan="6"  class="h3 text-center">Aucune pour le moment <td></tr>';
}
?>
