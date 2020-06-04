
  <!DOCTYPE html>
<html>
<head>
	<title>LISTES DES UTILISATEURS</title>
	
</head>
<body>	
	<style>

    table {

        width: 100%;
        font-size: 9pt;
        font-family: helvetica;
        line-height: 6mm;

        border-collapse: collapse;

    }
   
    table.borderedBlack th{
        border: 1px solid black;
        padding: 1mm 1mm;
        background-color: white;
        color: black;
    }

    table.borderedBlack td {
        border: 1px solid black;
        padding: 2mm 3mm;
    }



</style>

<div class="container-fluid">
<br><br><br>
    <table>
        <tr>
            <td class='text-center' style='width: 100%;'>
                <h3 style="color : mediumslateblue ; font-family: Helvetica; text-align:center; margin-top: -60px">LISTES DES UTILISATEURS DE LA PLATEFORME REMOTE-PRINT </h3>
            </td>
        </tr>

    </table>
<table class="borderedBlack">
<thead>
    <tr>
        <th >#</th>
        <th >Noms</th>
        <th >Prenoms</th>
        <th >Email</th>
        <th >Telephone</th>
    </tr>
    </thead>
    <tbody>
 
  <?php

        if(isset($client) and count($client)>0)
            {
                $i=0;
                foreach($client as $liste)
            {
                            ?>
                             <tr>
                            <td ><?php echo ++$i ;?></td>
                            <td><?php echo $liste->nom ;?></td>
                            <td><?php echo $liste->prenom; ?></td>
                            <td><?php echo $liste->mail;?></td>
                            <td><?php echo $liste->telephone ?></td> 
                            </tr>
                <?php
             }

        }
    ?>
 
  </tbody>
</table>
</div>
</body>
</html>


