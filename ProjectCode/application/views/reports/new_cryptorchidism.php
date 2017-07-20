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
        })
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
    })
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

<?php echo form_open('Reports/create_cryptorchidism');?>
<?php echo validation_errors();?>  
<div class="form-group">
        <?php echo form_label('Name of the Animal : ','name'); ?>
        <?php echo form_input('name', set_value('name')); ?>
    </div>
    <div class="form-group">
        <?php 
        //$genderOptions = array(""=>"Please choose gender ","female"=> "Female", "male" =>"Male");
        $genderOptions = array("male" =>"Male");
        $locationOptions = array(""=>"Please choose location","scrotal"=> "scrotal", "inguinal" =>"inguinal","abdominal"=>"abdominal","ectopic"=>"ectopic");
        
        $durationOptions = array(""=>"please select duration","Days"=>"Days","Weeks"=>"Weeks","Months"=>"Months","One time"=>"One Time");
        $timesOptions = array(""=>"please select","Day"=>"Day","Week"=>"Week","Month"=>"Month","One time"=>"One Time");
        
        echo form_label('Gender : ','gender'); 
        echo form_dropdown('gender',$genderOptions , set_value('gender')); 
        echo "<br/>";
        echo "<br/>";
        ?>
    </div>
    <div class="form-group">
        <h5> Left testicle :</h5>
        <?php
            
            echo form_label('Left testicle location : ','left_testicle_location');
            echo form_dropdown('left_testicle_location',$locationOptions , set_value('left_testicle_location'));

            echo form_label('Size (Ultrasound diameter) : ','left_size_diameter'); 
            echo form_input('left_size_diameter', set_value('left_size_diameter'));
            echo "<br/>";
            echo form_label('Notes :','left_testicle_notes');
            echo form_input('left_testicle_notes', set_value('left_testicle_notes'),'id=left_testicle_notes size = 80 maxlength = 1024'); 
            echo "<br/>";
        ?>
    </div>
    <div class="form-group">
        <h5> Right testicle :</h5>
        <?php
            
            echo form_label('Right testicle location : ','right_testicle_location');
            echo form_dropdown('right_testicle_location',$locationOptions , set_value('right_testicle_location'));

            echo form_label('Size (Ultrasound diameter) : ','right_size_diameter'); 
            echo form_input('right_size_diameter', set_value('right_size_diameter'));
            echo "<br/>";
            echo form_label('Notes :','right_testicle_notes');
            echo form_input('right_testicle_notes', set_value('right_testicle_notes'),'id=right_testicle_notes size = 80 maxlength = 1024');
            echo "<br/>";
        ?>
    </div>
    <div class="form-group">
        <h5> Treatment :</h5>
        <?php
            echo form_label('select already created treatment : ','treatment');
            echo form_dropdown('treatment',$dropdown_treatments, set_value('treatment') , 'id ="treatment" onChange="get_treatment_details()"');
            echo "<br/>";
            echo "<br/>";
            echo form_dropdown('ingredient',$dropdown_defined_treatments, set_value('ingredient') , 'id ="ingredient" onChange="get_ingredient()"');
            ?>
            <div class="sickness_description" id="description"></div>
            <?php
            echo form_input('treatment_name', set_value('treatment_name'),'id=treatment_name');
            echo "<br/>";
            echo form_label('dosage taken : ','dosage'); 
            echo form_input('dosage', set_value('dosage'),'id=dosage');
            echo "<br/>";
            echo form_label('Taken for : ','taken_for');
            echo form_input('times', set_value('times'),'id=times');
            echo form_dropdown('taken_for',$durationOptions, set_value('taken_for'),'id=taken_for');
            echo "<br/>";
            echo form_label('count : ','treatment_count');
            echo form_input('treatment_count', set_value('treatment_count'),'id=treatment_count');
            echo form_label('times each : ','each_period');
            echo form_dropdown('each_period',$timesOptions, set_value('each_period'),'id=each_period');
            echo "<br/>";
            echo form_label('Notes : ','treatment_notes');
            echo form_input('treatment_notes', set_value('treatment_notes'),'id=treatment_notes size = 80 maxlength = 1024');
            
        ?>
    </div>
<div>
    <?php
    echo form_hidden('sicknessID',$sicknessID);
    echo form_hidden('animal',$animal);
    echo form_submit('submit','create Report'); 
    ?>
</div>