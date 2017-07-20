<script type="text/javascript">
function get_ingredient() {
    var ingredient = document.getElementById("ingredient").value;
    console.log(ingredient);
    if(ingredient != 0)
    {
        $.ajax({
            data: {
                ingredient: ingredient
            },
            url: '<?php echo site_url('Reports/get_ingredient_description'); ?>',
            type:'POST',

            cache: false,
            success: function(data){
                visualize_description(data);

            }
        });
    }
    else{
         document.getElementById("description").innerHTML = "";
    }
}
function visualize_description(data)
{
    var object = jQuery.parseJSON(data);
    
    //console.log('returned');
    //console.log(object.description);
    document.getElementById("description").innerHTML = object.note;
}
function get_treatment_details() 
{
    var treatment = document.getElementById("treatment").value;
    //console.log(sickness);
    $.ajax({
        data: {
            treatment: treatment
        },
        url: '<?php echo site_url('Reports/load_treatment'); ?>',
        type:'POST',
        
        cache: false,
        success: function(data){
            fill_treatment(data);
        }
    });
}
function fill_treatment(data)
{
    var object = jQuery.parseJSON(data);
    console.log(object);
    //get elements that have to be loaded
    var notes =document.getElementById("treatment_notes");
    var ingredient = document.getElementById("ingredient");
    var dosage =document.getElementById("dosage");
    var times = document.getElementById("times");
    var taken = document.getElementById('taken_for');
    var count = document.getElementById("treatment_count");
    var period = document.getElementById('each_period');
    
    if(object.treatmentID != 0)
    //load elements if selected treatment is "old"
    {
        // treatments_for_sicknesses.id, treatments.name ,dosage, count_each, each_period, for_period, for_count, treatments_details.note
        
        notes.value = object.treatment_details[0]['note'];
        notes.readOnly = true;
        
        ingredient.value = object.treatment_details[0]['id'];
        ingredient.disabled = true;
        get_ingredient();
       
        dosage.value = object.treatment_details[0]['dosage'];
        dosage.readOnly = true;
        
        times.value = object.treatment_details[0]['for_count'];
        times.readOnly = true;
        
        taken.value = object.treatment_details[0]['for_period'];
        taken.disabled = true;

        
        count.value = object.treatment_details[0]['count_each'];
        count.readOnly = true;
        
        period.value = object.treatment_details[0]['each_period'];
        period.disabled = true;
    }
    else
    //unlock fileds to create new treatment
    {
       
        notes.value = '';
        notes.readOnly = false;
        
        ingredient.selectedIndex = 0;
        ingredient.disabled = false;
        get_ingredient();
        
        dosage.value = '';
        dosage.readOnly = false;
        
        times.value ='';
        times.readOnly = false;
        
        taken.selectedIndex = 0;
        taken.disabled = false;

        
        count.value = '';
        count.readOnly = false;
        
        period.selectedIndex = 0;
        period.disabled = false;
    }
}
</script>