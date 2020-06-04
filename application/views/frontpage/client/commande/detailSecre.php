
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <b><h2 class="modal-title text-success">Informations du secretariat</h2></b>
        </div>
        <div class="modal-body">

            <div class="row" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-size: 15px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label style="font-weight: normal">Nom du sécrétariat: <b><?php echo ucfirst($secre->nomsecretariat)?></b></label>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: normal">Numero téléphone: <b><?php echo ucfirst($secre->telephone)?></b></label>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: normal">Adresse: <b><?php echo "$secre->nomregion $secre->ville $secre->quartier" ?></b></label>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>

