<?php

?>
<div class="col-sm-12 col-lg-6 ">
    <div class="col-sm-12">
        <div class="input-group">
            <label for="lastName" class="input-group-addon">Nombre d'exemplaires*</label>
            <input type="number" min="1" name="nombreEx" class="form-control"  value="1" required>
        </div>
        <?php
        foreach($caracteristique as $carac){
        ?>
        <div class="input-group">
            <label for="lastName" class="input-group-addon"><?php echo ucfirst($carac->nom) ?></label>


            <select class="form-control" name="<?php echo "valeur$carac->id"?>">
                <?php $critere = json_decode($carac->detail);
                foreach($critere as $key=>$value){
                ?>
                <option value="<?php echo $value?>"><?php  echo $value?></option>
                <?php  }?>
            </select>
        </div>
      <?php  }?>


    </div>
</div>
<div class="col-sm-12 col-lg-6 ">
    <div class="row mb-2">
        <div class="col-sm-10">


            <div class="input-group">
                <label for="lastName" class="input-group-addon" > Autre détail* </label>
                <textarea class="form-control" name="description" id="description" rows="5"  placeholder="" ></textarea>

            </div>
            <button name="submitButton" type="submit" class="btn btn-primary " id="btnSuivant">Lancer mon appel</button>


        </div>
    </div>
</div>
<script>
    $('#description').wysihtml5();
</script>

