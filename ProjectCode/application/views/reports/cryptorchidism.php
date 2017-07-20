

<div class="form-group">
        <h5> Left testicle :</h5>
        <?php
            $readonly = '';
            $disabled = '';
            if($load_form_data== true)
            {
                $readonly= 'readonly';
                $disabled = 'disabled';
            }
            
            $locationOptions = array(""=>"Please choose location","scrotal"=> "scrotal", "inguinal" =>"inguinal","abdominal"=>"abdominal","ectopic"=>"ectopic");
        
            echo form_label('Left testicle location : ','left_testicle_location');
            echo form_dropdown('left_testicle_location',$locationOptions , set_value('left_testicle_location',isset($day0[0]['left_testicle_location']) ? $day0[0]['left_testicle_location'] : ''),$disabled);

            echo form_label('Size (Ultrasound diameter) : ','left_size_diameter'); 
            echo form_input('left_size_diameter', set_value('left_size_diameter',isset($day0[0]['left_size_diameter']) ? $day0[0]['left_size_diameter'] : ''),$readonly);
            
            echo "<br/>";
            echo form_label('Notes :','left_testicle_notes');
            echo form_input('left_testicle_notes', set_value('left_testicle_notes',isset($day0[0]['left_notes']) ? $day0[0]['left_notes'] : ''),'id=left_testicle_notes size = 80 maxlength = 1024 '.$readonly); 
            echo "<br/>";
        ?>
    </div>
    <div class="form-group">
        <h5> Right testicle :</h5>
        <?php
            
            echo form_label('Right testicle location : ','right_testicle_location');
            echo form_dropdown('right_testicle_location',$locationOptions , set_value('right_testicle_location',isset($day0[0]['right_testicle_location']) ? $day0[0]['right_testicle_location'] : ''),$disabled);

            echo form_label('Size (Ultrasound diameter) : ','right_size_diameter'); 
            echo form_input('right_size_diameter', set_value('right_size_diameter',isset($day0[0]['right_size_diameter']) ? $day0[0]['right_size_diameter'] : ''),$readonly);
            echo "<br/>";
            echo form_label('Notes :','right_testicle_notes');
            echo form_input('right_testicle_notes', set_value('right_testicle_notes',isset($day0[0]['right_notes']) ? $day0[0]['right_notes'] : ''),'id=left_testicle_notes size = 80 maxlength = 1024 '.$readonly);
            echo "<br/>";
        ?>
    </div>