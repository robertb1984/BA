<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $group = '';
    $attributesGroup = array(
        'class' => 'h5'
    );
    $readonly = '';
    $disabled = '';
    if(($load_form_data == true) && (null===$edit))
    {
        $readonly= 'readonly';
        $disabled = 'disabled';
        //todo echo visitcount
        //echo form_label('NEW VISIT','',$attributesGroup );
        echo form_label('examination '.$this_count,'',$attributesGroup );
    }
    elseif($new_visit)  {
         echo form_label('NEW examination ','',$attributesGroup );
          echo form_open('Reports/add_examination');
       
    }
    else {
        echo form_label('examination '.$this_count,'',$attributesGroup );
       
    }
    echo "<br/>";

    foreach ($entries as $entrie)
    {
        //print_r($entrie);
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
                //echo form_input($entrie['name'], set_value($entrie['name']));
                echo form_input($entrie['name'].$this_count , set_value($entrie['name'].$this_count,isset($entrie['value']) ? $entrie['value'] : ''),$readonly);
                echo "<br/>";
                break;
            case 'drop':
                //echo form_dropdown($entrie['name'],$dropdowns[$entrie['name']],set_value($entrie['name']));
                echo form_dropdown($entrie['name'].$this_count,$dropdowns[$entrie['name']], set_value($entrie['name'].$this_count,isset($entrie['value']) ? $entrie['value'] : ''),$disabled);
                //'form_dropdown('vaginal_folds',$vaginalFolds , set_value('vaginal_folds',isset($data['vaginal_folds']) ? $data['vaginal_folds'] : ''),$disabled);
                echo "<br/>";
                break;
        }
    }
    echo validation_errors(' <p class ="error">');
    echo "<br/>";
     if($new_visit)
        {
            echo form_hidden('count_examination',$this_count);
            echo form_hidden('report',$report_id);
            echo form_submit('submit','add examination');
        }