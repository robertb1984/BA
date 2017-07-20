    <div class="form-group">
        <?php echo form_label('Name of the Animal','name'); ?>
        <?php echo form_input('name', set_value('name')); ?>
    </div>
    <div class="form-group">
        <?php $genderOptions = array(""=>"Please choose gender","female"=> "Female", "male" =>"Male"); ?>
        
        <?php echo form_label('Gender','gender'); ?>
        <?php echo form_dropdown('gender',$genderOptions , set_value('gender')); ?>
    </div>