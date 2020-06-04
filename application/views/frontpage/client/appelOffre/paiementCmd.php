<style>
    .number {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 24px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        background-color: rgb(255,102,0);
        border-radius: 10px;
        height: 30px;
        margin-top: 0px;
        opacity: .8;
    }
</style>
<form method="post">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Paiement commande</h4>
            </div>
            <div class="modal-body">
                <h3> Veuillez suivre ces étapes pour finaliser votre commande</h3>
                <div class="col-md-8 col-md-offset-2"><br>
                    <span class="number">1 </span>  Effectuez un dépot de "<b><?php  echo $prixT?> FCFA</b>" à l'un de ces numéros :<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>699672078</b> ou <b>674076824</b><br>
                    <span class="number">2 </span> Saisissez le numero de transaction recu <br><br>
                    <label>Numéro de transaction</label>
                    <input type="text" class="form-control" name="numeroTransac" required>
                    <input type="hidden" class="form-control" name="secre" value="<?php echo $secre ?>" required>
                    <input type="hidden" class="form-control" name="Appeloffre" value="<?php echo $offre ?>" required>
                    <input type="hidden" class="form-control" name="offre" value="<?php echo $offres ?>" required>


                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary payer"  name="submit">Effectuez votre paiement</button>
            </div>
        </div>
        <!-- /.modal-content -->

</form>




