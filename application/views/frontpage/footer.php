
</div></div></div>
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

<div id="Claim"></div>
<div class="clear"></div>
<div class="col-md-10 col-md-offset-1">
    <div id="OrangeBorder"></div>
</div>

<div class="footer" style="background-color: #000">
    <div class="container">
        <div class="col-md-3 w3_footer_grid">
            <h3>informations</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="#">A propos</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Espace menbre</a></li>
                <li><a href="#">Aide générale</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>
        <div class="col-md-4 w3_footer_grid">
            <h3>NOTRE NEWSLETTER</h3>
            <div class="">
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="emai" class="form-control" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Je m'abonne" class="form-control btn-warning">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-5 w3_footer_grid">
            <div class="container">
                <div class="col-md-2">
                    <h3>Contact </h3>
                    <ul class="w3_footer_grid_list">
                        <li><a href="#">Téléphone :  698400747 / 674076824 </a></li>
                        <li><a href="#">Email :  remoteprint@msacad.com</a></li>
                        <li><a href="#">Horaires : Lun - ven : 9h - 20h  </a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3> Suivez nous sur</h3>
                    <ul class="agileits_social_icons">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="agile_footer_grids">
            <div class="clearfix"> </div>
        </div>
        <div class="wthree_footer_copy">
            <p>REMOTE-PRINT © 2017-2018 . Conception | développement par <a href="www.lefindex.com">Lefindex</a></p>
        </div>
    </div>
</div>

