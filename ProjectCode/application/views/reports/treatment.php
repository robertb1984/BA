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
    //unlock fields to create new treatment
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

<div class="form-group">
        <h5> Treatment :</h5>
        <?php
            $readonlyTreat = '';
            $disabledTreat = '';
            $onload = '';
            if($load_form_data == true)
            {
                $readonlyTreat= 'readonly';
                $disabledTreat = 'disabled';
                
            }
            echo form_hidden('loaded_data', isset($load_form_data) ? $load_form_data : false);
            
            $durationOptions = array(""=>"please select duration","Days"=>"Days","Weeks"=>"Weeks","Months"=>"Months","One time"=>"One Time");
            $timesOptions = array(""=>"please select","Day"=>"Day","Week"=>"Week","Month"=>"Month","One time"=>"One Time");
            
            echo form_label('select already created treatment : ','treatment');
            echo form_dropdown('treatment',$dropdown_treatments, set_value('treatment',isset($treatment_selected) ? $treatment_selected : ''),$disabledTreat.' id ="treatment" onChange="get_treatment_details()" ');
            echo "<br/>";
            echo "<br/>";
            echo form_dropdown('ingredient',$dropdown_defined_treatments, set_value('ingredient',isset($treatment_details[0]['id']) ? $treatment_details[0]['id']: '') , $disabledTreat.' id ="ingredient" onChange="get_ingredient()"');
            ?>
            <div class="sickness_description" id="description"></div>
            <?php
            //treatments_for_sicknesses.id, treatments.id ,dosage, count_each, each_period, for_period, for_count, treatments_details.note
            //echo form_input('treatment_name', set_value('treatment_name',isset($treatment_details[0]['treatment_name']) ? $treatment_details[0]['treatment_name'] : ''),'id=treatment_name');
            echo "<br/>";
            echo form_label('dosage taken : ','dosage'); 
            echo form_input('dosage', set_value('dosage',isset($treatment_details[0]['dosage']) ? $treatment_details[0]['dosage'] : ''),'id=dosage '.$readonlyTreat);
            echo "<br/>";
            echo form_label('Taken for : ','taken_for');
            echo form_input('times', set_value('times',isset($treatment_details[0]['for_count']) ? $treatment_details[0]['for_count'] : ''),'id=times '.$readonlyTreat);
            echo form_dropdown('taken_for',$durationOptions, set_value('taken_for',isset($treatment_details[0]['for_period']) ? $treatment_details[0]['for_period'] : ''),'id=taken_for '.$disabledTreat);
            echo "<br/>";
            echo form_label('count : ','treatment_count');
            echo form_input('treatment_count', set_value('treatment_count',isset($treatment_details[0]['count_each']) ? $treatment_details[0]['count_each'] : ''),'id=treatment_count '.$readonlyTreat);
            echo form_label('times each : ','each_period');
            echo form_dropdown('each_period',$timesOptions, set_value('each_period',isset($treatment_details[0]['each_period']) ? $treatment_details[0]['each_period'] : ''),'id=each_period '.$disabledTreat);
            echo "<br/>";
            echo form_label('Notes : ','treatment_notes');
            echo form_input('treatment_notes', set_value('treatment_notes',isset($treatment_details[0]['note']) ? $treatment_details[0]['note'] : ''),'id=treatment_notes size = 80 maxlength = 1024 '.$readonlyTreat);
            
        ?>
    </div>
