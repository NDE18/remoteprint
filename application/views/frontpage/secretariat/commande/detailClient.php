
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <b><h2 class="modal-title text-success">Informations du client <?php echo $client->numeroClient ?></h2></b>
        </div>
        <div class="modal-body">

            <div class="row" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 15px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nom: <b><?php echo ucfirst($client->nom)?></b></label>

                    </div>
                    <div class="form-group">
                        <label>Numero téléphone: </label>
                        <?php echo $client->telephone; ?>
                    </div>
                    <div class="form-group">
                        <label>Adresse Email: </label>
                        <b><?php echo $client->mail ?></b>
                    </div>
                </div>

            </div>

            <hr>

            <div class="container-fluid" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 12px;">

            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>

