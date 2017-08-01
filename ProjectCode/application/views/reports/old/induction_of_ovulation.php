    <div class="form-group">
     <h5>Investigation </h5>
     <?php
        $readonly = '';
        $disabled = '';
        if($load_form_data== true)
        {
            $readonly= 'readonly';
            $disabled = 'disabled';
        }
        $discharge = array(""=>"please select","yes" =>"Yes", "no"=>"No");
        $qualityOfDischarge = array(""=>"please select","no discharge" =>"no discharge", "clear"=>"clear", "semisanguineous"=>"semisanguineous","sanguineous"=>"sanguineous", "pus"=>"pus" ); 
        $vaginalFolds = array(""=>"please select","-" =>"-", "+"=>"+", "++"=>"++","+++"=>"+++" );
        $WBC = array(""=>"please select","none" =>"none", "single"=>"single", "many"=>"many");
        echo "<br/>";
        echo form_label('Discharge : ','discharge'); 
        echo form_dropdown('discharge',$discharge , set_value('discharge',isset($data['discharge']) ? $data['discharge'] : ''),$disabled);
        echo "<br/>";
        echo form_label('Quality of discharge : ','quality_discharge'); 
        echo form_dropdown('quality_discharge',$qualityOfDischarge , set_value('quality_discharge',isset($data['quality_discharge']) ? $data['quality_discharge'] : ''),$disabled);
        echo "<br/>";
        echo form_label('Vaginal folds : ','vaginal_folds'); 
        echo form_dropdown('vaginal_folds',$vaginalFolds , set_value('vaginal_folds',isset($data['vaginal_folds']) ? $data['vaginal_folds'] : ''),$disabled);
        echo "<br/>";
       
    ?>
    </div>
    <div class="form-group">
        <h5>Vaginal smear : </h5>
        <?php
            echo form_label('basal cells(%) : ','basal_cells'); 
            echo form_input('basal_cells', set_value('basal_cells',isset($day0[0]['basal_cells']) ? $day0[0]['basal_cells'] : ''),$readonly);
            echo "<br/>";
            echo form_label('parabasal cells(%) : ','parabasal_cells'); 
            echo form_input('parabasal_cells', set_value('parabasal_cells',isset($day0[0]['parabasal_cells']) ? $day0[0]['parabasal_cells'] : ''),$readonly);
            echo "<br/>";
            echo form_label('intermediate cells(%) : ','intermediate_cells'); 
            echo form_input('intermediate_cells', set_value('intermediate_cells',isset($day0[0]['intermediate_cells']) ? $day0[0]['intermediate_cells'] : ''),$readonly);
            echo "<br/>";
            echo form_label('superficial cells(%) : ','superficial_cells'); 
            echo form_input('superficial_cells', set_value('superficial_cells',isset($day0[0]['superficial_cells']) ? $day0[0]['superficial_cells'] : ''),$readonly);
            echo "<br/>";
            echo form_label('potatoe chips(%) : ','potatoe_chips'); 
            echo form_input('potatoe_chips', set_value('potatoe_chips',isset($day0[0]['potatoe_chips']) ? $day0[0]['potatoe_chips'] : ''),$readonly);
            echo "<br/>";
            echo form_label('WBC : ','WBC'); 
            echo form_dropdown('WBC',$WBC , set_value('WBC',isset($data['WBC']) ? $data['WBC'] : ''),$disabled);
        ?>
  <div class="form-group">
        <h5>Blood test results : </h5>
        <?php
                echo form_label('Oestradiol (nmol/L) : ','oestradiol'); 
                echo form_input('oestradiol', set_value('oestradiol',isset($day0[0]['oestradiol']) ? $day0[0]['oestradiol'] : ''),$readonly);
                echo "<br/>";
                echo form_label('Progesterone (nmol/L) : ','progesterone'); 
                echo form_input('progesterone', set_value('progesterone',isset($day0[0]['progesterone']) ? $day0[0]['progesterone'] : ''),$readonly);
                echo "<br/>";
                echo form_label('LH(nmol/L): ','LH'); 
                echo form_input('LH', set_value('LH',isset($day0[0]['LH']) ? $day0[0]['LH'] : ''),$readonly);
        ?>
  </div>
        