<?php
foreach($villes as $ville){
    ?>
    <option value="<?php echo $ville->id?>"><?php echo $ville->ville?></option>
    <?php
}