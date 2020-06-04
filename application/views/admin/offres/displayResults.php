<?php
$i=0;

if(isset($appels) and count($appels)>0)
{
$i=0;
foreach($appels as $appel){
    $i++;
    $caracteristique = json_decode($appel->caracteristique,true);
    //var_dump($caracteristique);
    ?>
    
    <tr>
       
        <?php
                            $d2=new datetime($appel->dateRecuperation);
                            $d1=new datetime($appel->dateValidation);
                            $d3=$d1->diff($d2);
                            //var_dump($caracteristique);
                            echo '<tr id="' . $appel->id . '"><td class="bg-success text-center">' . $i . '</td>';
                            echo '<td id="nom">' . $appel->num. '</td>';
                            echo '<td >' . $appel->nomservice. '</td>';
                            echo '<td id="prenom">' . $appel->nomsecretariat. '</td>';
                            echo '<td id="nomregion">' . $appel->numeroClient. '</td>';
                            echo '<td bgcolor="red" id="ville">' . $d3->format('%d')." jours"." ".$d3->format('%m')." mois". '</td>';
                             if(empty($appel->intitule))
                             echo '<td bgcolor="red">' ."pas encore effectué ". '</td>';
                             else
                                echo '<td bgcolor="red">' . $appel->intitule. '</td>';
                            ?>
        <td class="text-center">
          <a href="#" onclick="document.getElementById('<?php  echo $appel->id;?>')"class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
             <button class="btn btn-warning btn-xs lock" id="<?php  echo $appel->id;?>"><i class="fa fa-trash-o "></i>Bloquer</button>
          </a>
            <?php if($option == 0){ ?>
              <a title="Activer"  class = "activer  vali_'.$appel->id.'" id="'.$appel->id.'">
              <button class="btn btn-primary btn-xs" onclick="document.getElementById($appel->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a> <?php } else{ ?>
                <a href="#"  class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                   <button class="btn btn-primary btn-xs detail"  data-toggle="modal"  data-target="#myModal" id="<?php  echo $appel->id;?>"><i class="fa fa-eye" aria-hidden="true"></i>Detail</button>
                 </a>
        <?php }  ?>
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
