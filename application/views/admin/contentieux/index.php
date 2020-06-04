<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-money" aria-hidden="true"></i>
      Liste des Contentieux
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Contentieux</a></li>
        <li class="active">Liste </li>
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
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th class="text-center">#</th>
            <th>Numero client</th>
            <th>Nom secretariat</th>
            <th>Objet du contentieux</th>
            <th>Details</th>
            <th>Date de début</th>
            <th>action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                  //var_dump($contentieux);
                    if(isset($contentieux) and count($contentieux)>0)
                    {
                        $i=0;
                        foreach($contentieux as $liste)
                        {
                            ?>

                            <?php
                            echo '<tr id="' . $liste->user . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nom">' . $liste->numeroClient. '</td>';
                            echo '<td id="prenom">' . $liste->nomsecretariat. '</td>';
                            echo '<td id="bp">' . $liste->objet. '</td>';
                            echo '<td id="phone">' . $liste->detail. '</td> ';
                            echo '<td >' . $liste->datedebut. '</td> ';
                           // echo '<input type="text" id="role" hidden>' . $liste->role. '</input>';
                            //echo '<td class="detail"><b>' . $liste->libelle.'</b>';
                            ?>
                            <td>
                                
                                <?php
                                switch ($liste->statut)
                                {
                                    case '0':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->idcontentieux.'" id="'.$liste->idcontentieux.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->idcontentieux.'" id="'.$liste->idcontentieux.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                     case '1':
                                        echo '<a title="Activer" href="Contentieux/traitement?id='.$liste->idcontentieux.'". class = "activer  vali_'.$liste->idcontentieux.'" id="'.$liste->idcontentieux.'"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Traiter</button></a>';
                                       break;
                                      case '2':
                                        echo '<a title="Activer"  class = "activer  vali_'.$liste->idcontentieux.'" id="'.$liste->idcontentieux.'">
                                        <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                        echo '<a title="Suspendre" class = " suspendre susp_'.$liste->idcontentieux.'" id="'.$liste->idcontentieux.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                        break;
                                    case '3':
                                   echo '
                                   <button class="btn btn-primary btn-xs" onclick="document.getElementById($liste->id)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Voir</button> </a>';
                                   echo '<a title="Suspendre" class = " suspendre susp_'.$liste->user.'" id="'.$liste->user.'" style="display:none;"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
                                   break;
                                    default:
                                        echo "";
                                        break;
                                }
                                ?>
                            </td>
                            <?php echo "</tr>";
                        }
                    }
                    else
                    {
                        echo '<tr><td colspan="6"  class="h3 text-center"><a href="" class="text-warning">Choisir la catégorie</a><td></tr>';
                    }
                    ?>

            </tfoot>
          </table>
        <!-- /.box-body -->
      </div>
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



<script type="text/javascript">
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
