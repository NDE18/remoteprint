<?php

$carac_offre = json_decode($apercu->caracteristique,true);
?>
<style>
    <!--

    table{
        margin: auto;
    }
    *{
        font-size: 14px;
        font-family: arial, sans-serif;
    }
    .titre{
        font-size: 26px;
    }.titre2{
         font-size: 18px;
     }
    .footer td{
        padding: 10px;
    }
    .content td{
        padding: 5px;
    }
    small,.small{
        font-size: 12px;
    }

    .bold{
        font-weight: bold;
    }
    .content{
        border-collapse: collapse;
    }
    .content td{
        border-collapse: collapse;

        border: 1px solid #6b6d6e;
    }.content th{
         border-collapse: collapse;

         border: 1px solid #6b6d6e;
     }
    .nb{
        border: none;
    }
    .nb-t{
        border-top: none;
    }
    .nb-b{
        border-bottom: none;
    }
    .nb-l{
        border-left: none;
    }
    #fournisseur{
        border:  solid 1px black;
        border-radius: 12px;
        padding: 10px;
    }
    .nb-r{border-right: none}
    -->
</style>
<page format="A4" orientation="P" backtop="8mm" backleft="8mm" backright="8mm" backbottom="8mm">
    <page_footer>
        <table class="page_footer" style="width: 100%;">
            <tr>
                <td class="" align="left" style="width: 50%;">
                    <?php
                    echo "REMOTE-PRINT"."\n";
                    ?>
                </td>
                <td class="" align="right" style="width: 50%;">
                    <p class="bold">
                        page [[page_cu]]/[[page_nb]]
                    </p>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="2mm" style="width:100%;">
        <tr>
            <td style="width: 15%;vertical-align:top; " align="">
                <img src="<?php echo img_url('REAL_2.png')?>" height="110" />
            </td>

            <td align="left" style="width:45%;">
                <b class="titre">Votre commande<br></b><br>
                Nom:  <?php echo ucfirst($apercu->nomuser) ?><br><br>
                Référence : <?php echo $apercu->num ?><br><br>
                Date établissement: <?php echo moment()->format('d-m-Y') ?><br><br>
                Prix Total : <?php echo number_format($apercu->prixTotal, 2, '.', '')?>
                <br><br>
                <div id="fournisseur" style="">
                    <barcode  value="<?php echo $apercu->num ?>" style="width:95%; height:8mm; color: #000;"></barcode>
                    <br><br>
                    Imprimé par<br>
                    <?php echo ucfirst(session_data('secName'));?><br>
                    <?php echo ucfirst(session_data('secTel'));?>
                </div>
            </td>

        </tr>
    </table>



    <br><br><br><br>

    <table class="content" cellspacing="2mm" style="width:100%;">
        <thead>
        <tr style="background: lightgrey;">
            <th style="width: 35%">Caractéristique : Option choisie</th>
            <th style="width: 10%">Nombre de pages</th>
            <th style="width: 10%">Nombre d'exemplaire</th>
            <th style="width: 15%">Prix unitaire</th>
            <th style="width: 15%">Prix total</th>

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
                    <td style="vertical-align: middle;padding: 6px"><?php echo Ucfirst(getNom($key)) ?> :<b> <?php echo ucfirst($value);  ?></b></td>
                    <td style="vertical-align: middle;padding: 6px"><?php echo totalPage($apercu->idAppel) ?></td>
                    <th style="vertical-align: middle;padding: 6px"><?php echo $carac['nombreExemplaire'] ?></th>
                    <td style="vertical-align: middle;padding: 6px">
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
                    <td style="vertical-align: middle;padding: 6px"><?php echo $carac_offre['descri' . $i] ?></td>
                    <td style="vertical-align: middle;padding: 6px"><?php echo $carac_offre['nombrepage' . $i] ?></td>
                    <td style="vertical-align: middle;padding: 6px"><?php echo $carac_offre['nombreExem' . $i] ?></td>
                    <td style="vertical-align: middle;padding: 6px"><?php echo $carac_offre['prixU' . $i] ?></td>
                    <td style="vertical-align: middle;padding: 6px"><?php echo $carac_offre['prixTotal' . $i] ?></td>
                </tr>

                <?php
            }
        }
        ?>
        </tbody>


    </table>


</page>