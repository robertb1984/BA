<div class="form-group">

        <?php
            $readonly = '';
            $disabled = '';
            $timeValues = array(
                '0'=>'select interval',
                '1'=>'days',
                '2'=>'months',
                '3'=>'years'
            );
            if($load_form_data== true)
            {
                $readonly= 'readonly';
                $disabled = 'disabled';
            }
            $genderOptions = array('0' =>"Male", '1'=>"Female");
            echo form_label('Name of the Animal : ','name');
            echo form_input('name', set_value('name',isset($data['name']) ? $data['name'] : ''), $readonly);
            echo "<br/>";
            echo form_label('Gender : ','gender'); 
            echo form_dropdown('gender',$genderOptions , set_value('gender',isset($data['isFemale']) ? $data['isFemale'] : ''),$disabled); 
            echo "<br/>";
            echo form_label('Age(estimated,optional) : ','age');
            echo form_input('age', set_value('age',isset($data['age']) ? $data['age'] : ''), $readonly);
            echo form_dropdown('time_interval',$timeValues , set_value('time_interval',isset($data['time_interval']) ? $data['time_interval'] : ''),$disabled);
            echo "<br/>";
            echo form_label('weight (optional) in kg : ','weight'); 
            echo form_input('weight', set_value('weight',isset($data['weight']) ? $data['weight'] : ''), $readonly);
            echo "<br/>";
            echo form_label('Race  (optional): ','race'); 
            echo form_input('race', set_value('race',isset($data['race']) ? $data['race'] : ''), $readonly);
            echo "<br/>";
        ?>

    