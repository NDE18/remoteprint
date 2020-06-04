<div class="agileits_header">
    <div class="w3l_offers" style="margin-left: 350px">
        <a href="<?php echo base_url('client/appel')?>">Lancer un appel d'offre</a>
    </div>
   <!-- <div class="w3l_search" style="<?php echo (session_data('connect') === false)?"margin-left: 250px":"" ?>">
        <form action="#" method="post">
            <input type="text" name="Product" value="Recherche..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
            <input type="submit" value=" ">
        </form>
    </div>-->

    <?php  if(session_data('connect') !== true or session_data('admin') === true){
        ?>
        <!--<div class="product_list_header">
            <form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
        </div>
        <div class="w3l_header_right">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="<?php echo base_url('account/signUp')?>"">Je m'inscris</a></li>
                                <li><a href="<?php echo base_url('account/signIn')?>">Je me connecte</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>!-->
        <div class="w3l_header_right1">
            <h2><a href="<?php  echo base_url('account/signIn')?>" ><i class="fa fa-sign-in"></i> Connexion</a></h2>
        </div>
        <?php
    }else{
        ?>
        <?php if(session_data('role') == CLIENT){
            ?>
        <div class="w3l_header_right">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i> </a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="<?php echo base_url('secretariat/home')?>"><?php echo (session_data('role') == CLIENT)? "Compte membre": "Compte secetariat"; ?></a></li>
                                <li><a href="<?php echo base_url('account/logout')?>">Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="w3l_header_right">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> </a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="<?php echo base_url('secretariat/home')?>"><?php echo (session_data('role') == CLIENT)? "Compte membre": "Compte secetariat"; ?></a></li>
                                <li><a href="<?php echo base_url('account/logout')?>">Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
            <?php }?>
        <?php  if(session_data('role') == SECRETARIAT){
            ?>
            <div class="w3l_header_right" style="color: black;">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o" style="color: #212121; background-color:#212121" ></i> </a>
                        <div class="mega-dropdown-menu">
                            <div class="w3ls_vegetables">
                                <ul class="dropdown-menu drp-mnu">
                                    <li><a style="color: black" href="<?php echo base_url('secretariat/home')?>"><?php echo (session_data('role') == CLIENT)? "Compte membre": "Compte secetariat"; ?></a></li>
                                    <li><a style="color: black" href="<?php echo base_url('account/logout')?>">Déconnexion</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        }?>
        <div class="w3l_header_right">
            <ul>


                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo session_data('login'); ?><span class="caret"></span></a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="<?php echo (session_data('role') == CLIENT)? base_url('client/home'): base_url('secretariat/home'); ?>"><?php echo (session_data('role') == CLIENT)? "Espace membre": "Espace secetariat"; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="w3l_header_right1">
            <h2><a href="<?php echo base_url('account/logout')?>" ><i class="fa fa-sign-out"></i> Déconnexion</a></h2>
        </div>
        <?php
    }?>


    <div class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".agileits_header").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <a href="<?php echo base_url()?>"><img src="<?php echo img_url('REAL_2.png'); ?>" style="width: 350px;"></a>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                <li><a href="events.html">Accueil</a><i>/</i></li>
                <li><a href="about.html">Règles d'utilisation</a><i>/</i></li>
                <li><a href="products.html">Nos services</a></li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone " aria-hidden="true"></i>699672018</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">Remoteprint@yahoo.fr</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>