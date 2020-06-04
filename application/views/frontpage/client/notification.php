<script>
    <?php
    if($val = get_flash_data()){
            echo 'swal({   title: "Succes",   text: "'.$val.'",   type: "success"}, function(){   });';
            }
     ?>
</script>


    <section class="slider" >
        <div class="top-brands" >
            <div class="modal  fade" id="modal-defaut">
            </div>

            <h3 style="margin-top: -40px">Mes notifications</h3><br>

            <div class="container-fluid table-responsive"style="background-color: white" >
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


        </div></section>
    <!-- //flexSlider -->


<script>
    $(function(){
        $("table").DataTable();
        $('.tool').tooltip({
            "html" : true,
            "placement": "bottom",
            "trigger": "hover",
            "template": '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
        });


    });

</script>