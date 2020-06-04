<style>
    ul.hook2 li {
        list-style: none outside none;
        background: url(/assets/images/hook-list.png) no-repeat scroll 0 0 rgba(0,0,0,0);
        margin-bottom: 8px;
        padding-left: 15px;
        font-family: "Open Sans",Arial;
        font-size: 12px;
    }
</style>
<div class="w3_login">
        <h3 style="margin-top: -40px">Connexion à la plateforme</h3><br>
     <div class="row">
         <div class="col-md-6">
             <div class="w3_login_module" style="margin-top: -40px">
                 <div class="module form-module">
                     <div class="toggle">
                     </div>
                     <div class="form">
                         <h2 style="margin-top: -18px">Déjà Inscrit?</h2>
                         <form action="<?php echo base_url('account/signIn') ?>" method="post">
                             <?php if(isset($erreur)) { ?>
                                 <div class="alert alert-warning">
                                     <button type="button" class="close" data-dismiss="alert" onclick="$(this).parrent().hide()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                     <?php echo $erreur ?>
                                 </div>
                             <?php } ?>
                             <input type="text" name="username" placeholder="Login ou email" required value="<?php echo set_value('username') ?>">
                             <?php echo form_error('username') ?>
                             <a href="#" class="text-orange pull-right">Mot de passe oublié?</a>
                             <input type="password" name="mdp" placeholder="mot de passe" required>
                             <?php echo form_error('mdp') ?>
                             <input type="submit" value="Connexion" name="submit">
                         </form>
                         <div class="omb_login" style="border-top: 1px solid #e5e5e5;" id="ctneur_conn_reseaux_sociaux">

                             <div class="row omb_loginOr">
                                 <div class="col-md-12">
                                     <hr class="omb_hrOr">
                                     <span class="omb_spanOr">Ou</span>
                                 </div>
                             </div>
                             <center><h4 style="margin-top: -10px;">Connectez vous  avec</h4></center><br>

                             <form>

                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <!-- Google login -->
                                             <a href="javascript:void(0);" id="googleBtnAuth" class="btn btn-block btn-lg btn-social btn-google" onclick="window.location = '<?php echo redirectGoogle()->createAuthUrl(); ?>';">
                                                 <span class="fa fa-google"></span> Google								</a>
                                         </div>
                                     </div>

                                 </div>

                             </form>



                         </div>

                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-6">
             <div class="w3_login_module" style="margin-top: -40px">
                 <div class="module form-module">
                     <div class="toggle">
                     </div>
                     <div class="form">
                         <h2 style="margin-top: -18px">Nouvel Utilisateur?</h2>
                         <ul class="hook2">
                             <li>Créez votre compte personnel en seulement quelques clics</li>
                             <li>Nous traitons vos coordonnées uniquement dans le cadre d'une commande</li>
                             <li>Un sécrétariat ne peut s'incrire que sur la plateforme pas à trevers un réseau social</li>
                         </ul><br>

                             <input type="submit" value="S'inscrire" name="submit" onclick="window.location = '<?php echo base_url('account/signUp') ?>';">

                         <div class="omb_login" style="border-top: 1px solid #e5e5e5;" id="ctneur_conn_reseaux_sociaux">

                             <div class="row omb_loginOr">
                                 <div class="col-md-12">
                                     <hr class="omb_hrOr">
                                     <span class="omb_spanOr">Ou</span>
                                 </div>
                             </div>
                             <center><h4 style="margin-top: -10px;"> Inscrivez vous avec</h4></center><br>

                             <form method="post">

                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <!-- Google login -->
                                             <a href="javascript:void(0);" id="googleBtnAuth" class="btn btn-block btn-lg btn-social btn-google" onclick="window.location = '<?php echo redirectGoogle()->createAuthUrl(); ?>';">
                                                 <span class="fa fa-google"></span> Google								</a>
                                         </div>
                                     </div>

                                 </div>

                             </form>



                         </div>



                     </div>
                 </div>
             </div>
         </div>
     </div>

        <script>
            $('.toggle').click(function(){
                // Switches the Icon
            window.location = "signUp";
            });
        </script>
 </div>
    <!-- //login -->


<script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            testAPI();
        } else {
            // The person is not logged into your app or we are unable to tell.
            document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '190508041555570',
            cookie     : true,  // enable cookies to allow the server to access
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.8' // use graph api version 2.8
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.email);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.email + '!';
        });
    }
</script>


<div id="status">
</div>