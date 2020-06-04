<style>
    .cat a:hover{
        background-color: white;
        color: rgb(255,102,0);


    }
</style>
<div class="row">
<div class="container-fluid">
<div class="navbar navbar-fixed-top" style="height: 30px; background-color: black" >

        <div class="fbl">
            &nbsp;&nbsp;
	        <span class="phonelbl w3-hide-small"  style="color: white" >
	            Besoin d'aide contactez nous au
            </span>
            <span class="phoneico">&nbsp;</span>
            <span class="phone w3-hide-small">698400747 / 674076824</span>
            <span class="service w3-hide-small" style="color: white">
                Lun - ven : 9h - 20h
            </span>
            <span class="servicemailico">&nbsp;</span>
            <span class="servicemail w3-hide-small">
              <div class="emailinfo">
                  <a href="mailto:remoprint@msacad.com">remoteprint@msacad.com</a></div>
            </span>
             <span class="servicemail w3-hide-large w3-hide-medium">
              <div class="emailinfo">
                  <a href="<?php  echo base_url()?>">Remote-Print</a></div>
            </span>
        </div>
        <?php
        if(session_data('connect')=== true && session_data('admin') !== true ){
            ?>
            <div id="plc_lt_zoneFixedBar_FixedBar_HelloTxt" class="w3-hide-medium w3-hide-small"  style="text-align: right;padding-top: 5px; font-family: SansaReg; color: white">

                 Connecté en tant que <?php echo session_data('login'); ?>
            </span>

            </div>
            <?php
        }
        ?>
        <div class="clear"></div>

</div>
</div></div>

<!-- Menu horizontal -->
<div id="Header" style="background-color: white;">
    <div class="container" style="overflow: hidden; background-color: white;" >
        <style>
            #unibox-suggest-box {
                position: absolute;
                display: none;
                border: 1px solid #e5e5e5;
                background-color: #fff;
                color: #333;
                overflow: hidden;
                z-index: 1500;
            }
            #unibox-suggest-box h4 {
                margin-left: 8px;
                margin-top: 6px;
                font-size: 18px;
            }
            #unibox-suggest-box>div>div {
                padding: 6px 8px;
            }
            .unibox-selectable {
                clear: both;
                position: relative;
                font-family: sans-serif;
                font-size: 14px;
                text-align: left;
                display: block !important;
            }
            #unibox-suggest-box a {
                text-decoration: none;
                color: #ff5800;
            }
            .unibox-ca {
                clear: both;
            }
            .unibox-selectable img {
                max-width: 60px;
                max-height: 60px;
            }
            .unibox-selectable .unibox-selectable-img-container {
                width: 60px;
                float: left;
                margin-right: 6px;
            }
            br{
                background-color: white;
            }
        </style>
        <br style="color: white">

        <div class="header_div class "  >
            <a href="/" id="plc_lt_zoneHeader_HeaderQuickNavi_logo" class="header_logo"></a>
            <div id="plc_lt_zoneHeader_HeaderQuickNavi_ExternalLogo" class="header_external" style="margin-top: -10px">
                <a href="<?php  echo base_url();?>" class="w3-hide-small"  target="blank" style="margin-left: -250px"><img src="<?php echo img_url('REAL_2.png')?>" style="width: 300px;" /> </a><br>
                <i>Imprimez sans déprimer</i>
            </div>
            <div class="clear"></div>
        </div>
        <div class="quicknavi"  style="margin-top: -100px;background-color: white;">
            <?php
            if(session_data('connect')=== true && session_data('admin') !== true ){
                ?>
                <div class="qncart">
                    <a style="font-size: 12px"  href="<?php  echo base_url('client/notifications')?> " id="plc_lt_zoneHeader_HeaderQuickNavi_Login" class="qnlogin" rel="nofollow">
                        <label class="label label-success notif" style="margin-right: -18px;"></label>
                    <span style="margin-top: 0px;">
                        <i class="fa fa-bell-o" style="font-size: 40px"></i>
                        <br>
                        Notifications
                   </span>
                    </a>
                </div>
                <?php
            }
            ?>
            <div class="qncart">
                <a style="font-size: 12px"  href="<?php  echo base_url('client/appel')?> " id="plc_lt_zoneHeader_HeaderQuickNavi_Login" class="qnlogin" rel="nofollow">
                    <span style="margin-top: 19px;">
                    <i class="fa fa-phone" style="font-size: 40px"></i><br>
                    Lancer un appel d'offre
                </span>
                </a>
            </div>
            <div class="qnlinks">
            <?php if(session_data('connect') === false || session_data('admin') === true){
                ?>
                <a style="font-size: 12px"  href="<?php echo base_url('account/signIn')?>" id="plc_lt_zoneHeader_HeaderQuickNavi_Login" class="qnlogin" rel="nofollow">
                    <span style="margin-top: 19px;">
                    <i class="fa fa-user" style="font-size: 40px"></i><br>
                    Se connecter
                </span>
                </a>
                <?php
            } else{
                ?>
                <a style="font-size: 12px"  href="<?php echo base_url('account/logout')?>" id="plc_lt_zoneHeader_HeaderQuickNavi_Login" class="qnlogin" rel="nofollow">
                    <span style="margin-top: 19px;">
                    <i class="fa fa-sign-out" style="font-size: 40px"></i><br>
                    Se Deconnecter
                </span>
                </a>
                <?php
            }  ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="clear"></div>
    </div>
</div>
<div class="row">
    <div class="container-fluid w3-hide-small " style="background: #ff5800" >


                        <ul>
                            <li class="cat" id="c_1">
                                <a href="<?php  echo base_url()?>">Accueil</a></li>
                            <li class="cat" id="c_1">
                                <a  href="<?php  echo base_url('home/staticPage/qui-sommes-nous')?>">Qui sommes nous?</a></li>
                            <li class="cat" id="c_2">
                                <a href="#" >Nos services</a></li>
                            <li class="cat" id="c_3">
                                <a href="<?php if(session_data('connect') == true and session_data('role') == CLIENT)echo base_url('client') ; else echo base_url('secretariat') ?><?php  ?>" >Espace Membre</a></li>
                            <li class="cat" id="c_4">
                                <a  href="<?php  echo base_url('home/staticPage/aide-generale')?>">Aide générale</a></li>
                            <li class="cat" id="c_5">
                                <a  href="<?php  echo base_url('home/staticPage/statistique')?>">Statistiques</a></li>
                            <li class="cat" id="c_5">
                                <a  href="<?php  echo base_url('home/staticPage/faq')?>"> FAQ</a></li>

                        </ul>

    </div>


</div>
<nav class="navbar   w3-hide-medium w3-hide-large" style="background: #ff5800">
    <div class="container-fluid" >
        <center>
        <div class="navbar-header" style="color: white">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border: 1px solid white">
                <span class="icon-bar"  style="border: 1px solid white"></span>
                <span class="icon-bar"  style="border: 1px solid white"></span>
                <span class="icon-bar"  style="border: 1px solid white"></span>
            </button>
            <a class="navbar-brand" href="#">Menu</a>
        </div>
        </center>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" >
                <li ><a href="<?php  echo base_url()?>" style="color: white">Accueil</a></li>
                <li style="color: white"><a href="<?php  echo base_url('home/staticPage/qui-sommes-nous')?>"  style="color: white">Qui sommes nous?</a></li>
                <li><a href="#"  style="color: white">Nos services</a></li>
                <li><a  style="color: white" href="<?php if(session_data('connect') == true and session_data('role') == CLIENT)echo base_url('client') ; else echo base_url('secretariat') ?><?php  ?>" >Espace Membre</a></li>
                <li><a  style="color: white" href="<?php  echo base_url('home/staticPage/aide-generale')?>">Aide générale</a></li>
                <li><a  style="color: white" href="<?php  echo base_url('home/staticPage/statistique')?>">Statistiques</a></li>
                <li><a  style="color: white" href=""<?php  echo base_url('home/staticPage/faq')?>"">Faq</a></li>

            </ul>
        </div>
    </div>
</nav>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }


    .active {
        background-color: #4CAF50;
        color: white;
    }

    .topnav li .icon {
        display: none;
    }

    @media screen and (max-width: 600px) {
        .topnav .cat{display: none;}
        .topnav li  .icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        .topnav.responsive {position: relative;background: #ff5800}
        .topnav.responsive li .icon {
            color: white;
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive li
        {
            float: none;
            display: block;
            text-align: left;
        }
    }
</style>


<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

<script>
    $(function(){

        recupNotif();
        function recupNotif(){
            $.post("<?php echo site_url('client/notifications/countNotif'); ?>",function(data){
                $(".notif").text(data);
            });
        }
        setInterval(recupNotif,10000);
    });
</script>
