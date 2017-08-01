<?php

    echo form_open('Reports/save_changes_to_case');
    echo form_hidden('report_id', $reportID);
    echo form_hidden('sickness', $loaded_report_entries['sickness_id']);
    echo validation_errors();
?> 


