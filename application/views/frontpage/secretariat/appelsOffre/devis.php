<form method="post">
<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Elaboration d'un devis

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Elaboration d'un devis</li>
        </ol>
    </section>

    <section class="content">
        <div class="callout callout-info">
            <h4>Information !</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>
        <?php
        if(isset($error)){

            echo '<script>
                       swal({   title: "Erreur",   text: "Erreur lors de l\'enregistrement du devis",   type: "error"}, function(){   });</script>';
        }
        ?>
        <?php
        if(isset($success)){

            echo '<script>
                       swal({   title: "Succes",   text: "Devis enregistré et envoyé avec succes",   type: "success"}, function(){   });</script>';
        }
        ?>
        <?php if(isset($noconfigure)){
            ?>
            <script>
                $(function(){
                    swal({   title: "Erreur",   text: "Vous n'avez pas encore parametré le service choisi par le client",   type: "error"}, function(){ window.location = "<?php echo base_url('secretariat/configuration/configuration') ?>"; });
                });
            </script>
            <?php

        }else{?>

        <div class="row">
            <div class="col-md-9">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Devis concernant l'appel d'offre N° <b><?php  echo $infos->num?></b> </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Service concerné:</label>
                                <?php  echo ucfirst($infos->nom)?>
                           </div>
                            <div class="form-group">
                            <label>Date d'etablissement</label>
                          <input type="text" value="<?php echo date('d-m-y'); ?>" class="form-control" disabled>
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Petit Message</label>
                                    <textarea rows="5" class="form-control" name="message"></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="container-fluid">
                        <div class="row table-responsive">
                            <table class="table table-bordered table-hover table-responsive" >
                               <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Nombre de pages</th>
                                    <th>Nombre d'exemplaire</th>
                                    <th>Prix unitaire</th>
                                    <th>Prix total</th>
                                </tr>
                               </thead>
                                <tbody id="display">
                                <?php
                                $total = 0;

                                 $carac = json_decode($infos->caracteristique,true);
                                 foreach($carac as $key=>$value) {
                                     $prix = getPrix($key, $value) * totalPage($infos->id) * $carac['nombreExemplaire'];
                                     $prix2 = getPrix($key, $value) * 1 * $carac['nombreExemplaire'];
                                     if(allpage($key) == 1){
                                         $total = $total + $prix;
                                     }else{
                                         $total = $total+$prix2;
                                     }

                                     if ($key != 'nombreExemplaire' && $key != 'description') {


                                         ?>
                                         <tr>
                                             <td><?php echo Ucfirst(getNom($key)) ?> :<b> <?php echo ucfirst($value); ?></b></td>
                                             <td><?php echo totalPage($infos->id) ?></td>
                                             <th><?php echo $carac['nombreExemplaire'] ?></th>
                                             <td><?php echo number_format(getPrix($key, $value), 2, ',', ' ')." " ?> <a href="<?php echo base_url('secretariat/configuration/configuration')?>" class="text-primary small">Modifier le pu</a></td>
                                             <td><?php echo (allpage($key) == 1) ? number_format($prix, 2, ',', ' ') : number_format($prix2, 2, ',', ' ') ?></td>

                                         </tr>

                                         <?php
                                     }
                                 }
                                    ?>



                                </tbody>

                            </table>

                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <button class="btn btn-success" type="button" id="addLigne">Ajouter une ligne</button>
                            </div>

                        </div>

                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paramètre de facturation</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <button type="button" id="previewdoc" data-offer="<?php echo $infos->id ?>" class="btn btn-success">Afficher les documents</button>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="flat-red"  name="apply"  id="appliquer">
                                Appliquer une remise
                            </label>
                            <input type="number" name="remise" class="form-control" id="remise" min="0">
                        </div>

                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total</h3>
                    </div>
                    <div class="box-body">
                        <label class="">Total HT: </label> <input type="text" class="pull-right" style="border: 0;text-align: right; background-color: white" value="<?php  echo number_format($total, 2, '.', '')?>"  id="totalTemp" disabled>
                        <hr style="border: 0; height: 1px; background-color: #ced2de;">
                        <label class="">Après remise: </label> <input type="text" class="pull-right" style="border: 0;text-align: right; background-color: white ; margin-top: -25px" value="<?php  echo number_format($total, 2, '.', '')?>"  id="apreRem" disabled>
                        <hr style="border: 0; height: 1px; background-color: #ced2de;">
                        <label class="pull-left">Total TTC : </label><input type="text" class="pull-right" style="border: 0;text-align: right; background-color: white; margin-top: 0px" value="<?php  echo $total?>"  id="total" disabled>
                        <input type="hidden" value="0" id="totalOm">
                        <input type="hidden" value="<?php  echo $total  ?>" id="totalBase"><br><br>
                        <button type="button" id="preview" class="btn btn-success">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>

        <?php  }?>

    </section>
</div>
    <div class="modal  fade" id="modal-doc" >

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Apercu des documents</h4>
                </div>
                <div class="modal-body">
                    <div class="box box-default">
                        <div class="box-body" id="displayDoc" >

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>

        <!-- /.modal-dialog -->
    </div>
<div class="modal  fade" id="modal-defaut" >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Recapitulatif du total</h4>
            </div>
            <div class="modal-body">
                <div class="box box-default">
                    <div class="box-body">
                        <label class="">Total HT: </label> <span class="pull-right totalHT"></span>
                        <hr style="border: 0; height: 1px; background-color: #ced2de;">
                        <label class="">Après remise: </label> <span class="pull-right ApresRem"></span>
                        <hr style="border: 0; height: 1px; background-color: #ced2de;">
                        <label class="">Frais(OM et MOMO): </label> <span class="pull-right FraisOm"></span>
                        <hr style="border: 0; height: 1px; background-color: #ced2de;">
                        <label class="">Nos frais (10 % de la somme): </label> <span class="pull-right Nos"></span>
                        <hr style="border: 0; height: 1px; background-color: #ced2de;">
                        <label class="pull-left">Total TTC :</label> <span class="pull-right TotalGlo"></span>
                        <input type="hidden"  value=""  id="totalOm2" name="totalOm">
                        <input type="hidden" value="" name="prixGlobal" id="totalG">
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" name="submit" class="btn btn-success">Terminer l'enregistrement</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>

    <!-- /.modal-dialog -->
</div>
</form>
<script>

    var nombre = 0;
    $(function(){
        function recupOm(){

            var prix = parseInt($("#apreRem").val());
            $.post("<?php echo base_url("secretariat/appelOffre/recupOm")?>",{prix:prix},function(data){

                $("#totalOm").val(data);
                $("#totalOm2").val(data);

            });

        }
        
        
        
        
        
        $("#preview").click(function(){
            var prix = parseInt($("#apreRem").val());
            $.post("<?php echo base_url("secretariat/appelOffre/recupOm")?>",{prix:prix},function(data){
                $('.totalHT').text($("#totalTemp").val());
                $('.ApresRem').text(prix);
                $('.FraisOm').text(data);
                var total = parseInt($('.ApresRem').text()) + parseInt($('.FraisOm').text());
                var nos = (total * 10)/100;
                $('.Nos').text(nos);
                $('.TotalGlo').text(total);
                $("#totalOm2").val(data);
                $("#totalG").val(total);
                $('#modal-defaut').modal('show');

            });
        });
        $("#previewdoc").click(function(){
            var offre = $(this).attr("data-offer");
            $.post("<?php echo base_url("secretariat/appelOffre/displayDoc")?>",{offre:offre},function(data){
                $("#displayDoc").html(data);
                $('#modal-doc').modal('show');

            });
        });



        $("#addLigne").click(function(){
            nombre++;
            var html = '<tr id="ligne'+nombre+'">' +
                '<td><input type="text" class="form-control"  name="descri'+nombre+'" required></td>' +
                '<td><input type="number" min="1" class="form-control nombrepage"  name="nombrepage'+nombre+'" id = "nombrepage'+nombre+'" data-number = "'+nombre+'" required></td>'+
                '<td><input type="number" min="1" class="form-control nombreExem" name="nombreExem'+nombre+'" id="nombreExem'+nombre+'" data-number = "'+nombre+'" required></td>'+
                '<td><input type="number" min="0" step="any" class="form-control prixU" name="prixU'+nombre+'" id="prixU'+nombre+'" data-number = "'+nombre+'" required></td>'+
                '<td><input type="number" step="any" class="form-control prixTotal" name="prixTotal'+nombre+'"  id="prixTotal'+nombre+'" data-number = "'+nombre+'" required ></td>'+
                '<td><i class="fa fa-close close" id="delete'+nombre+'" data-number = "'+nombre+'"></i></td>'+
                '</tr>';
            $("#display").append(html);
            $("#nombreChamp").val(nombre);
            $(".prixU").on('click keyup',function(){
                var id = $(this).attr('data-number');
                var nbrpage = $("#nombrepage"+id).val();
                var nbrexem = $("#nombreExem"+id).val();
                var pu = $("#prixU"+id).val();
                var remise = $('#remise').val();
                if(pu  && nbrpage  && nbrexem){
                    var total = parseInt(nbrpage) * parseInt(nbrexem) * parseFloat(pu);
                }else{
                    total = 0;
                }
                $("#prixTotal"+id).val(total);
                if(id == 1){
                    var price = parseFloat($("#totalBase").val()) + parseFloat(total);
                }else{
                    price = 0;
                    for(var i= 1;i<id;i++){
                        price = parseFloat(price) +  parseFloat($("#prixTotal"+i).val());
                    }
                    price = price +  parseFloat($("#totalBase").val()) +  parseFloat(total)
                }

                if(remise){
                    $("#apreRem").val(parseFloat(price)- parseFloat(remise));

                    $("#total").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                }else{
                    $("#apreRem").val(parseFloat(price));

                    $("#total").val((price + parseFloat($("#totalOm").val())));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())));
                }

                $("#totalTemp").val(price);
            });
            $(".nombrepage").on('click keyup',function(){
                var id = $(this).attr('data-number');
                var nbrpage = $("#prixU"+id).val();
                var nbrexem = $("#nombreExem"+id).val();
                var pu = $("#nombrepage"+id).val();
                var remise = $('#remise').val();
                if(pu && nbrpage && nbrexem ){
                    var total = parseInt(nbrpage) * parseInt(nbrexem) * parseFloat(pu);
                }else{
                    total = 0;
                }
                $("#prixTotal"+id).val(total);
                if(id == 1){
                    var price = parseFloat($("#totalBase").val()) + parseFloat(total);
                }else{
                    price = 0;
                    for(var i= 1;i<id;i++){
                        price = parseFloat(price) +  parseFloat($("#prixTotal"+i).val());
                    }
                    price = price +  parseFloat($("#totalBase").val()) +  parseFloat(total)
                }
                if(remise){
                    $("#apreRem").val(parseFloat(price)- parseFloat(remise));

                    $("#total").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                }else{
                    $("#apreRem").val(parseFloat(price));

                    $("#total").val((price + parseFloat($("#totalOm").val())));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())));
                }

                $("#totalTemp").val(price);

            });
            $(".nombreExem").on('click keyup',function(){
                var id = $(this).attr('data-number');
                var nbrpage = $("#nombrepage"+id).val();
                var nbrexem = $("#prixU"+id).val();
                var pu = $("#nombreExem"+id).val();
                var remise = $('#remise').val();
                if(pu && nbrpage  && nbrexem ){
                    var total = parseInt(nbrpage) * parseInt(nbrexem) * parseFloat(pu);

                }else{
                    total = 0;

                }
                $("#prixTotal"+id).val(total);
                if(id == 1){
                    var price = parseFloat($("#totalBase").val()) + parseFloat(total);
                }else{
                    price = 0;
                    for(var i= 1;i<id;i++){
                        price = parseFloat(price) +  parseFloat($("#prixTotal"+i).val());
                    }
                    price = price +  parseFloat($("#totalBase").val()) +  parseFloat(total)
                }
                if(remise){
                    $("#apreRem").val(parseFloat(price)- parseFloat(remise));

                    $("#total").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                }else{
                    $("#apreRem").val(parseFloat(price));

                    $("#total").val((price + parseFloat($("#totalOm").val())));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())));
                }

                $("#totalTemp").val(price);

            });
            $(".close").click(function(){
                var id = $(this).attr('data-number');


                var priceH =  $("#totalTemp").val(),price2 = $("#prixTotal"+id).val(), remise = $('#remise').val();

                if(price2){
                    var price = parseFloat(priceH) -  parseFloat(price2);
                }else{
                    price = priceH;
                }
                if(remise){
                    $("#apreRem").val(parseFloat(price)- parseFloat(remise));

                    $("#total").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())) - parseFloat(remise));
                }else{
                    $("#apreRem").val(parseFloat(price));

                    $("#total").val((price + parseFloat($("#totalOm").val())));
                    $("#totalG").val((price + parseFloat($("#totalOm").val())));
                }
                $("#totalTemp").val(price);
                $("#ligne"+id).remove();
                nombre--;
                $("#nombreChamp").val(nombre);


            });
        });
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_flat-green'
        });
        $("#remise").on('click keyup',function(){

            var totB;
            var val = $("#remise").val();

            if(val){
                $("#apreRem").val(parseFloat($("#totalTemp").val())- parseFloat(val));
                    totB = parseFloat($("#totalTemp").val()) + parseFloat($("#totalOm").val());
                    var price = parseFloat(totB) - parseFloat(val);
                    $("#total").val((price));
                    $("#totalG").val((price));


            }else {
                $("#apreRem").val(parseFloat($("#totalTemp").val()));
                    totB = parseFloat($("#totalTemp").val()) + parseFloat($("#totalOm").val());
                    $("#total").val(totB);
                    $("#totalG").val(totB);


            }

        });

    });


</script>