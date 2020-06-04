<?php
$i=0;
foreach($service as $appel){
    $i++;
?>
    <tr>
        <td class="bg-success"><?php echo $i;?></td>
        <td><?php echo $appel->nomservice ?></td>
        <td><?php echo $appel->description  ?></td>
        <td><?php echo $appel->image  ?></td>
        <td><?php echo $appel->nom  ?></td>
        <td><?php echo $appel->detail  ?></td>
        </td>
        <td class="text-center">
          <?php if($appel->statut == 0){ ?>
          <a href="#" onclick="document.getElementById('<?php  echo $appel->identifiant;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
             <button class="btn btn-warning btn-xs lock" id="<?php  echo $appel->identifiant;?>"><i class="fa fa-trash-o "></i>Bloquer</button>
          </a>
          <a title="Activer"  class = "activer  vali_'.$appel->id.'" id="'.$appele->id.'">
          <button class="btn btn-primary btn-xs" onclick="document.getElementById($appel->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>
          <?php } ?>
            <?php if($appel->statut == -1){ ?>
              <a href="#" onclick="document.getElementById('<?php  echo $appel->identifiant;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                 <button class="btn btn-warning btn-xs open" id="<?php  echo $appel->identifiant;?>"><i class="fa fa-trash-o "></i>Debloquer</button>
              </a>
              <a title="Activer"  class = "activer  vali_'.$appel->id.'" id="'.$appele->id.'">
              <button class="btn btn-primary btn-xs" onclick="document.getElementById($appel->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>
        <?php } ?>
        </td>
    </tr>
    <?php

    ?>

    <?php

}
?>
