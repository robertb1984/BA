
<?php

    //$entrie =array('text', 'test_value','Please enter text');
    $group = '';
    $attributesGroup = array(
        'class' => 'h5'
    );
    $readonly = '';
    $disabled = '';
    if($load_form_data== true)
    {
        $readonly= 'readonly';
        $disabled = 'disabled';
    }
   // print_r($entries);
    // echo "<br/>";
     //echo "<br/>";
    
     
    foreach ($entries as $entrie)
    {
        if ($entrie['blockname'] != $group)
        {
            $group = $entrie['blockname'];
            echo form_label($group." : ",'',$attributesGroup );
            echo "<br/>";
        }
        switch ($entrie['type'])
        {
            case 'text':
                echo form_label($entrie['description'] , $entrie['name'] );
                echo form_input($entrie['name'] , set_value($entrie['name'],isset($entrie['value']) ? $entrie['value'] : ''),$readonly);
                echo "<br/>";
                break;
            case 'drop':
                echo form_dropdown($entrie['name'],$dropdowns[$entrie['name']], set_value($entrie['name'],isset($entrie['value']) ? $entrie['value'] : ''),$disabled);
                echo "<br/>";
                break;
        }
    }
?>