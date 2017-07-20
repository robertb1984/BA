
<div class="form-group">
     <h5> Right ovary:</h5>
    <?php
        $readonly = '';
        $disabled = '';
        if($load_form_data== true)
        {
            $readonly= 'readonly';
            $disabled = 'disabled';
        }
        echo form_label('length(cran-caud) : ','Right_ovary_length'); 
        echo form_input('Right_ovary_length', set_value('Right_ovary_length',isset($day0[0]['Right_ovary_length']) ? $day0[0]['Right_ovary_length'] : ''),$readonly);
        
        echo form_label('width ( right-left) : ','Right_ovary_width'); 
        echo form_input('Right_ovary_width', set_value('Right_ovary_width',isset($day0[0]['Right_ovary_width']) ? $day0[0]['Right_ovary_width'] : ''),$readonly);
        
        echo form_label('Height(mm) : ','Right_ovary_height'); 
        echo form_input('Right_ovary_height', set_value('Right_ovary_height',isset($day0[0]['Right_ovary_height']) ? $day0[0]['Right_ovary_height'] : ''),$readonly);
        echo "<br/>";
        echo form_label('Cystic Structures  : ','Right_cystic_structures_count'); 
        echo form_input('Right_cystic_structures_count', set_value('Right_cystic_structures_count',isset($day0[0]['Right_cystic_structures_count']) ? $day0[0]['Right_cystic_structures_count'] : ''),$readonly);
        echo "<br/>";
        
        echo form_label('Notes :','Right_notes');
        echo form_input('Right_notes', set_value('Right_notes',isset($day0[0]['Right_notes']) ? $day0[0]['Right_notes'] : ''),'id=Right_notes size = 80 maxlength = 512 '.$readonly);
    ?>
</div>
<div class="form-group">
     <h5> Left ovary:</h5>
        <?php
            
            echo form_label('length(cran-caud) : ','Left_ovary_length');
            echo form_input('Left_ovary_length', set_value('Left_ovary_length',isset($day0[0]['Left_ovary_length']) ? $day0[0]['Left_ovary_length'] : ''),$readonly);
        
            echo form_label('width ( right-left) : ','Left_ovary_width'); 
            echo form_input('Left_ovary_width', set_value('Left_ovary_width',isset($day0[0]['Left_ovary_width']) ? $day0[0]['Left_ovary_width'] : ''),$readonly);
        
            echo form_label('Height(mm) : ','Left_ovary_height'); 
            echo form_input('Left_ovary_height', set_value('Left_ovary_height',isset($day0[0]['Left_ovary_height']) ? $day0[0]['Left_ovary_height'] : ''),$readonly);
            echo "<br/>";
            echo form_label('Cystic Structures : ','Left_cystic_structures_count'); 
            echo form_input('Left_cystic_structures_count', set_value('Left_cystic_structures_count',isset($day0[0]['Left_cystic_structures_count']) ? $day0[0]['Left_cystic_structures_count'] : ''),$readonly);
            echo "<br/>";
            echo form_label('Notes :','Left_notes');
            echo form_input('Left_notes', set_value('Left_notes',isset($day0[0]['Left_notes']) ? $day0[0]['Left_notes'] : ''),'id=Left_notes size = 80 maxlength = 512 '.$readonly);

        ?>
</div>