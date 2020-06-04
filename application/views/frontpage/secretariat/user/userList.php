<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Liste des Utilisateurs

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Liste des Utilisateurs</li>
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
                    <a href="<?php echo base_url('secretariat/users/add')?>" class="btn btn-success"><i class="fa fa-users"></i>Ajouter </a>
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <br>
                            <table class="table table-bordered table-hover table-responsive" width="100%" id="dataTable" cellspacing="0">
                                <tfoot style="display: table-header-group;">
                                <tr>
                                    <th>#</th>
                                    <th>Noms et prénoms</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Login</th>

                                </tr>
                                </tfoot>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Noms et prénoms</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Login</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody id="display">

                                <?php
                                $i = 0;

                                foreach($lists as $list){
                                    $i ++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo strtoupper($list->nom).' '.$list->prenom ?></td>
                                        <td><?php echo $list->telephone?></td>
                                        <td><?php echo $list->mail ?></td>
                                        <td><?php echo $list->login ?></td>
                                        <td class="text-center">
                                                <a id="<?php echo $list->id ?>" class="btn btn-danger rounded tool fa fa-lock locked" data-toggle="tooltip" data-placement="bottom"  title="Bloquer"></a>
                                                <a href="<?php echo base_url('secretariat/logs/showAll/'.$list->id)?>"  class="btn btn-primary rounded tool fa fa-history " data-toggle="tooltip" data-placement="bottom" title="Voir les logs" ></a>
                                        </td>
                                    </tr>
                                    <?php

                                    ?>

                                    <?php

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
        $("table").DataTable( {
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value="">Afficher tout</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        } );

    });

</script>