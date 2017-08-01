
    <h4><?php echo 'Closing comment' ?> </h4>
    <?php
    $readonly = '';
    $disabled = '';
    if($load_form_data== true)
    {
        $readonly= 'readonly';
        $disabled = 'disabled';
    }
    $rating = array(
                '0'=>'not sure',
                '1'=>'would rate it a success',
                '2'=>'seems it did not work'
            );
    if(isset($new))
    {
        echo form_open('Reports/save_closing_comment');
    }
    echo form_hidden('report_id', $report_id);
    echo form_label('write closing comment :');
    echo form_input('closing_comment', set_value('closing_comment',isset($entrie['closing_comment']) ? $entrie['closing_comment'] : ''),$readonly);
    echo "<br/>";
    echo "<br/>";
    echo form_label('If you can, rate if it was a success :');
    echo form_dropdown('rating',$rating, set_value('success_rating',isset($entrie['success_rating']) ? $entrie['success_rating'] : ''),$disabled);
    echo "<br/>";
    echo "<br/>";
    if(isset($new))
    {
        echo form_submit('submit','close');
    }
    echo "<br/>";
    echo "-----------------------------------------------------------------";