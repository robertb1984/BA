<div class="form-group">
        <?php
            $readonly = '';
            $disabled = '';
            if($load_form_data== true)
            {
                $readonly= 'readonly';
                $disabled = 'disabled';
            }
            $genderOptions = array("male" =>"Male", "female"=>"Female");
            echo form_label('Name of the Animal : ','name');
            echo form_input('name', set_value('name',isset($data['name']) ? $data['name'] : ''), $readonly);
            echo "<br/>";
            echo form_label('Gender : ','gender'); 
            echo form_dropdown('gender',$genderOptions , set_value('gender',isset($data['isFemale']) ? $data['isFemale'] : ''),$disabled); 
            echo "<br/>";
            echo "<br/>";
        ?>