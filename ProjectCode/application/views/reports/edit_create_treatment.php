<?php
    echo validation_errors(' <p class ="error">');
    echo form_open('Reports/save_treatment');
    foreach ($entries as $entry) {
   
        if($lock_name)
        {
            ?>
            <h4><?php echo $entry['name']; ?> </h4>
            <?php
            echo form_hidden('id', $entry['id']);
        }
     else      
        {
            echo form_label('Name: ');
            echo form_input('name','');
        }
        echo "<br/>";
        echo "<br/>";
        echo form_label( 'description:' );
        $data = array(
                'name'        => 'note',
                'id'          => 'note',
                'value'       =>  set_value($entry['note'],isset($entry['note']) ? $entry['note'] : ''),
                'rows'        => '10',
                'cols'        => '100',
                'style'       => 'width:80%',
                'class'       => 'form-control'
            );
                    //echo form_input($entrie['name'], set_value($entrie['name']));
        echo form_textarea($data);
        
        echo form_submit('submit','save','class="btn btn-danger"');
        
    }
    ?>
    <a class="btn btn-default" href = <?php echo base_url();?>treatments>cancel </a>

