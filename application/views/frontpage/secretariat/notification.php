<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Vos notifications

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">notifications</li>
        </ol>
    </section>

    <section class="content">
        <div class="col-sm-12 table-responsive">

            <div class="box box-default">

                <div class="box-body">

                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <br>
                            <table class="table table-bordered table-hover table-striped table-responsive" width="100%" id="dataTable" cellspacing="0" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Contenu</th>
                                    <th>Option</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $i = 0;
                                foreach($notifications as $notification){
                                    $i++;
                                    $date = moment($notification->dateReception);
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><div> <?php  echo $notification->message?> </div><div class="w3-margin-top w3-small">Envoyé par <b>Remote-print</b>
                                                <i class="w3-tiny w3-text-dark-grey w3-hide-small"><span class=""><?php echo $date->fromNow()->getRelative()?></span></i></div></td>
                                        <td><a id="<?php echo $notification->id ?>" class="btn btn-primary rounded  tool link" href="<?php echo base_url($notification->url)?>"
                                               data-placement="bottom" title="Plus de détails"><i
                                                    class="fa  fa-link"></i> </a>
                                        </td>

                                    </tr>
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
    $("table").DataTable();
</script>