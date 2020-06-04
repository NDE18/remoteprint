<style>
    input,textarea{
        background-color: white;
        border: 0;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Apercu devis

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Apercu devis</li>
        </ol>
    </section>

    <section class="content">
        <div class="callout callout-info">
            <h4>Information !</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>
        <form method="post">
            <?php
            $carac_offre = json_decode($apercu->caracteristique,true); ?>
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Apercu du devis concernant l'appel d'offre N° <b><?php echo $apercu->num?></b></h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Service concerné: <b><?php echo ucfirst($apercu->nom)?></b></label>

                                    </div>
                                    <div class="form-group">
                                        <label>Date d'etablissement: </label>
                                        <input type="text" value="<?php echo date("d/m/y à H:i",strtotime($apercu->dateE)); ?>" class="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Petit Message: </label>
                                       <?php if(isset($carac_offre['message'])) echo $carac_offre['message']; ?>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="container-fluid">
                                <div class="row table-responsive">
                                    <table class="table table-bordered table-hover table-responsive" >
                                        <thead class="thead-primary">
                                        <tr>
                                            <th>Caractéristique:Option choisie</th>
                                            <th>Nombre de pages</th>
                                            <th>Nombre d'exemplaire</th>
                                            <th>Prix unitaire</th>
                                            <th>Prix total</th>
                                        </tr>
                                        </thead>
                                        <tbody id="display">
                                        <?php
                                        $total = 0;
                                        $i = 0;

                                        $carac = json_decode($apercu->detailAppel,true);
                                        $recuprix = json_decode($apercu->prix,true);
                                        foreach($carac as $key=>$value) {
                                            $i++;
                                            $values = isset($recuprix[$i])? $recuprix[$i] : $recuprix[$i."allpage"];
                                            $prix = $values * totalPage($apercu->idAppel) * $carac['nombreExemplaire'];
                                            $prix2 = $values * 1 * $carac['nombreExemplaire'];
                                            if(isset($recuprix[$i."allpage"])){
                                                $total = $total + $prix;
                                            }else{
                                                $total = $total+$prix2;
                                            }

                                            if ($key != 'nombreExemplaire' && $key != 'description') {


                                                ?>
                                                <tr>
                                                    <td><?php echo Ucfirst(getNom($key)) ?> :<b> <?php echo ucfirst($value);  ?></b></td>
                                                    <td><?php echo totalPage($apercu->idAppel) ?></td>
                                                    <th><?php echo $carac['nombreExemplaire'] ?></th>
                                                    <td><?php echo number_format($values, 2, ',', ' ')." " ?> </td>
                                                    <td><?php echo (isset($recuprix[$i."allpage"])) ? number_format($prix, 2, ',', ' ') : number_format($prix2, 2, ',', ' ') ?></td>

                                                </tr>

                                                <?php
                                            }
                                        }
                                        if(isset($carac_offre['nbrechamp'])) {
                                            for ($i = 0; $i < $carac_offre['nbrechamp']; $i++) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><input type="text" class="" name="<?php echo "descri$i" ?>"
                                                               value="<?php echo $carac_offre['descri' . $i] ?>"
                                                               disabled required></td>
                                                    <td><input type="number" min="1" class=" nombrepage"
                                                               name="<?php echo "nombrepage$i" ?>"
                                                               value="<?php echo $carac_offre['nombrepage' . $i] ?>"
                                                               disabled required></td>
                                                    <td><input type="number" min="1" class="nombreExem"
                                                               name="<?php echo "nombreExemi$i" ?>"
                                                               value="<?php echo $carac_offre['nombreExem' . $i] ?>"
                                                               disabled required></td>
                                                    <td><input type="number" min="0" step="any" class="l prixU"
                                                               name="<?php echo "prixU$i" ?>"
                                                               value="<?php echo $carac_offre['prixU' . $i] ?>" disabled
                                                               required></td>
                                                    <td><input type="number" step="any" class=" prixTotal"
                                                               name="<?php echo "prixTotal$i" ?>"
                                                               value="<?php echo $carac_offre['prixTotal' . $i] ?>"
                                                               disabled required></td>
                                                </tr>

                                                <?php
                                            }
                                        }
                                        ?>



                                        </tbody>

                                    </table>

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
                                <label>Nom du secretarriat</label>
                                <input type="text" class="form-control" value="<?php echo session_data('firstname') ?>" disabled>
                                <input type="hidden" class="form-control" name="nombreChamp" id="nombreChamp">
                            </div>
                            <div class="form-group">
                                <label>Remise</label>
                                <input type="number" name="remise" class="" id="remise" value="<?php echo isset($carac_offre['remise'])?$carac_offre['remise'] : ""?>" required disabled>
                            </div>

                        </div>
                    </div>
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Total</h3>
                        </div>
                        <div class="box-body">
                            <label class="">Total HT: </label> <input type="text" class="" style="border: 0;text-align: right; background-color: white" value="<?php  echo isset($carac_offre['remise'])? number_format($apercu->prixTotal+$carac_offre['remise']-$carac_offre['total_om'], 2, '.', '') : number_format($apercu->prixTotal-$carac_offre['total_om'], 2, '.', '')?>"  id="totalTemp" disabled>
                            <hr style="border: 0; height: 1px; background-color: #ced2de;">
                            <label class="">Frais OM et MOMO: </label> <span class="pull-right"><?php  echo $carac_offre['total_om']?></span>
                            <hr style="border: 0; height: 1px; background-color: #ced2de;">
                            <label class="pull-left">Total TTC: </label><input type="text" class="" style="border: 0;text-align: right; background-color: white" value="<?php echo number_format($apercu->prixTotal, 2, '.', '')?>"  id="total" disabled>
                            <input type="hidden" value="<?php  echo number_format($total, 2, '.', '')?>" name="prixGlobal" id="totalG">
                            <input type="hidden" value="<?php  echo number_format($total, 2, '.', '')?>" id="totalBase"><br><br>
                            <button type="submit" name="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
</div>
<script>

    var nombre = 0;
    $(function(){
        $("#addLigne").click(function(){
            nombre++;
            var html = '<tr id="ligne'+nombre+'">' +
                '<td><input type="hidden" class="form-control"  name="existe'+nombre+'" value="eco"></td>'+
                '<td><input type="text" class="form-control"  name="descri'+nombre+'" required></td>' +
                '<td><input type="number" min="1" class="form-control nombrepage"  name="nombrepage'+nombre+'" id = "nombrepage'+nombre+'" data-number = "'+nombre+'" required></td>'+
                '<td><input type="number" min="1" class="form-control nombreExem" name="nombreExem'+nombre+'" id="nombreExem'+nombre+'" data-number = "'+nombre+'" required></td>'+
                '<td><input type="number" min="0" step="any" class="form-control prixU" name="prixU'+nombre+'" id="prixU'+nombre+'" data-number = "'+nombre+'" required></td>'+
                '<td><input type="number" step="any" class="form-control prixTotal" name="prixTotal'+nombre+'"  id="prixTotal'+nombre+'" data-number = "'+nombre+'" required ></td>'+
                '<td><i class="fa fa-close close" id="delete'+nombre+'" data-number = "'+nombre+'"></i></td>'+
                '</tr>';
            $("#display").append(html);
            $("#nombreChamp").val(nombre);
            $(".prixU").keyup(function(){
                var id = $(this).attr('data-number');
                var nbrpage = $("#nombrepage"+id).val();
                var nbrexem = $("#nombreExem"+id).val();
                var pu = $("#prixU"+id).val();
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

                $("#total").val(price);
                $("#totalG").val(price);
                $("#totalTemp").val(price);
            });
            $(".nombrepage").keyup(function(){
                var id = $(this).attr('data-number');
                var nbrpage = $("#prixU"+id).val();
                var nbrexem = $("#nombreExem"+id).val();
                var pu = $("#nombrepage"+id).val();
                if(pu != '' && nbrpage != '' && nbrexem != ''){
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

                $("#total").val(price);
                $("#totalG").val(price);
                $("#totalTemp").val(price);

            });
            $(".nombreExem").keyup(function(){
                var id = $(this).attr('data-number');
                var nbrpage = $("#nombrepage"+id).val();
                var nbrexem = $("#prixU"+id).val();
                var pu = $("#nombreExem"+id).val();
                if(pu != '' && nbrpage != '' && nbrexem != ''){
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

                $("#total").val(price);
                $("#totalG").val(price);
                $("#totalTemp").val(price);

            });
            $(".close").click(function(){
                var id = $(this).attr('data-number');
                var priceH =  $("#total").val(),price2 = $("#prixTotal"+id).val();
                if(price2){
                    var price = parseFloat(priceH) -  parseFloat(price2);
                }else{
                    price = priceH;
                }
                $("#total").val(price);
                $("#totalG").val(price);
                $("#totalTemp").val(price);
                $("#ligne"+id).remove();



            });
        });
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_flat-green'
        });
        $("#remise").keyup(function(){
            var totB = $("#totalTemp").val();
            var val = $("#remise").val();

            if(val){
                var price = parseFloat(totB) - parseFloat(val);
                $("#total").val(price);
                $("#totalG").val(price);
            }else {

                $("#total").val(totB);
                $("#totalG").val(totB);
            }

        });

    });


</script>