
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Telechargement des fichiers

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Commandes</li>
            <li class="active">Téléchergement des fichiers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>Information !</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header">
                        Fihiers
                    </div>
                    <div class="box-body">
                        <?php
                        $i = 0;
                        foreach($documents as $document){
                            $i++;
                            $tab = explode('/',$document->lien);
                            $variable = array_pop($tab);

                            ?>

                            <label>Fichier<?php echo " ". $i ?><em>(<?php echo $document->nombrepage." "?>pages)</em></label> <a href="#" id="<?php echo $variable ?>" data-type="<?php echo $document->type ?>" class="text-success apercu">Cliquez ici pour voir</a><br>
                            <?php

                        }
                        ?>
                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-header">
                        Recapitulatif des besoins
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover table-responsive" style="font-size: 13px" >
                            <tbody id="display">
                            <?php
                            $i = 0;
                            foreach($documents as $document) {
                                $carac = json_decode($document->caracteristique, true);
                                foreach ($carac as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo Ucfirst(getNom($key)) ?>
                                                :<b> <?php echo ucfirst($value); ?></b>
                                            </td>
                                        </tr>
                                    <?php
                                }
                                break;
                            }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8" id="example1" style="height: 700px; display: none;">
                <div id="image">
                <img src="https://www.msacad.com/assets/img/logo/logo-sm.png" alt=""/>
                <a href="#" onclick="printJS('https://www.msacad.com/assets/img/logo/logo-sm.png', 'image');return false;">
                    <i class="fa fa-print"></i>
                </div>
                </a>

            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<script src="<?php echo js_url('pdfobject.min')?>"></script>
<script src='<?php echo js_url('print')?>'></script>
<script>

    $(".apercu").click(function(){
        $("#example1").show();
        var doc = $(this).attr("id");
        var type = $(this).attr("data-type");
        if(type == 'application/pdf'){
            PDFObject.embed("<?php echo base_url('assets/uploads/documents/')?>"+doc, "#example1");
        }else{
            $.post('<?php  echo site_url('secretariat/commande/printImage')?>',{doc:doc},function(data){
                $("#example1").html(data);
            });

        }

    });


</script>
