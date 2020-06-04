

    <section class="slider" >
        <div class="top-brands"  >

            <h3 style="margin-top: -40px">Lancer un appel d'offre</h3><br>

            <div class="container-fluid" >
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="tsf-wizard tsf-wizard-1">
                            <!-- BEGIN NAV STEP-->
                            <div class="tsf-nav-step" style="margin-top: -15px;">
                                <!-- BEGIN STEP INDICATOR-->
                                <ul class="gsi-step-indicator triangle gsi-style-1 gsi-transition">


                                    <li id="titreWizard1" class="current" style="width: 48.5%; ">
                                        <a href="#" >
                                            <span class="number" style="margin-top: 15px;" >1</span>
							<span class="desc" >
								<label style="font-size: 20px; " >Service souhaité</label>
							</span>
                                        </a>

                                    </li>

                                    <li id="titreWizard2" class="" style="width: 50.5%; ">
                                        <a href="##">
                                            <span class="number">2</span>
							<span class="desc">
								<label style="font-size: 20px">Parametrage de l'impression</label>
							</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- END STEP INDICATOR-->
                            </div></div></div>
                </div>
            </div>
            <div class="container" style="background-color: white">
                <br>
                <div class="col-lg-11">
                <?php
                if(isset($error))
                {
               echo $error;
                }else{
                    if(isset($succes)){
                        echo " <script>
        swal({   title: \"Succes\",   text: \"Votre appel a bien été enrégistré\",   type: \"success\"}, function(){ window.location = \"index\";  });
    </script>";
                    }
                }
                ?>
                </div>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('client/appel')?>">
                    <div class="spinnerQueue" style="display: none;">   <div class="spinner-bg">       <div class="spinner-image"></div>       <div class="spinner-spinner-message">Traitement en cours ...</div>   </div></div>
                <div  class="row" id="boxe">
                    <div class="col-lg-6 ">
                        <h4>Informations générales sur le service</h4>
                        <div class="dropdown-divider"></div><br>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group">

                                    <label for="lastName" class="input-group-addon">Service souhaité* </label>
                                    <select class="form-control" name="service" id="service">
                                        <option>Selectionnez le service voulu</option>
                                        <?php
                                        foreach($services as $service){
                                            ?>
                                            <option value="<?php echo $service->id?>"><?php echo $service->nom ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label class="tool input-group-addon" data-placement="right" title="Veuillez choisir le ou les fichiers. Formats permis: '.pdf' et '.docx" for="dateNaissanceAssure">Fichiers</label>
                                    <input type="file" name="fichiers[]" id="files" class="form-control" multiple value="<?php echo set_value('fichiers[]')?>">
                                </div>
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Nombre de pages totales</label>
                                    <input type="text" name="nombrePage" id="pages" class="form-control" disabled>
                                </div>


                            </div>
                        </div>
                        <br><br>

                    </div>
                    <div class="col-lg-5 ">
                        <h4>Où  vous situez vous?</h4>
                        <div class="dropdown-divider"></div><br>
                        <div class="input-group">
                            <label for="lastName" class="input-group-addon">Région * </label>
                            <select class="form-control" name="region" id="region">
                                <?php
                                foreach($regions as $region){
                                    ?>
                                    <option value="<?php echo $region->id?>"><?php echo $region->nomregion?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="lastName" class="input-group-addon">Ville * </label>
                            <select class="form-control results" name="villes">

                            </select>
                        </div>
                        <div class="input-group">
                            <label for="lastName" class="input-group-addon">Quartier * </label>
                            <input type="text" name="quartier" id="quartier" class="form-control" value="<?php if(isset($secre))echo  set_value('quartier') ?>"  ><br>
                        </div>


                        <button name="submitButton" type="button" class="btn btn-primary pull-right " id="btnSuivant">Etape suivante</button>
                    </div>

                </div>

                <div id="boxeSuivant" class="row">




                </div>
                </form>
            </div>

        </div></section>
    <!-- //flexSlider -->

<script src="<?php echo js_url('jquery.validate'); ?>"></script>
<script>
    $(function(){
        var val = $("#region").val();
        $(".spinnerQueue").show();
        $.post('<?php echo base_url('account/displayOptions')?>',{val:val},function(data){
            $(".spinnerQueue").hide();
            $(".results").html(data);
        });
        $("#region").change(function(){
            var val = $("#region").val();
            $(".spinnerQueue").show();
            $.post('<?php echo base_url('account/displayOptions')?>',{val:val},function(data){
                $(".spinnerQueue").hide();
                $(".results").html(data);
            });
        });
        $("#service").change(function(){
            var service = $(this).val();
            $(".spinnerQueue").show();
            $.post("<?php echo site_url('client/appel/displayInputs') ?>",{service:service},function(data){
                $(".spinnerQueue").hide();
                $("#boxeSuivant").html(data);
            });
        });

        var page = 0;
        var existe = 0,allow = 0,size = 0;
        $('.tool').tooltip({
            "html" : true,
            "placement": "right",
            "trigger": "hover",
             "template": '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
        });
        $("#boxeSuivant").hide();
        function nombrePages(file) {
            $(".spinnerQueue").show();
            var reader = new FileReader();
            reader.addEventListener('load', function() {
                var src = this.result;
                $.post('<?php echo site_url('client/appel/nbrepages')?>',{document:src},function(data){
                    page = parseInt(page) + parseInt(data);
                    $(".spinnerQueue").hide();
                    $("#pages").attr('value',page);
                });

            });

            reader.readAsDataURL(file);

        }
        $("#files").change(function(){
           page = 0;allow = 0 ; existe = 0;
            $("#pages").attr('value','');
            if(this.files){
                existe = 1;
                var allowedTypes = ['pdf', 'jpg','png','jpeg'];
                var filesLen = this.files.length, imgType;
                for (var i = 0; i < filesLen; i++) {
                    imgType = this.files[i].name.split('.');
                    imgType = imgType[imgType.length - 1].toLowerCase(); // On utilise toLowerCase() pour éviter les extensions en majuscules
                    if (allowedTypes.indexOf(imgType) != -1) {
                        if(imgType == 'pdf'){
                            nombrePages(this.files[i]);
                        }else{
                            page = parseInt(page) + parseInt(1);
                            $("#pages").attr('value',page);
                        }

                    }else{
                        allow = 1;
                    }
                }

            }


        });

        $("#btnSuivant").click(function(){

                if(existe == 1){

                        if (allow == 1) {
                            sweetAlert("Oops...", "Vous avez choisi un fichier qui n'est as autorisé", "error");
                        } else {
                            if (size == 1) {
                                sweetAlert("Oops...", "Un des fichiers dépasse la taille maximale", "error");
                            } else if(!$("#quartier").val() || isNaN($("#service").val())){
                                sweetAlert("Oops...", "Veuillez remplir tous les chams", "error");
                            }
                            else  {
                                $("#titreWizard1").removeClass("current");
                                $("#titreWizard2").addClass("current");
                                $("#boxe").hide();
                                $("#boxeSuivant").fadeIn();
                            }
                        }


                }else
                {
                    sweetAlert("Oops...", "Veuillez choisir au moins un fichier", "error");

                }


            });

        $("#titreWizard1").click(function(){
            $("#titreWizard2").removeClass("current");
            $("#titreWizard1").addClass("current");
            $("#boxe").fadeIn();
            $("#boxeSuivant").hide();

        });
        $('form').keypress(function(e){
            if( e.which == 13 ){

                if(existe == 1){

                    if (allow == 1) {
                        sweetAlert("Oops...", "Vous avez choisi un fichier qui n'est as autorisé", "error");
                    } else {
                        if (size == 1) {
                            sweetAlert("Oops...", "Un des fichiers dépasse la taille maximale", "error");
                        } else if(!$("#quartier").val() || isNaN($("#service").val())){
                            sweetAlert("Oops...", "Veuillez remplir tous les chams", "error");
                        }
                        else  {
                            $("#titreWizard1").removeClass("current");
                            $("#titreWizard2").addClass("current");
                            $("#boxe").hide();
                            $("#boxeSuivant").fadeIn();
                        }
                    }


                }else
                {
                    sweetAlert("Oops...", "Veuillez choisir au moins un fichier", "error");

                }
                return false;
            }
        });
    });
</script>