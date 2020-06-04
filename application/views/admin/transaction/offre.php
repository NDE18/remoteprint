<!DOCTYPE html>
<html>
<head>
	
   <link rel="stylesheet" href="<?php  css_url('dataTables.bootstrap.min')?>">
</head>
<body>
  <style type="text/css">
  table {
		font-family: "Lato","sans-serif";	}		/* added custom font-family  */

	table caption {
		padding-bottom: 1em;		}

    table.five {
	border-collapse:collapse;
	display: inline-block;
	margin-right: 3em;		}


	table.five td {
	text-align: center;
	width: 16em;
	border: 0.15em #00ac24 dotted;
	padding: 1em;
	background-color: #b6ffc5; 	}


	table.five th {
	text-align: center;
	padding: 1em;
	border: 0.15em #00ac24 dotted;
	color: black;		}

	table.five tr {
	height: 1em;	}
  </style>
  <table class="five">
	<tr>
    <th class="text-center">#</th>
    <th>Nom secretariat </th>
    <th>Prix Total</th>
    <th>date d'etablissement</th>
    <th>telephone</th>
    <th>Remise</th>
  </tr>
  <?php
       //var_dump($appeloffre);
          if(isset($appeloffre) and count($appeloffre)>0)
          {
              $i=0;
              foreach($appeloffre as $liste)
              {
                  ?>

                  <?php
                  $caracteristique = json_decode($liste->caracteristique,true);
                  echo '<tr id="' . $liste->id . '"><td class="text-center">' . ++$i . '</td>';
                  echo '<td id="nom">' . $liste->nomsecretariat. '</td>';
                  echo '<td id="prenom">' . $liste->prixTotal. '</td>';
                  echo '<td id="nomregion">' . $liste->dateE. '</td>';
                  echo '<td id="nomregion">' . $liste->telephone. '</td>';
                  echo '<td>' .$caracteristique['remise'] . '</td>';
                  ?>
                  <?php echo "</tr>";
              }
          }
          else
          {
              echo '<tr><td colspan="5"  class="h5 text-center">Aucune offre pour le moment <td></tr>';
          }
          ?>
          </table>
        <script>
        <script src="<?php  js_url('datatables/jquery.dataTables')?>"></script>
      <script src="<?php  js_url('datatables/dataTables.bootstrap.min')?>"></script>
      </script>
      </body>
</html>
