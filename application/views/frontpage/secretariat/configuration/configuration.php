<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Configuration des Services

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Configuration</li>
        </ol>
    </section>

    <section class="content">
        <div class="callout callout-info">
            <h4>Information !</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>

        <form role="form" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Service</h3>
                        </div>
                        <div class="box-body">
                            <div class="spinnerQueue" style="display: none;">   <div class="spinner-bg">       <div class="spinner-image"></div>       <div class="spinner-spinner-message">Traitement en cours ...</div>   </div></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Choisir le service</label>
                                        <select class="form-control select2" style="width: 100%;" id="service" name="service">
                                            <option>Aucun service séletionné...</option>
                                            <?php
                                            foreach($secre as $sec){
                                                ?>
                                                <option value="<?php echo $sec->id?>"><?php echo $sec->nom?></option>
                                                <?php
                                            }
                                            ?>

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <!-- /.box-body -->
                        </div>
                    </div></div> </div>
            <div class="row" id="display">
                <?php
                if(isset($affi)){

                    echo '<script>
                       swal({   title: "Erreur",   text: "Erreur lors du parametrage reessayez",   type: "error"}, function(){   });</script>';
                }
                ?>
                <?php
                if(isset($success)){

                    echo '<script>
                       swal({   title: "Succes",   text: "Paramétrage effectué avec succès",   type: "success"}, function(){   });</script>';
                }
                ?>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>

        </form>

    </section>
</div>
<script>
    $(function(){
        $('.select2').select2();
        $("#service").change(function(){
            var service = $(this).val();
            $(".spinnerQueue").show();
            $.post("<?php echo site_url('secretariat/configuration/displayInputs') ?>",{service:service},function(data){
                $(".spinnerQueue").hide();
                $("#display").html(data);
            });
        });
    });
</script>