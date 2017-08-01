<script type="text/javascript">
function save_data(){
    
    var toSend =" <?php echo base64_encode(json_encode($entries)); ?> ";
    var dropdowns = " <?php echo base64_encode(json_encode($dropdowns)); ?>"
    //console.log(data);
    //toSend = Base64._utf8_encode(toSend);
    if(toSend != 0)
    {
        console.log(toSend);
        $.ajax({
            data: {data : toSend , drop : dropdowns},
            url: '<?php echo site_url('Form/save_form'); ?>',
            type:'POST',
            cache: false,
            success: function(data){
               // visualize_description(data);
               //select 2;
               console.log(data);
               alert("Success");
            }
        });
    }
}
</script>
<?php
$js = ' onClick="save_data()"';

//echo form_submit('button','Save', $js);
echo form_button('button','Save', $js);
?>


