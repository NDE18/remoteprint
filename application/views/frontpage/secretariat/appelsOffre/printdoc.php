<?php
$i = 0;
foreach($documents as $document){
    $i++;
    $tab = explode('/',$document->lien);
    $variable = array_pop($tab);

    ?>

    <label>Fichier<?php echo " ". $i ?><em>(<?php echo $document->nombrepage." "?>pages)</em></label> <a href="#" id="<?php echo $variable ?>" data-type="<?php echo $document->type ?>" class="text-success apercu">Cliquez ici pour voir</a><br>
    <?php

}
?>
<style>
    #example1{
        filter: blur(4px);
    }
</style>




            <div id="example1" style="height: 700px; display: none" ></div>
            <script src="<?php echo js_url('pdfobject.min')?>"></script>
            <script>
                var options = {
                    pdfOpenParams: {
                        navpanes: 0,
                        toolbar: 0,
                        statusbar: 0,
                        pagemode: "thumbs",
                        view: "FitV"
                    }
                };
                $(".apercu").click(function(){
                    $("#example1").show();
                    var doc = $(this).attr("id");
                    var type = $(this).attr("data-type");
                    if(type == 'application/pdf'){
                        PDFObject.embed("<?php echo base_url('assets/uploads/documents/')?>"+doc, "#example1", options);
                    }else{
                        src = '<?php echo base_url('assets/uploads/documents/')?>'+doc;
                        var html = "<img src="+src+"  class='img-responsive'>";
                        $("#example1").html(html);
                    }

                });


            </script>

