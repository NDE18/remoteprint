<?php
function analysepdf($nomfichier)
{
    header('content-type: application/json');
    mb_internal_encoding("UTF-8");

    $o = new stdClass();
    if (file_exists($nomfichier)){

        $commande = 'gs  -o - -q -sDEVICE=inkcov "' . $nomfichier . '"';
        $lignes = array();
        exec($commande, $lignes);
        $noir = 0;
        $couleur = 0;
        $blanche = 0;
        $pagesblanches=array();
        $pagesnoires=array();
        $pagescouleurs=array();
        $numeropage=0;

        foreach ($lignes as $ligne) {


            $cyan = substr($ligne, 1, 7);
            $magenta = substr($ligne, 10, 7);
            $yellow = substr($ligne, 19, 7);
            $black = substr($ligne, 28, 7);
            if (is_numeric($cyan)&& is_numeric($magenta) && is_numeric($yellow) && is_numeric($black)){ // si la ligne contient bien une ligne de valeurs
                $numeropage++; // on ajoute 1 a la ligne en cours
                if((($cyan+$magenta+$yellow)==0)){
                    $noir++;
                    if($black==0) {
                        $pagesblanches[]=$numeropage;
                        $blanche++;
                    }
                    $pagesnoires[]=$numeropage;
                }else{
                    $couleur++;
                    $pagescouleurs[]=$numeropage;
                }
            }

        }
        $o->listepagescouleurs=implode(",",$pagescouleurs);
        $o->listepagesnoires=implode(",",$pagesnoires);
        $o->listepagesblanches=implode(",",$pagesblanches);
        $o->totalpages = $numeropage;
        $o->pagesnoires = $noir;
        $o->pagescouleurs = $couleur;
        $o->pagesblanches = $blanche;
    }
    return json_encode($o);
}
function doc2pdf($doc,$pdf)
{
// Pas de paramétres requis
    $empty = new VARIANT();

    /* Supression du pdf si il existe */
    if(file_exists ($pdf))
        @unlink($pdf);

    /* Démarrage de Word */
    $w = new COM("word.application") or die("Impossible d'instancier l'application Word");

    /* Test de Word 2007 */
    if($w->Version > 11)
    {
        /* Amener Word devant */
        $w->Visible = 1;

        /* Test du fichier */
        if(file_exists ($doc))
            $w->Documents->Open($doc);
        else
            return false;

        /* Quelques commandes */
        $w->Documents[0]->SaveAs($pdf,17);

        /* Fermeture de word */
        $w->Documents[0]->Close(false);
    }
    $w->Quit($empty,$empty,$empty);


    /* Libération des ressources */
    $w = null;
    unset($w);

    /* Test du fichier */
    if(file_exists ($pdf))
        return true;
    else
        return false;

}
?>
<div class="w3l_banner_nav_right">
    <section class="slider">
        <div class="flexslider"
            <ul class="slides">
                <li>
                    <div class="w3l_banner_nav_right_banner">
                        <h3 style="color: orangered">Presentez  <span>Nous</span> Imprimons</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="En savoir plus">En savoir plus</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner1">
                        <h3 style="color: orangered">Commandez  <i> nous livrons</i> </h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="En savoir plus">En savoir plus</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner2">
                        <h3 style="color: orangered">Imaginez  <i> nous créons</i> </h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="En savoir plus">En savoir plus</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- flexSlider -->
    <link rel="stylesheet" href="<?php echo css_url('flexslider'); ?>" type="text/css" media="screen" property="" />
    <script defer src="<?php echo js_url('jquery.flexslider'); ?>"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!-- //flexSlider -->
</div>
<div class="clearfix"></div>
</div>

<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h3>Découvrez nos différents services</h3>
        <div class="agile_top_brands_grids">

            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="single.html"><img title=" " alt=" " src=<?php echo img_url('visite.jpg');  ?> /></a>

                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="#" method="post">
                                            <label>Impression carte de visite</label>
                                            <fieldset>
                                                <input type="submit" name="submit" value="Découvrir ce service" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="single.html"><img title=" " alt=" " src=<?php echo img_url('memoire.jpg');  ?> /></a>

                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="#" method="post">
                                            <label>Impression des mémoires</label>
                                            <fieldset>
                                                <input type="submit" name="submit" value="Découvrir ce service" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="single.html"><img title=" " alt=" " src=<?php echo img_url('calendrier.jpg');  ?> /></a>

                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="#" method="post">
                                            <label>Impression des calendriers</label>
                                            <fieldset>
                                                <input type="submit" name="submit" value="Découvrir ce service" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <a href="single.html"><img title=" " alt=" " src=<?php echo img_url('flyers.jpg');  ?> /></a>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="#" method="post">
                                            <label>Impression des flyers et autre</label>
                                            <fieldset>
                                                <input type="submit" name="submit" value="Découvrir ce service" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>


            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->

<!-- //fresh-vegetables -->
<!-- newsletter -->

<!-- //newsletter -->
<!-- footer -->

<!-- //footer -->
<!-- Bootstrap Core JavaScript -->

<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->

<script>
    paypal.minicart.render();

    paypal.minicart.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });

</script>

