<!DOCTYPE html>
<html>
<head>
	<title></title>
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
    <th>Nom client </th>
    <th>Numéro Appeloffre</th>
    <th>Motifs contentieux</th>
    <th>Message</th>
    <th>Secretariat</th>
    <th>Prix à payer</th>
    <th>Date recuperation</th>
  </tr>
  <?php
      // var_dump($appeloffre);
          if(isset($appeloffre) and count($appeloffre)>0)
          {
              $i=0;
              foreach($appeloffre as $liste)
              {
                  ?>

                  <?php
                  $caracteristique = json_decode($liste->caracteristique,true);
                  echo '<tr id="' . $liste->id . '"><td class="text-center">' . ++$i . '</td>';
                  echo '<td id="nom">' . $liste->nom. '</td>';
                  echo '<td >' . $liste->num. '</td>';
                  echo '<td >' . $liste->objet. '</td>';
                  echo '<td >' . $liste->detail. '</td>';
                  echo '<td id="nomregion">' . $liste->nomsecretariat. '</td>';
                  echo '<td >' . $liste->prixTotal. '</td>';
                  echo '<td id="nomregion">' . $liste->dateRecuperation. '</td>';
                  
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
      </body>
</html>
