<section class="slider">
    <div class="flexslider">
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



<div class="top-brands">
    <div class="container">
        <h3 style="margin-top: -40px">Qui sommes nous ?</h3>
        <div id="Products" >


            <script type="text/javascript">
                var ts = '';
                $(document).ready(function () {
                    $("#P1,#P2,#P3,#P4,#P5,#P6,#P7,#P8,#P9,#P10").hide();
                    ts = $('#productframe').html();
                    ProductTileAim();
                });

                function ProductTileAim() {
                    $("#ProductNavi .productselektor").menuAim({
                        rowSelector: "div.product",
                        tolerance: 200,
                        activate: function (a) {
                            switchcontent($(a));
                        },
                        deactivate: function (a) {
                            switchcontent($(a));
                        },
                        exitMenu: function () {
                            return true;
                        }
                    });
                }

                function switchcontent(el) {

                    $("#WzTtDiV").css("visibility", "hidden");

                    if (el.hasClass('active') || !el.attr("contentId")) {
                        return;
                    }

                    $(".product").removeClass('active');
                    el.addClass('active');

                    var content = $('#' + el.attr("contentId")).html();
                    if (el.attr("contentId") == 'P0') {
                        content = ts;
                    }
                    $('#productframe').fadeOut(100, function () {
                        $('#productframe').html(content).fadeIn(100);
                    });
                }

            </script>

            <div class="row c productgrid text-center" style="padding: 22px;">
                <p style=" font-family: 'Times New Roman' "> Remote Print est une application développée par le département de développement de MultiSoft
                    Academy
               . Elle est née du constat des difficultés d’impression rencontrées par certaines personnes. Si
                l’impression sur certains formats comme A4 avec support papier semblent être facile à effectuer, pour
                d’autres formats et supports ce n’est pas toujours le cas. Et encore, la qualité recherchée n’est pas
                toujours au rendez-vous. Et pourtant il existe des imprimeurs capables d’offrir l’impression sur format et
                support recherchés, avec la qualité recherchée. De plus, la compétitivité entre les imprimeurs vous
                assurera d’avoir des prix également compétitifs.
                Certainement avec Remote Print, vous allez « Imprimer sans déprimer ».
                MultiSoft Academy est une startup située à Ngaoundéré et ayant deux principales activités : les
                formations en métier du numérique, et le développement de services numériques.</p><br>
               <a href="https://www.msacad.com" style="color: orangered">Consulter la liste des services de MultiSoft.</a><br>
                <a href="https://www.msacad.com/service" style="color: orangered">Voir la Team de MultiSoft</a>

            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--    <div class="top-brands" >-->
<!--        <div class="container" >-->
<!--            -->
<!--            <div class="agile_top_brands_grids">-->
<!--              <div class="row">-->
<!--                <div class="col-md-3 top_brand_left">-->
<!--                    <div class="hover14 column">-->
<!--                        <div class="agile_top_brand_left_grid">-->
<!--                            <div class="agile_top_brand_left_grid1">-->
<!--                                <figure>-->
<!--                                    <div class="snipcart-item block" >-->
<!--                                        <div class="snipcart-thumb">-->
<!--                                            <a href="single.html"><img title=" " alt=" " src=--><?php //echo img_url('visite.jpg');  ?><!-- /></a>-->
<!---->
<!--                                        </div>-->
<!--                                        <div class="snipcart-details top_brand_home_details">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <label>Impression carte de visite</label>-->
<!--                                                <fieldset>-->
<!--                                                    <input type="submit" name="submit" value="Découvrir ce service" class="button" />-->
<!--                                                </fieldset>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </figure>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-3 top_brand_left">-->
<!--                    <div class="hover14 column">-->
<!--                        <div class="agile_top_brand_left_grid">-->
<!--                            <div class="agile_top_brand_left_grid1">-->
<!--                                <figure>-->
<!--                                    <div class="snipcart-item block" >-->
<!--                                        <div class="snipcart-thumb">-->
<!--                                            <a href="single.html"><img title=" " alt=" " src=--><?php //echo img_url('memoire.jpg');  ?><!-- /></a>-->
<!---->
<!--                                        </div>-->
<!--                                        <div class="snipcart-details top_brand_home_details">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <label>Impression des mémoires</label>-->
<!--                                                <fieldset>-->
<!--                                                    <input type="submit" name="submit" value="Découvrir ce service" class="button" />-->
<!--                                                </fieldset>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </figure>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-3 top_brand_left">-->
<!--                    <div class="hover14 column">-->
<!--                        <div class="agile_top_brand_left_grid">-->
<!--                            <div class="agile_top_brand_left_grid1">-->
<!--                                <figure>-->
<!--                                    <div class="snipcart-item block" >-->
<!--                                        <div class="snipcart-thumb">-->
<!--                                            <a href="single.html"><img title=" " alt=" " src=--><?php //echo img_url('calendrier.jpg');  ?><!-- /></a>-->
<!---->
<!--                                        </div>-->
<!--                                        <div class="snipcart-details top_brand_home_details">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <label>Impression des calendriers</label>-->
<!--                                                <fieldset>-->
<!--                                                    <input type="submit" name="submit" value="Découvrir ce service" class="button" />-->
<!--                                                </fieldset>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </figure>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-3 top_brand_left">-->
<!--                    <div class="hover14 column">-->
<!--                        <div class="agile_top_brand_left_grid">-->
<!--                            <div class="agile_top_brand_left_grid1">-->
<!--                                <figure>-->
<!--                                    <div class="snipcart-item block" >-->
<!--                                        <div class="snipcart-thumb">-->
<!--                                            <a href="single.html"><img title=" " alt=" " src=--><?php //echo img_url('flyers.jpg');  ?><!-- /></a>-->
<!--                                        </div>-->
<!--                                        <div class="snipcart-details top_brand_home_details">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <label>Impression des flyers et autre</label>-->
<!--                                                <fieldset>-->
<!--                                                    <input type="submit" name="submit" value="Découvrir ce service" class="button" />-->
<!--                                                </fieldset>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </figure>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--              </div>-->
<!---->
<!---->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->



