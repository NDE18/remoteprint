<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?php echo base_url();?> ">Accueil</a></li>
            <?php foreach($pages as $page){
                ?>
                <li><a href="#"><span>|</span><?php echo $page?></a></li>
                <?php
            }?>

        </ul>
    </div>
</div>
