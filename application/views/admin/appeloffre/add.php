<div class="content-wrapper" style="font-family:cambria">
<section class="content-header">
<h1  style="font-family:cambria">
<i class="fa fa-plus" aria-hidden="true"></i>
      Ajouter un appel d'offre
      </h1>
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Secretariat</a></li>
        <li class="active">Ajouter </li>
      </ol>
      <br>
      <a href="liste">
      <button type="button" class="btn bg-navy margin"><i class="fa fa-hand-o-left" aria-hidden="true"></i>  Retour</button>
      </a>
    </section>
    <br>
    <br>
    <section class="content" style="font-family:cambria">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

        <form class="form-inline" method="post" action="save">
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

        <!--<div class="alert alert-info" role="alert" id="message-box"><strong>Event Log:</strong></div>-->

        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Etape 1<br /><small>Information sur le client</small></a></li>
                <li><a href="#step-2">Etape 2<br /><small>Description de l'appel d 'offre</small></a></li>
                <li><a href="#step-3">Etape 3<br /><small>Information sur le lieu de livraison</small></a></li>
                <li><a href="#step-4">Etape 4<br /><small>Information sur la commande</small></a></li>

            </ul>
            <div>
                <div id="step-1" class="" style="font-family:cambria">
                        <div class="row"><div class="col-md-4"></div>
                        <div class="col-md-4">
                                <div class="form-group">
                                <label for="sel1">Selectionner l email du client:</label>
                                <?php

                                if(isset($client['client']) and count($client['client'])>0)
                    {

                            ?>
                 <select class="form-control" id="client"  name="client">
                  <?php
                    foreach($client['client'] as $liste)
                    {
                      ?>
                        <option value="<?= $liste->id ?>"><?=  $liste->numeroClient ?></option>
                        <?php  }  }?>
                                </select>
                                <br>
                                </div>
                        </div><div class="col-md-4"></div></div>
                    <h2 style="font-family:cambria">Etape 1 Information sur le client</h2>

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                <label for="usr">Nom:</label>
                <input type="text" class="form-control" name="nom"  id="cl_nom" >
                </div>
                <div class="form-group">
                <label for="pwd">Prenom:</label>
                <input type="text" class="form-control" name="prenom"  id="cl_prenom">
                </div>
                <div class="form-group">
                <label for="pwd">Telephone:</label>
                <input type="text" class="form-control" name="phone" id="cl_date">
                </div>
                <br>
                <br>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                <label for="usr">Email :</label>
                <input type="text" class="form-control" name="mail" id="cl_numcni" >
                </div>
                <br>
                <br>
                </div>
                 </div>
                </div>
                <div id="step-2" class="" style="font-family:cambria">
                    <h2 style="font-family:cambria">Etape 2 Description de l'appel d 'offre</h2>
                    <div class="row"><div class="col-md-4"></div>
                        <div class="col-md-4">
                                <div class="form-group">
                                <label for="sel1">Selectionner le service:</label>
                                <?php
                                if(isset($client['service']) and count($client['service'])>0)
                    {

                            ?>
                 <select class="form-control" id="region"  name="service">
                  <?php
                    foreach($client['service'] as $liste)
                    {
                      ?>
                        <option value="<?= $liste->id ?>"><?=  $liste->nom ?></option>
                        <?php  }  }?>
                                </select>
                                <br>
                                </div>
                        </div><div class="col-md-4"></div></div>
                    <div class="row">
                    <div class="col-md-6">
                <div class="form-group" name="of_timpression">
                </div>
                </div>
                <div class="col-md-6">

                <br>
                <br>
                </div>
                 </div>
                </div>
                <div id="step-3" class="" style="font-family:cambria">
                <h2 style="font-family:cambria">Etape 3 Information sur le lieu de livraison</h2>
                    <br>
                    <div class="row"><div class="col-md-4"></div>
                    <div class="col-md-4">
                                <div class="form-group">
                                        <label for="sel1">Selectionner la region:</label>
                    <select class="form-control" id="region"  name="region">
                  <?php
                    foreach($client['region'] as $liste)
                    {
                      ?>
                        <option value="<?= $liste->identifiant ?>"><?=  $liste->nomregion ?></option>
                        <?php  }  ?>
                                </select>
                    </div><div class="col-md-4"></div></div></div>
                    <div class="row">
                    <div class="col-md-6">
                <div class="form-group">
                <label for="pwd">Ville:</label>
                <select  class="form-control"  name="li_ville">
                </select>
                </div>
                <div class="form-group">
                <label for="pwd">Qartier:</label>
                <input type="text" class="form-control" name="li_quartier"  id="li_quartier">
                </div>
                <br>
                <br>
                </div>
                 </div>
                     </div>
                <div id="step-4" class="" style="font-family:cambria">
                    <h2 style="font-family:cambria">Etape 4 Information sur le  commande</h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">Les Details de l'appel d'offre</div>
                        <div class="row"><div class="col-md-2">
                        <table class="table">
                            <tbody>
                                <tr> <th>Nom:</th> <td id="nom"></td> </tr>
                                <tr> <th>Prenom:</th> <td id="prenom"></td> </tr>
                                <tr> <th>Telephone:</th> <td id="phone"></td> </tr>
                                <tr> <th>Email:</th> <td id="mail"></td> </tr>
                            </tbody>
                        </table>
                        </div>
                        <!--<div class="col-md-8">
                                <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                        <!--<div class="img">
                        <img src="<?php  img_url('logo.png')?>" class="img-responsive" width="80" height="80" alt="User Image"  />
                          </div>-->
                            <!--    <label>Informations sur l appel d'offre</label>
                                <br>
                                <br>
                                <br>
                                <br>
                                <label>Description du service choisi:<h1 id="serv"></h1></label>
                                <div name="des"></div>
                                </div>
                                <div class="col-md-4"></div>
                                </div>
                        </div></div></div>-->
                    </div>
                    <br>
                    <br>
                </div>
            <!--</div>
        </div>-->
        </div>
        </form>

        </div>
    </section>
    </div>
    <script type="text/javascript">
        $('select[name="client"]').on('change', function() {
        var stateID = $(this).val();
       if(stateID) {
        $.ajax(
        {url: 'myformAjax/'+stateID,
        type: "GET",
        dataType: "json",

        success:function(data) {

        //$('select[name="ville"]').empty();

        $.each(data, function(key, value) {

        $('input[name="nom"]').attr({value : value.nom});
        $('input[name="prenom"]').attr({value : value.prenom});
        $('input[name="phone"]').attr({value : value.telephone});
        $('input[name="mail"]').attr({value : value.mail});
         var element = document.getElementById("nom");
                        element.innerHTML=value.nom;
        var element1 = document.getElementById("prenom");
                        element1.innerHTML=value.prenom;
        var element2 = document.getElementById("phone");
                        element2.innerHTML=value.telephone;
        var element3 = document.getElementById("mail");
                        element3.innerHTML=value.mail;
        });

        } });

        }else{

        //$('select[name="ville"]').empty();
        }

        });
$('select[name="service"]').on('change', function() {
        var stateID = $(this).val();
       if(stateID) {
        $.ajax(
        {url: 'myformAjax1/'+stateID,
        type: "GET",
        dataType: "json",

        success:function(data) {
        $('div[name="of_timpression"]').empty();

      //$('div[name="of_timpression"]').html('');
        $('select[name="detail[]"]').html('');

        $.each(data, function(key, value) {
                 $('div[name="of_timpression"]').append('<label>'+ value.nom +' </label>');
               $('div[name="of_timpression"]').append('<select class="form-control" id="detail" '+value.id+' name="detail[]"></select>');

               var element4 = document.getElementById("serv");
                        element4.innerHTML=value.nom;

               $($.parseJSON(value.detail)).each(function(k, v){
                        $('select[name="detail[]"]').append('<option value="'+v+'">'+ v +'</option>');
                        $('div[name="des"]').append('<label>'+ v +' </label>');
               });


        });

        } });

        }else{

        $('select[name="detail[]"]').empty();
        }

        });
$('select[name="region"]').on('change', function() {
        var stateID = $(this).val();
       if(stateID) {
        $.ajax(
        {url: 'selectionregion/'+stateID,
        type: "GET",
        dataType: "json",

        success:function(data) {
        $('select[name="li_ville"]').html('');

        $.each(data, function(key, value) {
               $('select[name="li_ville"]').append('<option value="">'+ value.ville +'</option>');
        });

        } });

        }else{
        $('select[name="li_ville"]').empty();
        }
        });
        $(document).ready(function(){

            // Smart Wizard events
            $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
               // $("#message-box").append("<br /> > <strong>leaveStep</strong> called on " + stepNumber + ". Direction: " + stepDirection);
                var res =""; //confirm("Do you want to leave the step "+stepNumber+"?");
                if(!res){
                    //$("#message-box").append(" <strong>leaveStep</strong> Cancelled");
                }else{
                   // $("#message-box").append(" <strong>leaveStep</strong> Allowed");
                }
                return res;
            });

            // This event should initialize before initializing smartWizard
            // Otherwise this event wont load on first page load
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               // $("#message-box").append(" > <strong>showStep</strong> called on " + stepNumber + ". Direction: " + stepDirection+ ". Position: " + stepPosition);
            });

            $("#smartwizard").on("beginReset", function() {
                //$("#message-box").append("<br /> > <strong>beginReset</strong> called");
            });

            $("#smartwizard").on("endReset", function() {
                //$("#message-box").append(" > <strong>endReset</strong> called");
            });

            $("#smartwizard").on("themeChanged", function(e, theme) {
                //$("#message-box").append("<br /> > <strong>themeChanged</strong> called. New theme: " + theme);
            });

            // Toolbar extra buttons
            var btnFinish = $('<button type="submit"></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){

                                    /*var form_data = {
                                    nom_client : $('#cl_nom').val(),
                                    prenom_client : $('#cl_prenom').val(),
                                    date_client : $('#cl_date').val(),
                                    numcni_client : $('#cl_numcni').val(),
                                    timpression_offre : $('#detail').val(),
                                    fimpression_offre : $('#of_fimpression').val(),
                                    nbimpression_offre : $('#of_nbexemple').val(),
                                    tcouverture_offre : $('#of_tcouverture').val(),
                                    quartier : $('li_quartier').val(),
                                    region:$('#li_region').val(),
                                    ville:$('#li_ville').val(),
                                    ajax : '1'
                                    };
                                    //if(ligneID==2)
                                    $.ajax({
                                        url: "<?php echo site_url('admin/Appeloffre/save'); ?>",
                                        type: 'POST',
                                        async : false,
                                        data: form_data,
                                        success: function(msg) {
                                        $this.parent().parent().parent().addClass('selected');
                                            var t=JSON.parse(msg);
                                            if (t.val==1) {
                                            swal("Bloquer!", t.msg, "success");
                                            table.row('.selected').remove().draw( false );
                                            }
                                            else
                                            {
                                                sweetAlert("Oops...", t.msg, "error");

                                            }

                                        }
                                            });*/
                                                 //alert('Finish Clicked');
                                                  });
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
