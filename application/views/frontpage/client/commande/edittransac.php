
    <div class="modal-dialog">
        <form method="post">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Nouvelle tentative de saisie du numéro de transaction</h4>
        </div>
        <div class="modal-body">
            <h3> Veuillez entrer à nouveau le numéro de transation</h3>
            <div class="col-md-8 col-md-offset-2"><br>
                <span class="number"><i class="fa fa-exclamation-triangle"></i>  </span> Il vous reste <?php echo (3 - $tenta)." tentatives"?><br>
                <label>Numéro de transaction</label>
                <input type="text" class="form-control" name="numeroTransac" required>
                <input type="hidden" class="form-control" name="offre" value="<?php echo $offre ?>" required>
            </div>
        </div>
        <div class="modal-footer">

            <button type="submit" class="btn btn-primary payer"  name="transaction">Enregistrer</button>
        </div>
    </div>
    <!-- /.modal-content -->
        </form>
    </div>
