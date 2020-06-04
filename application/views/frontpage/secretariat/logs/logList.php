<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Liste des logs

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Logs</li>
        </ol>
    </section>

    <section class="content">
        <div class="callout callout-info">
            <h4>Information !</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>
        <div class="col-sm-12 table-responsive">
            <div class="modal  fade" id="modal-defaut">
            </div>
            <div class="box box-default">

                <div class="box-body">

                    <div class="row">
                        <div style="" class="col-sm-12 ">

                            <form  method="post">

                                <fieldset>
                                    <legend>Effectuer un filtre</legend>
                                    <div class="row">

                                        <div class="col-sm-12 col-md-6 mb-1">
                                            <div class="input-group">
                                                <label for="debut" class="l-200">Jour (Début)</label>
                                                <input type="date" name="debut" value="<?php echo set_value('debut') ?>" class="form-control datepicker" placeholder="" id="debut" data-date-end-date="0d">
                                            </div>
                                            <?php echo form_error('debut') ?>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mb-1">
                                            <div class="input-group">
                                                <label for="fin" class="l-200">Jour (Fin)</label>
                                                <input type="date" name="fin" value="<?php echo set_value('fin') ?>" class="form-control datepicker" placeholder="" id="fin" data-date-end-date="0d">
                                            </div>
                                            <?php echo form_error('fin') ?>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mb-1">
                                            <div class="input-group">
                                                <label for="cuser" class="l-200">Pseudo</label>
                                                <select name="cuser" id="" class="form-control select2">
                                                    <option value="allcuser" <?php echo set_select('cuser', 'allcuser') ?>><em>Tout</em></option>
                                                    <option value="NULL" <?php echo set_select('cuser', 0) ?>><em>SYSTÈME</em></option>
                                                    <?php if (!empty($cusers))
                                                        foreach ($cusers as $cuser){
                                                            ?>
                                                            <option value="<?php echo $cuser->id ?>" <?php echo set_select('cuser', $cuser->id) ?> <?php  echo ($user == $cuser->id)? "selected":""?>><?php echo $cuser->login ?></option>
                                                        <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('cuser') ?>
                                        </div>
                                        <div class="col-sm-12 col-md-6 mb-1">
                                            <div class="input-group">
                                                <label for="cat" class="l-200">Catégorie</label>
                                                <select name="cat" id="" class="form-control">
                                                    <option value="allcat" <?php echo set_select('cat', 'allcat') ?>><em>Tout</em></option>
                                                    <option value="<?php echo LOGAPPELOFFRE?>" <?php echo set_select('cat', LOGAPPELOFFRE) ?>>Appels d'offre</option>
                                                    <option value="<?php echo LOGCOMPTE ?>" <?php echo set_select('cat', LOGCOMPTE) ?>>Compte</option>
                                                    <option value="<?php echo LOGIMPRESSION ?>" <?php echo set_select('cat', LOGIMPRESSION) ?>>Impression</option>

                                                </select>
                                            </div>
                                            <?php echo form_error('cat') ?>
                                        </div>

                                        <div class="col-sm-12 col-md-6 mb-1">
                                            <div class="input-group">
                                                <br>
                                                <button class="btn btn-primary">Filtrer</button>
                                            </div>

                                        </div>


                                    </div>
                                </fieldset>
                            </form>
                        </div>

                        <div class="col-sm-12 table-responsive" id="table-content">
                            <?php if(isset($title)){
                                echo "<h3>Liste des logs de $title et de la catégorie</h3>";

                            } ?>
                            <table class="table table-bordered table-hover small" width="100%" id="dataTable" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="text-center hide">N&#176;</th>
                                    <th>Auteur</th>
                                    <th>Date et heure</th>
                                    <th>Message</th>
                                    <th>Catégorie</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //$k = 0;
                                if(is_array($logs) and !empty($logs)) {
                                    foreach($logs as $log){
                                        ?>
                                        <tr>
                                            <td class="text-center hide"><?php echo ++$k; ?></td>

                                            <td class=""><?php echo  mb_strtoupper($log->nom) . ' ' . ucfirst(mb_strtolower($log->prenom)) ?>
                                                <br>
                                                <b>Cuser : <?php echo $log->cuser ?></b><br>
                                                Tel: <?php echo $log->tel ;?>
                                            </td>


                                            <td class="">
                                                <?php echo "Le ".moment($log->date_log )->format("d-m-Y à H:i:s") ?><br>
                                            </td>

                                            <td>
                                                <?php echo $log->message ?><br>
                                            </td>
                                            <td>
                                                <?php
                                                switch ($log->categorie)
                                                {
                                                    case LOGAPPELOFFRE: echo "Appel offre"; break;
                                                    case LOGCOMPTE: echo "Compte"; break;
                                                    case LOGIMPRESSION: echo "Impression"; break;
                                                    default: echo "Non défini..."; break;
                                                }
                                                ?><br>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- /.box-body -->
                </div>
            </div>

        </div>


    </section>
</div>
<script>
    $(function(){
        $("table").DataTable();

    });

</script>