
<script type="text/javascript">
function get_sickness_description() {
    var sickness = document.getElementById("sickness").value;
    //console.log(sickness);
    $.ajax({
        data: {
            sickness: sickness
        },
        url: '<?php echo site_url('Reports/get_sickness_description'); ?>',
        type:'POST',
        
        cache: false,
        success: function(data){
            visualize_description(data);

        }
    })
}
function visualize_description(data)
{
    var object = jQuery.parseJSON(data);
    
    //console.log('returned');
    //console.log(object.description);
    document.getElementById("description").innerHTML = object.description;
}
</script>


<?php
    echo form_open('Reports/search_for_report');

    echo form_dropdown('sickness',$dropdownSick,null,'id ="sickness" onChange="get_sickness_description()"' );
    echo "<br/>";
    echo "<br/>";
    echo form_submit('submit','Search');
    echo "<br/>";
    echo "<br/>";
?>
<div><h5> Description of disease/case :</h5></div>
<div class="sickness_description" id="description"></div>