<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-university"></i>
      Liste des Transactions Terminées
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Transactions</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
        <br>
        <div class="box-header">
       <!-- <a href="#" onclick="loadDynamicContentModal()" class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                <button class="btn btn-primary btn-xs detail"  data-toggle="modal"  data-target="#myModal" ><i class="fa fa-eye" aria-hidden="true"></i>Rechercher un client</button>
         </a>-->
        <br>
        </div>
        
<section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
        
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped" style="font-family:cambria">
            <tfoot style="display:table-header-group">
            <tr>
              <th>Intitule</th>
              <th>offre</th>
              <th>Numero appel offre</th>
              <th>Nom du secretariat</th>
              <th>Date de paiement</th>
              <th>Numero du Client</th>
              <th>action </th>
            </tr>
        </tfoot>
            <thead>
            <tr>
            <th class="text-center">#</th>
              <th >Numero transaction</th>
              <th>Numero appel offre</th>
              <th>secretariat</th>
              <th>Statut transaction</th>
              <th>Date ecoulé</th>
              <th>Contentieux </th>
              <th>action </th>
            </tr>
            </thead>
            <tbody>
            <?php
                  //var_dump($transaction);
                   //die;
                    if(isset($transaction) and count($transaction)>0)
                    {
                        $i=0;
                        foreach($transaction as $liste)
                        {
                            ?>

                            <?php
                            $d1=new datetime($liste->dateRecuperation);
                            $d2=new datetime("now");
                            $d3=$d1->diff($d2);
                            //var_dump($d3->format('%d'));
                            echo '<tr id="' . $liste->identifiant . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nomsecretariat">' . $liste->intitule. '</td>';
                            echo '<td >' . $liste->num. '</td>';
                            echo '<td >' . $liste->nomsecretariat. '</td>';
                            if($d3->format('%d')<7)
                            {
                                echo '<td bgcolor="yellow">' ."Payable". '</td>';
                            }
                            if($d3->format('%d')>7)
                            {
                                echo '<td bgcolor="green">' ."peut etre Payer". '</td>';
                            }
                            echo '<td id="nom" >' . $d3->format('%d')." jours". '</td>';
                            if($liste->idcontentieux==null || $liste->statutcontentieux==0)
                            {
                                echo '<td bgcolor="green">' . "aucun contentieux". '</td>';
                            }
                            else
                            {
                                echo '<td bgcolor="red">' . count($liste->idcontentieux). '</td>';
                            }
                            
                            
                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->identifiant;?>')"class="lock w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                <button class="btn btn-success btn-xs val" id="<?= $liste->identifiant ?>"><i class=" fa fa-check"></i>Payer</button>
                                </a>
                                
                                <?php
                                if(count($liste->idcontentieux)==null)
                                {

                                }
                                else{ ?>
                                    <a href="#" onclick=" loadDynamicContentModal('<?php  echo $liste->offre;?>')" class="lock w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                    <button class="btn btn-primary btn-xs" data-toggle="modal"  data-target="#myModal" id="<?= $liste->identifiant ?>"><i class="fa fa-binoculars" aria-hidden="true"></i>Details</button>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <?php echo "</tr>";
                        }
                    }
                    else
                    {
                        echo '<tr><td colspan="6"  class="h3 text-center"><a href="#" class="text-warning">Aucune Transactions enregistré pour le moment ...</a><td></tr>';
                    }
                    ?>

            </tfoot>
          </table>
        </div>
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
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Liste des Contentieux </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="demo-modal">

          </div>
         <!-- <button class="btn bg-olive btn-flat margin "  >
        <i class="fa fa-print" aria-hidden="true"></i> Approuver 
            </button></a>
            <button class="btn bg-maroon btn-flat margin "  >
        <i class="fa fa-print" aria-hidden="true"></i> rejeter 
            </button></a>-->
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>

        </div>
      </div>
    </div>
        <!-- /.container-fluid -->



<script type="text/javascript">
 
  
   $(document).ready(function() {
    $('#example1').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

   $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });

  $('.val').click(function(){
    var table = $('#example1').DataTable();
    var ligneID = $(this).attr("id");
    var $this = $(this);
    swal({
    title: "Numero!",
    text: "Veuillez Entrez le Numero de Transaction:",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    inputPlaceholder: "Motif"
  },
  function(inputValue){
    if (inputValue === false) return false;

    if (inputValue === "") {
      swal.showInputError("Desole vous devez automatiquement entrez le Numero avant de Valider!");
      return false
    }
    if (inputValue !== false) {
      var form_data = {
      id : ligneID,
      motif : inputValue,
      ajax : '1'
      };
      $.ajax({
          url: "<?php echo site_url('admin/Transaction/Payer'); ?>",
          type: 'POST',
          async : false,
          data: form_data,
          success: function(msg) {
            var t=JSON.parse(msg);
            if(t.val!=0)
                 {
                   swal("Modification!",t.msg, "success");
                   $this.parent().parent().addClass('selected');
                   table.row('.selected').remove().draw( false );
                   table.columns.adjust().draw();
                    }
                    else {
                           sweetAlert("Oops...", t.msg, "error");
                         }
          }
              });
    }


  });

});
function loadDynamicContentModal(id) {
		var options = {
			modal : true,
			height : 300,
			width : 500
		};
		$('#demo-modal').load('<?php echo site_url('admin/Transaction/contentieux') ?>?modal=' +id,
				function() {
					$('#myModal').modal({
						show : true
					});
				});
	}
              
$('.suspendre').click(function(){
  var table = $('#example1').DataTable();
  var $this = $(this);
  var ligneID = $(this).attr("id");
  //alert(ligneID);
  swal({
  title: "Motif!",
  text: "Entrez le motif de suspension:",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Motif"
},
function(inputValue){
  if (inputValue === false) return false;

  if (inputValue === "") {
    swal.showInputError("Desole vous ne pouvez pas suspendre une transaction sans motif!");
    return false
  }
  if (inputValue !== false) {

    var form_data = {
    id : ligneID,
    motif : inputValue,
    ajax : '1'
    };
    $.ajax({
        url: "<?php echo site_url('admin/Transaction/suspension'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {
          var t=JSON.parse(msg);
          if(t.val!=0)
               {
                 swal("Suspenssion!",t.msg, "success");
                 $this.parent().parent().addClass('selected');
                 table.row('.selected').remove().draw( false );
                 table.columns.adjust().draw();
                 setTimeout(function() {
                  location.reload()
                     },1000);
                  }
                  else {
                         sweetAlert("Oops...", t.msg, "erreur");
                       }
        }
            });
  }


});

});
 
</script>
