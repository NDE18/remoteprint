
<div class="row w3-padding-small">
    <h1 class="w3-center" style="text-decoration: underline;"><?= $titre[0] ?></h1>
    <div class="col-sm-6">
        <form action="" method="post">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="classe">Selectionner la classe:</label>
                            <select name="classe" id="classe" class="from-control select2" style="width: 100%">
                                <option selected="selected">6^eme</option>
                                <?php
                                for($i=0; $i<5; $i++)
                                    echo "<option>${i}^E</option>";
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="classe">Selectionner la matiere:</label>
                            <select name="classe" id="classe" class="from-control select2" style="width: 100%">
                                <option selected="selected">matiere 0</option>
                                <?php
                                for($i=1; $i<5; $i++)
                                    echo "<option>matiere ${i}</option>";
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>