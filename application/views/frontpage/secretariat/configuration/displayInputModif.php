<?php

?>
<div class="col-md-6">
    <?php
    $count = 0;
    foreach($caracteristique as $carac){
    $count++;
    if($count == 4){
    ?>
</div>
<div class="col-md-6">
    <?php
    }
    ?>
    <div class="box box-default">
        <div class="box-header with-border">
            <h4><?php  echo ucfirst($carac->nom) ?></h4>
        </div>
        <div class="box-body">
            <?php
            $critere = json_decode($carac->detail);
            foreach($critere as $key=>$value){
                ?>

                <div class="form-group">
                    <label><?php echo "Prix $value" ?></label>

                    <input type="number" step="any"  name="<?php echo "prix$value" ?>" value="<?php echo setValue($carac->id,$value)?>" class="form-control" required>

                </div>


                <?php

            }?>
            <label>
                <input type="checkbox"   name="<?php echo "check$carac->nom" ?>" <?php echo (allpage(intval($carac->id)) == 1)? "checked":""?>>
                Appliquer à toutes les pages choisies
            </label>
        </div>
    </div><?php

    }?>
</div>
<script>
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_flat-green'
    });
</script>
