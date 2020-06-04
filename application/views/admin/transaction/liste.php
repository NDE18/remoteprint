<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-university"></i>
      Liste des Transactions
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Transactions</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
        <br>
        <div class="box-header">
        <a href="#" onclick="loadDynamicContentModal()" class="w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                <button class="btn btn-primary btn-xs detail"  data-toggle="modal"  data-target="#myModal" ><i class="fa fa-eye" aria-hidden="true"></i>Rechercher un client</button>
         </a>
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
              <th>Prix à payér</th>
              <th>Numero appel offre</th>
              <th>secretariat choisi</th>
              <th>Payer il y a</th>
              <th>Numero du Client</th>
             <!-- <th>Nom du Client</th>-->
              <th>action </th>
            </tr>
            </thead>
            <tbody>
            <?php
                 // var_dump($transaction);
                   //die;
                    if(isset($transaction) and count($transaction)>0)
                    {
                        $i=0;
                        foreach($transaction as $liste)
                        {
                            ?>

                            <?php
                            $d1=new datetime($liste->dateChoisi);
                            $d2=new datetime("now");
                            $d3=$d1->diff($d2);
                            
                            echo '<tr id="' . $liste->identifiant . '"><td class="text-center">' . ++$i . '</td>';
                            echo '<td id="nomsecretariat">' . $liste->intitule. '</td>';
                            echo '<td id="nom" bgcolor="red">' . $liste->prixTotal. '</td>';
                            echo '<td >' . $liste->num. '</td>';
                            echo '<td >' . $liste->nomsecretariat. '</td>';
                            echo '<td >' . $d3->format('%d')." jours"." ".$d3->format('%m')." mois". '</td>';
                            echo '<td bgcolor="red">' . $liste->telephone. '</td>';
                            //echo '<td >' . $liste->nom. '</td>';
                            ?>
                            <td>
                                <a href="#" onclick="document.getElementById('<?php  echo $liste->identifiant;?>')"class="lock w3-btn w3-white w3-small w3-margin-small" title="plus de détail">
                                <button class="btn btn-success btn-xs val" id="<?= $liste->identifiant ?>"><i class=" fa fa-check"></i>Valider</button>
                                </a>
                                <?php
                                switch ($liste->statuttransaction)
                                {
                                    case '0':
                                        echo '<a title="Activer"  class = "vali_'.$liste->identifiant.'" id="'.$liste->identifiant.'">
                                          <button class="btn suspendre btn-warning btn-xs" id="'.$liste->identifiant.'"><i class="fa fa-trash-o "></i>suspendre</button>';
                                    break;
                                    case '1':
                                        echo '<a title="Suspendre" class = " susp_'.$liste->identifiant.'" id="'.$liste->identifiant.'"><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i>Valider</button></a>';
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
            <h4 class="modal-title">Liste des clients </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="demo-modal">
                    <div id="liste" ></div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>

        </div>
      </div>
    </div>
        <!-- /.container-fluid -->



<script type="text/javascript">
function loadDynamicContentModal() {
		var options = {
			modal : true,
			height : 300,
			width : 500
		};
		$('#demo-modal').load('<?php echo site_url('admin/transaction/offre') ?>',
				function() {
					$('#myModal').modal({
						show : true
					});
				});
	}
    var htmltable="";
    htmltable +='<table id="liste1" class="table table-bordered table-striped" style="font-family:cambria">';
    htmltable +='<thead>';
    htmltable +='<tr>';
    htmltable +='<th class="text-center">#</th>';
    htmltable +='<th >Nom</th>';
    htmltable +='<th>Prenom</th>'; 
    htmltable +='<th>Telephone</th>';        
    htmltable +='</thead>';
    htmltable +='</tbody>';
    
$("#liste").append(htmltable);
$('#liste1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
              
              
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
          url: "<?php echo site_url('admin/Transaction/Valider'); ?>",
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
    $('#example1').find('tr').click(function(){

        var $this = $(this);
	var ligneID = $(this).attr("id");
  //alert(ligneID);
    //var nom= $(this).find(".nom").html();
       var nom= $(this).find("#nomsecretariat").text();
       var prenom= $(this).find("#nom").text();
       var region= $(this).find("#nomregion").text();
       var ville= $(this).find("#ville").text();
       var email= $(this).find("#bp").text();
       var phone= $(this).find("#phone").text();
       //alert(prenom);
       $('.nom').attr({value : nom});
       $('.prenom').attr({value : prenom});
       $('.region').attr({value : region});
       $('.ville').attr({value : ville});
       $('.phone').attr({value : phone});
       $('.mail').attr({value : email});
       $('.id').attr({value : ligneID});
        $('.id').hide();
        $('.update').click(function()
        {


            $(".nom").prop( "disabled", false );
            $(".prenom").prop( "disabled", false );
            $(".region").prop( "disabled", false );
            $(".ville").prop( "disabled", false );
            $(".phone").prop( "disabled", false );
            $(".mail").prop( "disabled", false );

        });

        $('#submit').click(function() {
    var form_data = {
    id : $('.id').val(),
    nom : $('.nom').val(),
    prenom : $('.prenom').val(),
    region : $('.region').val(),
    ville : $('.ville').val(),
    phone : $('.phone').val(),
    mail : $('.mail').val(),
    ajax : '1'
                    };
        $.ajax({
        url: "<?php echo site_url('Secretariat/updateinfo'); ?>",
        type: 'POST',
        async : false,
        data: form_data,
        success: function(msg) {
        //$('#message').html(msg);
       // alert("enregistrement reussie");
       swal("Modification!",msg, "success");
       setTimeout(function() {
        location.reload()
           },1000);
     /*  $this.find("#nomsecretariat").text(form_data.nom);
       $this.find("#nom").text(form_data.prenom);
       $this.find("#nomregion").text(form_data.region);
       $this.find("#ville").text(form_data.ville);
       $this.find("#bp").text(form_data.email);
       $this.find("#phone").text(form_data.phone);*/

        }
            });
    return false;
        });


});
</script>
