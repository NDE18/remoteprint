<div class="modal-dialog">
    <form method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ouvrir un contencieux</h4>
            </div>
            <div class="modal-body">
                <h3> Vous etes sur le point d'ouvrir un contencieux</h3>
                <div class="col-md-8 col-md-offset-2"><br>

                    <label for="objet"> Objet</label>
                    <input type="text" class="form-control" name="objet" id="objet" required>
                    <label for="message"> Message</label>
                    <textarea class="form-control" name="message" id="message"> </textarea>
                    <input type="hidden" class="form-control" name="offre" value="<?php echo $offre ?>" required>
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary payer"  name="contencieux">Enrgistrer contencieux</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
</div>
