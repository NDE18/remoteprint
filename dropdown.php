
public function myformAjax($id) {

$result = $this->db->where("state_id",$id)->get("demo_cities")->result();

echo json_encode($result);

}

<div class="form-group">

<label for="title">Select State:</label>

<select name="state" class="form-control" style="width:350px">

<option value="">--- Select State ---</option>

<?php

foreach ($states as $key => $value) {

echo "<option value='".$value->id."'>".$value->name."</option>";

}

?>

</select>

</div>


<div class="form-group">

<label for="title">Select City:</label>

<select name="city" class="form-control" style="width:350px">

</select>

</div>


</div>

</div>

</div>

<script type="text/javascript">


 $(document).ready(function() {

    $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
        if(stateID) { 
            $.ajax(
            {url: '/myform/ajax/'+stateID,
            type: "GET",
            dataType: "json",

            success:function(data) {

            $('select[name="city"]').empty();

            $.each(data, function(key, value) {

            $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
            });

            }

            });

            }else{

            $('select[name="city"]').empty();}

            });

            });

</script>
<!-- <script language="javascript">

 $(document).ready(function() {

$('select[name="region"]').on('change', function() {
        var stateID = $(this).val();
        if(stateID) { 
            $.ajax(
            {url: '/myform/ajax/'+stateID,
            type: "GET",
            dataType: "json",
            success:function(data) {
             $('select[name="region"]').empty();
             $.each(data, function(key, value) {
            $('select[name="region"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');});
            }});
            }else{

            $('select[name="city"]').empty();} });

            });
  </script>-->

