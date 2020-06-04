<div class="content-wrapper" style="font-family:cambria">
<section class="content-header">
<h1  style="font-family:cambria">
<i class="fa fa-user-plus" aria-hidden="true"></i>
      Ajouter un Client
      </h1>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Client</a></li>
        <li class="active">Ajouter </li>
      </ol>
      <br>
      <a href="liste">
      <button type="button" class="btn bg-navy margin"><i class="fa fa-hand-o-left" aria-hidden="true"></i>  Retour</button>
      </a>
    </section>
    <br>
    <br>
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php  echo base_url() ?>Client/save">
            <?php if(isset($error)) { ?>
                    <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" onclick="$(this).parrent().hide()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?php echo $error ?>
                    </div>
                <?php } ?>
            <div class="box-body">
                <br><br>
                <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Designation du services</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom" placeholder="Designation du services">
                    <?php echo form_error('nom') ?>
                  </div>
                </div>
                
                <br><br>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="description" placeholder="description">
                    <?= form_error('description') ?>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                <label>Multiple</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
				<label id="dip"> Envoyer nous le nombre d'arrete corespondant au nombre cycle </label>
				<div class="file-loading">
				<input id="kv-explorer" type="file" name="fiche[]" multiple>
				</div>
				</div>
            </div>
                </div>
                <br><br>
            </div>
            </div>
            </div>
            <!-- /.box-body -->
            <!--<div class="box-footer">
                <button type="submit" class="btn btn-primary" name="save" id="save">Enrégistrer</button>
            </div>
        </form>-->
     <!--  <form class="form-inline" method="post" action="save" >
            <div class="form-group">
              <label >Choose Theme:</label>
              <select id="theme_selector" class="form-control">
                    <option value="dots">dots</option>
                    <option value="default">default</option>
                    <option value="arrows">arrows</option>
              </select>
            </div> 
            
            <label>External Buttons:</label>
            <div class="btn-group navbar-btn" role="group">
                <button class="btn btn-default" id="prev-btn" type="button">Go Previous</button>
                <button class="btn btn-default" id="next-btn" type="button">Go Next</button>
                <button class="btn btn-danger" id="reset-btn" type="button">Reset Wizard</button>
            </div>
	
        <div class="alert alert-info" role="alert" id="message-box"><strong>Event Log:</strong></div>

        <!-- SmartWizard html -->
      <!--  <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Etape 1<br /><small>Information sur le Service</small></a></li>
                <li><a href="#step-2">Etape 2<br /><small>Caracteristique du Service</small></a></li>
                <li><a href="#step-3">Etape 3<br /><small>Information sur le lieu de livraison</small></a></li>
                <li><a href="#step-4">Etape 4<br /><small>Information sur la commande</small></a></li>
               
            </ul>
	<!--</div>-->
	<!--<form class="form-inline"  method="post" action="Service/save">-->
           <!--<div>
                <div id="step-1" class="" style="font-family:cambria">
                    <h2 style="font-family:cambria">Etape 1 Information sur le service</h2>
                    <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Designation du services</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nom" placeholder="Designation du services">
                          <?php echo form_error('nom') ?>
                </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                <br>
                <label for="inputEmail4" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="description" placeholder="description">
                    <?= form_error('description') ?>
                  </div>
                </div>
                <br>
                <br>
                </div>
		<div class="col-md-6">
			<div class="form-group">
				<label id="dip"> Images decriptive du Service </label>
				<div class="file-loading">
				<input id="kv-explorer" type="file" name="fiche[]" multiple>    
			</div>
		</div>
                </div>
                 </div>
                </div>
                <div id="step-2" class="" style="font-family:cambria">
                    <h2 style="font-family:cambria">Etape 2 Caracteristique du Service</h2>
                    <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
 
                    <div class="input-group control-group after-add-more">
                      <input type="text" name="addmore[]" id="addmore[]" class="form-control" placeholder="Enter Name Here">
                        <div class="input-group-btn"> 
                        <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Ajouter</button>
                        </div>
                    </div>
                    <div class="copy-fields hide">
		 <div class="control-group input-group" style="margin-top:10px">
		<input type="text" name="addmore[]" id="addmore[]" class="form-control" placeholder="Enter Name Here">
		<div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Supprimer</button>
            </div>
          </div>
        </div>
                </div>
                <br>
                <br>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                <label for="usr">Type de couverture:</label>
                <input type="text" class="form-control"  id="of_tcouverture" >
                </div>
                <div class="form-group">
                <label for="pwd">Intitule:</label>
                <input type="text" class="form-control">
                </div>
                <div class="form-group">
                <label for="pwd">Couleur de couverture:</label>
                <input type="text" class="form-control"  id="of_ccoucerture" >
                </div>
                <br>
                <br>
                </div>
                 </div>
                </div>
                <div id="step-3" class="" style="font-family:cambria">
               <!-- <h2 style="font-family:cambria">Etape 3 Information sur le lieu de livraison</h2>
                    <br>
                    <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                <label for="usr">Region:</label>
                <input type="text" class="form-control"  id="li_region" >
                </div>
                <div class="form-group">
                <label for="pwd">:Ville</label>
                <input type="text" class="form-control"  id="li_ville">
                </div>
                <div class="form-group">
                <label for="pwd">Qartier:</label>
                <input type="text" class="form-control"  id="li_quartier">
                </div>
                <br>
                <br>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="text" class="form-control">
                </div>
                <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="text" class="form-control">
                </div>
                <br>
                <br>
                </div>
                 </div>
                     </div>-->
                <!--<div id="step-4" class="" style="font-family:cambria">
                  <!--  <h2 style="font-family:cambria">Etape 4 Information sur le  commande</h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">Les Details de ma commande</div>
                        <table class="table">
                            <tbody>
                                <tr> <th>Name:</th> <td>Tim Smith</td> </tr>
                                <tr> <th>Email:</th> <td>example@example.com</td> </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                </div>-->
		 
		<!--</div>
		
		</div>
		 
        </div>
<form>-->
          </div>
    </section>
    </div>
      
  <script language="javascript">
$('.select2').select2();
$(document).ready(function() {
  $(document).ready(function () {
	$("#test-upload").fileinput({
		'theme': 'fa',
		'showPreview': false,
		'allowedFileExtensions': ['jpg', 'png', 'gif', 'pdf'],
		'elErrorContainer': '#errorBlock'
	});
	$("#kv-explorer").fileinput({
		'theme': 'explorer-fa',
		'uploadUrl': '<?php echo base_url('assets/uploads/documents/'); ?>',
		//allowedFileTypes: ['image'],
		maxFilePreviewSize: 10240,
		overwriteInitial: false,
		initialPreviewAsData: true,
	});
});
$(document).ready(function() {
 
	//here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
 
    });
        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                $("#message-box").append("<br /> > <strong>leaveStep</strong> called on " + stepNumber + ". Direction: " + stepDirection);
                var res = confirm("Do you want to leave the step "+stepNumber+"?");
                if(!res){
                    $("#message-box").append(" <strong>leaveStep</strong> Cancelled");    
                }else{
                    $("#message-box").append(" <strong>leaveStep</strong> Allowed");
                }
                return res;
            });
            
            // This event should initialize before initializing smartWizard
            // Otherwise this event wont load on first page load 
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                $("#message-box").append(" > <strong>showStep</strong> called on " + stepNumber + ". Direction: " + stepDirection+ ". Position: " + stepPosition);
            });
            
            $("#smartwizard").on("beginReset", function() {
                $("#message-box").append("<br /> > <strong>beginReset</strong> called");
            });
            
            $("#smartwizard").on("endReset", function() {
                $("#message-box").append(" > <strong>endReset</strong> called");
            });  
            
            $("#smartwizard").on("themeChanged", function(e, theme) {
                $("#message-box").append("<br /> > <strong>themeChanged</strong> called. New theme: " + theme);
            });
            
            // Toolbar extra buttons
            var btnFinish = $('<button type="submit"></button>').text('Finish')
                                .addClass('btn btn-info')
                                .on('click', function(){ 
					var form_data = '';
					$('form').each(function(k, val){
						form_data[k] = new FormData(val);
					});
                                  
					/*$.ajax({
						url: "<?php echo site_url('Service/save'); ?>",
						type: 'POST',
						//async : false,
						data: new FormData(this),
						processData:false,
						contentType:false,
						success: function(msg) {
							/*var t=JSON.parse(msg);
							if (t.val==1) {
								swal("Bloquer!", t.msg, "success");
								table.row('.selected').remove().draw( false );
							}
							else
							{
							    sweetAlert("Oops...", t.msg, "error");
							}*/
						/*}
                                            });*/
                                                 alert('enregistrement reussie'); });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ $('#smartwizard').smartWizard("reset"); });                         
            
            // Smart Wizard initialize
            $('#smartwizard').smartWizard({ 
                    selected: 0, 
                    theme: 'arrows',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    }
                 });           
            
            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });
            
            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            
            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
            
            $("#theme_selector").on("change", function() {
                // Change theme
                $('#smartwizard').smartWizard("theme", $(this).val());
                return true;
            });
            
        });
  </script>
  
<!--
<h1>Before</h1>
<div class="container">
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th>Select</th>
          <th>Text</th>
          <th>Text</th>
          <th>Select</th>
          <th>Select</th>
          <th>Select</th>
          <th>Text</th>
          <th>Price</th>
          <th>Price</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <select class="form-control match-content">
              <option selected="">Ketchup</option>
              <option>Mustard</option>
              <option>Mayonaise</option>
              <option>Relish</option>
            </select>
          </td>
          <td>
            <p class="form-control-static">12345</p>
          </td>
          <td>
            <input type="text" class="form-control" size="16" value="hello, cruel cruel world">
          </td>
          <td>
            <select class="form-control match-content">
              <option>Fries</option>
              <option selected="">Onion Rings</option>
              <option>Chips</option>
              <option>Coleslaw</option>
            </select>
          </td>
          <td>
            <select class="form-control match-content">
              <option>Waffle</option>
              <option selected="">Hamburger</option>
              <option>Toast</option>
              <option>Hoagie</option>
            </select>
          </td>
          <td>
            <select class="form-control match-content">
              <option selected="">Bacon</option>
              <option>Sausage</option>
              <option>Grits</option>
              <option>Eggs</option>
            </select>
          </td>
          <td>
            <input type="text" class="form-control" value="Ipsum lorem de facto stupor wilco">
          </td>
          <td>
            <input type="number" class="form-control" value="1000.00" size="16">
          </td>
          <td>
            <input type="number" class="form-control" value="1000.00" size="16">
          </td>
          <td>
            <input type="number" class="form-control" value="1000.00" size="16">
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
  
  <table class="table table-bordered table-condensed">
    <tbody>
        <tr>
           <td><input type="text" class="form-control" /></td>
           <td><input type="text" class="form-control" /></td>
           <td><input type="text" class="form-control" /></td>
           <td><input type="text" class="form-control" /></td>
           <td><input type="text" class="form-control" /></td>
           <td><input type="text" class="form-control" /></td>
        </tr>
    </tbody>
</table>
-->

<!-- important
<js>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/todo.php",
        table: "#example",
        fields: [ {
                label: "Item:",
                name:  "item"
            }, {
                label: "Status:",
                name:  "done",
                type:  "radio",
                options: [
                    { label: "To do", value: 0 },
                    { label: "Done",  value: 1 }
                ],
                def: 0
            }, {
                label: "Priority:",
                name:  "priority",
                type:  "select",
                options: [
                    { label: "1 (highest)", value: "1" },
                    { label: "2",           value: "2" },
                    { label: "3",           value: "3" },
                    { label: "4",           value: "4" },
                    { label: "5 (lowest)",  value: "5" }
                ]
            }
        ]
    } );
 
    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "../php/todo.php",
        columns: [
            { data: "priority", className: "dt-body-center" },
            { data: "item" },
            {
                "data": "done",
                "render": function (val, type, row) {
                    return val == 0 ? "To do" : "Done";
                }
            }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );

<html>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Priority</th>
                <th>Item</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
  
  <css>
  <php>
  <?php
 
/*
 * Example PHP implementation for the client-side table formatting example.
 * This is basically the same as the 'fieldTypes' example, but in this case
 * note that there is no server-side formatting of the 'done' field - rather it
 * is done in the DataTable in this example
 */
 
// DataTables PHP library
/*include( "../../php/DataTables.php" );
 
// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'todo' )
    ->fields(
        Field::inst( 'item' ),
        Field::inst( 'done' ),
        Field::inst( 'priority' )
    )
    ->process( $_POST )
    ->json();*/
