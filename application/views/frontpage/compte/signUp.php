
    <section class="slider" >
    <div class="top-brands"  >

        <h3 style="margin-top: -40px">Inscription à la plateforme</h3><br>

        <div class="container-fluid" >
          <div class="row">
              <div class="col-sm-12 col-xs-12">
            <div class="tsf-wizard tsf-wizard-1">
                <!-- BEGIN NAV STEP-->
                <div class="tsf-nav-step" style="margin-top: -15px; ">
                    <!-- BEGIN STEP INDICATOR-->
                    <ul class="gsi-step-indicator triangle gsi-style-1 gsi-transition" >


                        <li id="titreWizard1" class="current" style="width: 48.5%; ">
                            <a href="#" >
                                <span class="number" style="margin-top: 15px;" >1</span>
							<span class="desc" >
								<label style="font-size: 20px; " >Type d'abonnement</label>
							</span>
                            </a>

                        </li>

                        <li id="titreWizard2" class="" style="width: 50.5%; ">
                            <a href="##">
                                <span class="number">2</span>
							<span class="desc">
								<label style="font-size: 20px">Finalisation </label>
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
            <?php
                if(isset($message))
                {

                    ?>
                    <script>
                        swal({   title: "Succes",   text: "<?php echo $message?>",   type: "success"}, function(){ window.location = "signIn"; });

                    </script>

                    <?php
                }
            ?>

            <div  class="row" id="boxe">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <label class="containerLabel"><span  >Je suis un client</span>
                               <input type="radio" checked="checked" name ="check"  id="client">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <label class="containerLabel"><span  >Je suis un sécrétariat</span>
                                <input type="radio" name ="check" id="secre">
                                <span class="checkmark"></span>
                            </label>

                        </div>

                    </div>
                    <br><br>
                    <button name="submitButton" type="button" class="btn btn-primary pull-right " id="btnSuivant">Etape suivante</button>
                <br><br>
                </div>

            </div>
            <div id="boxeClient" class="row">
                    <form action="<?php echo base_url('account/signUp') ?>" method="post" class="">
                <div class="col-sm-12 col-lg-6 ">


                    <h4>Informations personnelles</h4>
                    <div class="dropdown-divider"></div><br>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Nom * </label>
                                <input type="text" name="nom" id="nom" required  class="form-control" value="<?php if(isset($client))echo  set_value('nom') ?>"  autocomplete="off"><br>
                            </div>
                            <?php echo form_error('nom') ?>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Prénom  </label>
                                <input type="text" name="prenom" id="prenom"   class="form-control" value="<?php if(isset($client))echo  set_value('prenom') ?>"  autocomplete="off"><br>
                            </div>
                            <?php echo form_error('prenom') ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Téléphone * </label>
                                <input type="text" name="telephone" id="telephone" required  class="form-control" value="<?php if(isset($client))echo  set_value('telephone') ?>" autocomplete="off"><br>
                            </div>
                            <?php echo form_error('telephone') ?>
                        </div>
                    </div>
                    <div class="omb_login" style="border-top: 1px solid #e5e5e5;" id="ctneur_conn_reseaux_sociaux">

                        <div class="row omb_loginOr">
                            <div class="col-md-12">
                                <hr class="omb_hrOr">
                                <span class="omb_spanOr">Ou</span>
                            </div>
                        </div>
                        <center><h4 style="margin-top: -10px;">Inscivez vous ou connectez vous avec</h4></center><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- Facebook login -->
                                        <button type="submit" name="facebook" id="facebookBtnAuth" class="btn  btn-block btn-lg btn-social btn-facebook">
                                            <span class="fa fa-facebook"></span> Facebook								</button>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- Google login -->
                                        <a href="javascript:void(0);" id="googleBtnAuth" class="btn btn-block btn-lg btn-social btn-google" onclick="window.location = '<?php echo redirectGoogle('signUp')->createAuthUrl(); ?>';">
                                            <span class="fa fa-google"></span> Google								</a>
                                    </div>
                                </div>

                            </div>
                    </div>

                </div>
                <div class="col-sm-12 col-lg-6">

                    <h4>Informations sur le compte</h4>
                    <div class="dropdown-divider"></div><br>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Email* </label>
                                <input type="text" name="email" id="email"  required  class="form-control" value="<?php if(isset($client))echo  set_value('email') ?>"  autocomplete="off"><br>
                            </div>
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Nom  utilisateur* </label>
                                <input type="text" name="username" id="username" required  class="form-control" value="<?php if(isset($client))echo  set_value('username') ?>"  autocomplete="off"><br>
                            </div>
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Mot de passe* </label>
                                <input type="password" name="mdp" id="mdp" required  class="form-control"  autocomplete="off"><br>
                            </div>
                            <?php echo form_error('mdp') ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Ressaisissez le mot de passe * </label>
                                <input type="password" name="rmdp" id="rmdp" required  class="form-control" autocomplete="off"><br>
                            </div>
                            <?php echo form_error('rmdp') ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                       <input type="checkbox" > J'accepte les termes et conditions
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label for="lastName" class="input-group-addon">Ville * </label>
                                <input type="text" name="lastName" id="lastName" class="form-control" autocomplete="off"><br>
                            </div>

                        </div>
                    </div>
                    <button type="submit" name="send" class="mt-3 right-align btn btn-primary" style="border-radius: 0">Je m'inscris</button>
                </div>
                    </form>
                </div>
            <div id="boxeSecretaire" class="row">
                <div class="spinnerQueue" style="display: none;">   <div class="spinner-bg">       <div class="spinner-image"></div>       <div class="spinner-spinner-message">Traitement en cours ...</div>   </div></div>
                <form action="<?php echo base_url('account/signUp') ?>" method="post" class="">
                    <div class="col-sm-12 col-lg-6 ">


                        <h4>Informations sur le sécrétariat</h4>
                        <div class="dropdown-divider"></div><br>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Nom du sécrétariat * </label>
                                    <input type="text" name="noms" id="noms" required  class="form-control" value="<?php if(isset($secre))echo  set_value('noms') ?>"  ><br>
                                </div>
                                <?php echo form_error('noms') ?>

                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label for="lastName" class="tool input-group-addon" data-placement="right" title="Nous effectuerons un dépot sur ce numéro à chaque fin de transaction" >Téléphone * </label>
                                    <input type="text" name="telephones" id="telephones" required  class="form-control" value="<?php if(isset($secre))echo  set_value('telephones') ?>" ><br>
                                </div>
                                <?php echo form_error('telephones') ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Boite postale  </label>
                                    <input type="text" name="bp" id="bp" class="form-control" value="<?php if(isset($secre))echo  set_value('bp') ?>"  ><br>
                                </div>
                                <?php echo form_error('bp') ?>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
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

                            </div></div>

                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Ville * </label>
                                    <select class="form-control results" name="villes">

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Quartier * </label>
                                    <input type="text" name="quartier" id="quartier" class="form-control" value="<?php if(isset($secre))echo  set_value('quartier') ?>"  ><br>
                                </div>
                                <?php echo form_error('quartier') ?>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Petite<br> description<br> de votre <br>activité* </label>
                                <textarea class="form-control" name="description" id="description" rows="5"  placeholder="" required><?php if(isset($secre))echo  set_value('description') ?></textarea>
                                </div>
                                <?php echo form_error('description') ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-lg-6">

                        <h4>Informations sur le compte</h4>
                        <div class="dropdown-divider"></div><br>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <label for="lastName" class="tool input-group-addon" data-placement="right" title="Veuillez choisir votre fréquence de rémunération" >Fréquence de rémunération* </label>
                                    <select class="form-control " name="freq">
                                        <option value="1jr">Après que la transction soit terminée</option>
                                        <option value="7jr">Après une semaine</option>
                                        <option value="1m">Après 1 mois</option>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Email* </label>
                                    <input type="text" name="emails" id="emails"  required  class="form-control" value="<?php if(isset($secre))echo  set_value('emails') ?>"  ><br>
                                </div>
                                <?php echo form_error('emails') ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Nom  utilisateur* </label>
                                    <input type="text" name="usernames" id="usernames" required  class="form-control" value="<?php if(isset($secre))echo  set_value('usernames') ?>"  ><br>
                                </div>
                                <?php echo form_error('usernames') ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Mot de passe* </label>
                                    <input type="password" name="mdps" id="mdps" required  class="form-control"  autocomplete="off"><br>
                                </div>
                                <?php echo form_error('mdps') ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Ressaisissez le mot de passe * </label>
                                    <input type="password" name="rmdps" id="rmdps" required  class="form-control" autocomplete="off"><br>
                                </div>
                                <?php echo form_error('rmdps') ?>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <input type="checkbox" > J'ai lu et j'accepte les termes et conditions
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <label for="lastName" class="input-group-addon">Ville * </label>
                                    <input type="text" name="lastName" id="lastName" class="form-control" autocomplete="off"><br>
                                </div>

                            </div>
                        </div>
                        <button type="submit" name="inscris" class="mt-3 right-align btn btn-primary" style="border-radius: 0">Je m'inscris</button>
                    </div>
                </form>
            </div>
        </div>

    </div></section>
    <!-- //flexSlider -->



<script src="<?php echo js_url('jquery.validate'); ?>"></script>
<script>
    $(function(){
        $('.tool').tooltip({
            "html" : true,
            "placement": "right",
            "trigger": "hover",
            "template": '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
        });
        var val = $("#region").val();
        $(".spinnerQueue").show();
        $.post('<?php echo base_url('account/displayOptions')?>',{val:val},function(data){
            $(".spinnerQueue").hide();
            $(".results").html(data);
        });
        $('#description').wysihtml5();

        <?php if(isset($secre)){
        ?>
        $("#boxeSecretaire").show();
        $("#boxe").hide();
        $("#titreWizard1").removeClass("current");
        $("#titreWizard2").addClass("current");
        <?php
        } else{
        ?>
        $("#boxeSecretaire").hide();
        <?php
        }?>
        <?php if(isset($client)){
        ?>
        $("#boxeClient").show();
        $("#boxe").hide();
        $("#titreWizard1").removeClass("current");
        $("#titreWizard2").addClass("current");
        <?php
        } else{
        ?>
        $("#boxeClient").hide();
        <?php
        }?>

        $("#btnSuivant").click(function(){
            if($("#client").is(":checked")){
                $("#titreWizard1").removeClass("current");
                $("#titreWizard2").addClass("current");
                $("#boxe").hide();
                $("#boxeClient").fadeIn();
            }else{
                $("#titreWizard1").removeClass("current");
                $("#titreWizard2").addClass("current");
                $("#boxe").hide();
                $("#boxeSecretaire").fadeIn();
            }



        });
        $("#titreWizard1").click(function(){
            $("#titreWizard2").removeClass("current");
            $("#titreWizard1").addClass("current");
            $("#boxe").fadeIn();
            $("#boxeClient").hide();
            $("#boxeSecretaire").hide();
            <?php
            unset($client);
            unset($secre);
            ?>
        });
        $("#region").change(function(){
            var val = $("#region").val();
            $(".spinnerQueue").show();
            $.post('<?php echo base_url('account/displayOptions')?>',{val:val},function(data){
                $(".spinnerQueue").hide();
                $(".results").html(data);
            });
        });
    });
</script>