<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-money" aria-hidden="true"></i>
Traitement  des Contentieux
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Contentieux</a></li>
        <li class="active">Traitement </li>
      </ol>
      <br>
      <br>
      <div class="box-header">

                 <br>
         </div>
    </section>
        <br>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <?php //var_dump($contentieux) ;?>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="row">
        <?php foreach($contentieux as $liste) {  ?>
  <div class="col-sm-4"><div class="panel panel-primary">
      <div class="panel-heading">Commande du client <?php echo $liste->nom ?> </div>
      <div class="panel-body">
      <?php  
      $caracteristique = json_decode($liste->caracteristique,true);
      if(empty($caracteristique['nombreExemplaire']))
      echo '<td >' ."exemplaire aucun". '</td>';
      else
         echo '<td>Nombre d exemplaire de la commande :  ' . $caracteristique['nombreExemplaire']. '</td><br><br>';
         if(empty($caracteristique['description']))
      echo '<td >' ." aucune". '</td>';
      else
         echo '<td>Description de la commande :  ' . $caracteristique['description']. '</td>';
         if(empty($caracteristique['1']))
      echo '<td >' ." type de format non identifie". '</td><br><br>';
      else
         echo '<td>Type de Format :  ' . $caracteristique['1']. '</td><br><br>';
         if(empty($caracteristique['2']))
      echo '<td >' ." type d impression non identifie". '</td><br><br>';
      else
         echo '<td>Type d impression :  ' . $caracteristique['2']. '</td><br><br>';
        if(empty($caracteristique['3']))
      echo '<td >' ." type de cadrage non identifie". '</td><br><br>';
      else
         echo '<td>Type de cadrage :  ' . $caracteristique['3']. '</td><br><br>';
         if(empty($caracteristique['4']))
      echo '<td >' ." valeur que je connais pas". '</td><br><br>';
      else
         echo '<td>valeur :  ' . $caracteristique['4']. '</td><br><br>';
         if(empty($caracteristique['5']))
      echo '<td >' ." type de papier non definie". '</td><br><br>';
      else
         echo '<td>type de papier :  ' . $caracteristique['5']. '</td><br><br>';
      ?>
      </div>
    </div>
    </div>
  <div class="col-sm-4"><div class="panel panel-primary">
      <div class="panel-heading">Reclamation du client <?php echo $liste->nom ?></div>
      <div class="panel-body">
      <?php
       echo '<td>Objet de la reclamation :  ' . $liste->objet. '</td><br><br>';
       echo '<td>detail de la reclamation :  ' . $liste->detail. '</td><br><br>';
       echo '<td>date de debut de la reclamation :  ' . $liste->datedebut. '</td><br><br>';
      ?>
      </div>
    </div>
    </div>
  <div class="col-sm-4"><div class="panel panel-primary">
      <div class="panel-heading">service offre par le secretariat <?php echo $liste->nomsecretariat ?> </div>
      <div class="panel-body">
      <?php
      $caracteristique = json_decode($liste->offrecarac,true);
         echo '<td>Date de choix de l offre :  ' . $liste->dateChoisi. '</td><br><br>';
         if(empty($caracteristique['total_om']))
         echo '<td >' ."valeur non definie". '</td><br><br>';
         else
            echo '<td>valeur :  ' . $caracteristique['total_om']. '</td><br><br>';
            if(empty($caracteristique['remise']))
         echo '<td >' ."pas de remise". '</td><br><br>';
         else
            echo '<td>remise :  ' . $caracteristique['remise']. '</td><br><br>';
            if(empty($caracteristique['message']))
            echo '<td >' ."pas de message". '</td><br><br>';
            else
               echo '<td>remise :  ' . $caracteristique['message']. '</td><br><br>';
               echo '<td>Telephone du secretariat :  ' . $liste->phonesecre. '</td><br><br>';
         ?>
      </div>
    </div>
    </div>
        
        
</div>
<div class="row">
<form action="<?php echo site_url('admin/Contentieux/message')?>" method="post">
        <div class="col-md-2">
        <input class="form-control"  type="hidden" name="contentieux" value="<?php echo $_GET['id']; ?>">
        <label class="radio-inline">
        <input type="checkbox" name="client" value="<?php echo $liste->id ?>">Client
        </label>
        </div>
        <div class="col-md-8">
        <div class="panel panel-primary">
      <div class="panel-heading">Ecrire un message </div></div>
        <textarea rows="" cols=""  id="condition" name="condition"></textarea><br>
        </div>
        <div class="col-md-2">
        <label class="radio-inline"><input type="checkbox" name="secretariat" value="<?php echo $liste->idsecretariat ?>">Secretariat</label>
        </div>
        
        </div>
        <div class="row"><div class="col-md-4"></div>
        <div class="col-md-4"><button type="submit" id="valider" class="btn btn-primary">Enregistrer</button></div>
        <div class="col-md-4"></div>
        </div>
        </from>
        <!-- /.box-body -->
      </div>
      <?php } ?>
      <!-- /.box -->
    </div>

    </div>
    </div>
    </div>
    </section>
    </div>
    <!-- Modal -->
    <!-- modal add end -->
        <!-- /.container-fluid -->


<script src="<?php echo  js_url('ckeditor/ckeditor'); ?>"></script>
<script type="text/javascript">
CKEDITOR.replace('condition');
  $('select[name="service"]').on('change', function() {
        var stateID = $(this).val();
       if(stateID) {
        $.ajax(
        {url: 'Contentieux/myformAjax/'+stateID,
        type: "GET",
        dataType: "json",

        success:function(data) {

        //$('select[name="ville"]').empty();
        //$('div[name="info"]').append('<div class="col-sm-4"> <div class="panel panel-primary"><div class="panel-heading">Information initiale</div> <div class="panel-body">Information initiale</div></div>  </div> <div class="col-sm-4"> <div class="panel panel-primary"><div class="panel-heading">Revendication du client</div><div class="panel-body">Revendication du client</div></div></div><div class="col-sm-4"> <div class="panel panel-primary"><div class="panel-heading">Confirmation de l administrateur et mesure adopté</div><div class="panel-body">Confirmation de l administrateur et mesure adopté</div></div></div>');
              
      $.each(data, function(key, value) {
        alert(value.id);
                if(data==null)
                {
                  
                  $('div[name="info"]').empty();
                }
                else {
                 $('div[name="info"]').append('<div class="col-sm-4"> <div class="panel panel-primary"><div class="panel-heading">Information initiale</div> <div class="panel-body">'+ value.objet +'<br><br>'+ value.detail +'</div></div>  </div> <div class="col-sm-4"> <div class="panel panel-primary"><div class="panel-heading">Revendication du client</div><div class="panel-body">Revendication du client</div></div></div><div class="col-sm-4"> <div class="panel panel-primary"><div class="panel-heading">Confirmation de l administrateur et mesure adopté</div><div class="panel-body">Confirmation de l administrateur et mesure adopté</div></div></div>');
                }
        });

       /* });*/

        }

        });
        }
      
});
    $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
$('#fermer').click(function()
{
  setTimeout(function() {
   location.reload()
 },10);
});
    
</script>
