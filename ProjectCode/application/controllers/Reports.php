<?php
    class Reports extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            $this->is_authenticated();
            $this->load->model('Report_model');
           
        }
        function prepare_dropdown_treatments($query_result,$selectColumn,$selectColumn2,$columnDescription)
        {
            $options = array();
            $options[0] = "new ".$columnDescription;
            foreach ($query_result as $key => $value)
            {
                $options[$value['id']] = $value[$selectColumn].' '.$value[$selectColumn2];
            }
            return $options;
        }
        //placeholder just shows all users
        public function overview()
        {
            
            $data['title']= 'My just created Reports';
            $data['status'] = 1;
            $data['myreports']= $this->Report_model->get_myreports($data['status']);
            
            $running['title']= 'My not closed Reports';
            $running['status'] = 2;
            $running['myreports']= $this->Report_model->get_myreports($running['status']);
            
            $closed['title']= 'My closed Reports';
            $closed['status'] = 3;
            $closed['myreports']= $this->Report_model->get_myreports($closed['status']);
            //print_r($data['users']);
            //$this->load->helper('url'); 
            $this->load->view('templates/header');
            //php block
            //just created reports
            $this->load->view('reports/myreports',$data);
            //not closed still running rports
            $this->load->view('reports/myreports',$running);
            //My closed Reports
            $this->load->view('reports/myreports',$closed);
            
            $this->load->view('templates/footer');

        }
        //reworked FORM
        
        //end reworkedFORM
        public function report_search()
        {
            $data['title']= 'Search for Case';
            $data['sicknesses']= $this->Report_model->get_sicknesses();
            $data['dropdownSick'] = $this->dropdownData($data['sicknesses'], 'name', 'Sickness');
            
            $this->load->view('templates/header');
            $this->load->view('reports/report_search',$data);
            $this->load->view('templates/footer');
        }
        function search_for_report()
        {
            $data['title']= 'Results for Case';
            $sicknessID = $this->input->post('sickness');
            $data['reports']= $this->Report_model->get_reports($sicknessID);
            
            $this->load->view('templates/header');
            $this->load->view('reports/search_reports_results',$data);
            $this->load->view('templates/footer');
        }
        public function new_report()
        {
            //$this->load->model('Report_model');
            $data['title']= 'New Report';
            $data['sicknesses']= $this->Report_model->get_sicknesses();
            $data['species']= $this->Report_model->get_species();
            //$data['treatments']= $this->Report_model->get_treatments();
            $data['dropdownSick'] = $this->dropdownData($data['sicknesses'], 'name', 'Sickness');
            $data['dropdownSpecies'] = $this->dropdownData($data['species'], 'name', 'Species');
            //$data['treatments']= $this->Report_model->get_treatments();
            
            $this->load->view('templates/header');
            $this->load->view('reports/newreport',$data);
            $this->load->view('templates/footer');
        }
        function new_generate_form()
        {
            
            $load_document = false;
            $animal = $this->input->post('species');
            $sicknessID = $this->input->post('sickness');
            $submit['sicknessID'] = $sicknessID;
            $submit['animal'] = $animal;
            $animal_init['animal'] = $animal;
            $animal_init['load_form_data'] = $load_document;
            //$init['load_form_data'] = $load_document;
            $data['animal'] = $animal;
            $data['load_form_data'] = $load_document;
            $data['sicknessID']= $sicknessID;
            $data['treatments']= $this->Report_model->get_treatments_for_sickness($sicknessID);
            $data['ingredients'] =  $this->Report_model->get_ingredients();
            $data['dropdown_defined_treatments'] = $this->dropdownData($data['ingredients'], 'name', 'Ingredient/Treatment');
            $data['dropdown_treatments'] = $this->prepare_dropdown_treatments($data['treatments'],'name','dosage' , ' treatment');
            //$site = $this->Report_model->get_sickness_name($sicknessID);
            //$site = str_replace(' ', '_', $site);
            //$form_function['form_function'] = 'create_'.$site;
            $form_function['form_function'] = 'create_report';
            
            $form_data['load_form_data'] = $load_document;
            $form_data['entries'] = $this->Report_model->load_input_fields($sicknessID);
            foreach ($form_data['entries'] as $value) {
                if($value['type'] == "drop")
                {
                    $form_data[$value['name']]= $this->Report_model->get_dropdown_data($value['id']);
                    $form_data['dropdowns'][$value['name']]= $this->dropdownData($form_data[$value['name']], 'text', $value['description']); 
                }
            }
            //print_r( $form_data);
            //direct to form
            $this->load->view('templates/header');
            $this->load->view('reports/form_open',$form_function);
            $this->load->view('reports/animal',$animal_init);
            //
            $this->load->view('reports/sickness',$form_data);
            //
            //$this->load->view('reports/'.$site,$init);
            $this->load->view('reports/treatment',$data);
            $this->load->view('reports/form_submit',$submit);
            $this->load->view('templates/footer');
        }
        //redirect to site with name of Sickness (has to exists in view/reports folder) 
       /* function generate_form()
        {
            $animal = $this->input->post('species');
            $sicknessID = $this->input->post('sickness');
            //print_r($animal);
            //print_r($sickness);
            //$this->load->model('Report_model');
            //get name and redirect to it
            
            $data['animal'] = $animal;
            $data['sicknessID']= $sicknessID;
            $data['treatments']= $this->Report_model->get_treatments_for_sickness($sicknessID);
            $data['ingredients'] =  $this->Report_model->get_ingredients();
            $data['dropdown_defined_treatments'] = $this->dropdownData($data['ingredients'], 'name', 'Ingredient/Treatment');
            $data['dropdown_treatments'] = $this->prepare_dropdown_treatments($data['treatments'],'name','dosage' , ' treatment');
            $site = "new_";
            $site .= $this->Report_model->get_sickness_name($sicknessID);
            
            //direct to form
            $this->load->view('templates/header');
            $this->load->view('reports/'.$site,$data);
            
            $this->load->view('templates/footer');
        }
        * 
        */
        function create_report()
        {
            
            $this->load->library('form_validation');
            //animal
            $this->form_validation->set_rules("name","name","trim|required");
            $this->form_validation->set_rules("gender","gender","trim|required");
            //sickness
            $sicknessID = $this->input->post('sickness');
            $entries = $this->Report_model->load_input_fields($sicknessID);
            foreach ($entries as $entrie)
            {
                $this->form_validation->set_rules($entrie['name'],$entrie['name'],$entrie['validation']);
            }
            //check if a old treatment was used
            $new_treatment = $this->input->post('treatment');
            //treatment
            if($new_treatment == 0)
            {
                $this->form_validation->set_rules("ingredient","ingredient","trim|required");
                $this->form_validation->set_rules("dosage","dosage","trim|required");
                $this->form_validation->set_rules("taken_for","taken_for","trim");
                $this->form_validation->set_rules("times","times","trim|required|numeric");
                $this->form_validation->set_rules("treatment_count","treatment_count","trim|required|numeric");
                $this->form_validation->set_rules("each_period","each_period","trim");
            }
            
            $this->form_validation->set_rules("treatment_notes","treatment_notes","trim");
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if($this->form_validation->run() === FALSE)
            {
                $this->new_generate_form();
                 
            }
            else
            {
                //save new treatment
                if($new_treatment == 0)
                {        
                    $new_treatment = $this->Report_model->save_treatment();   
                }
                //save the rest of the report
                
                $report_id = $this->Report_model->save_report($new_treatment);
                $this->Report_model->save_report_values($report_id, $entries);
  
                redirect('/reports');
            }
        }
        
        function create_cystic_ovarian_disease()
        {
            $this->load->library('form_validation');
            //animal
            $this->form_validation->set_rules("name","name","trim|required");
            $this->form_validation->set_rules("gender","gender","trim|required");
            //sickness
            $this->form_validation->set_rules("Right_ovary_length","Right_ovary_length","trim|required|numeric");
            $this->form_validation->set_rules("Right_ovary_width","Right_ovary_width","trim|required|numeric");
            $this->form_validation->set_rules("Right_ovary_height","Right_ovary_height","trim|required|numeric");
            $this->form_validation->set_rules("Right_cystic_structures_count","Right_cystic_structures_count","trim|required|numeric");
            $this->form_validation->set_rules("Right_notes","Right_notes","trim");
            
            $this->form_validation->set_rules("Left_ovary_length","Left_ovary_length","trim|required|numeric");
            $this->form_validation->set_rules("Left_ovary_width","Left_ovary_width","trim|required|numeric");
            $this->form_validation->set_rules("Left_ovary_height","Left_ovary_height","trim|required|numeric");
            $this->form_validation->set_rules("Left_cystic_structures_count","Left_cystic_structures_count","trim|required|numeric");
            $this->form_validation->set_rules("Left_notes","Left_notes","trim");
            
                        //check if a old treatment was used
            $new_treatment = $this->input->post('treatment');
            //treatment
            if($new_treatment == 0)
            {
                $this->form_validation->set_rules("ingredient","ingredient","trim|required");
                $this->form_validation->set_rules("dosage","dosage","trim|required");
                $this->form_validation->set_rules("taken_for","taken_for","trim");
                $this->form_validation->set_rules("times","times","trim|required|numeric");
                $this->form_validation->set_rules("treatment_count","treatment_count","trim|required|numeric");
                $this->form_validation->set_rules("each_period","each_period","trim");
            }
            
            $this->form_validation->set_rules("treatment_notes","treatment_notes","trim");
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if($this->form_validation->run() === FALSE)
            {
                $this->new_generate_form();
            }
            else
            {
                //save new treatment
                if($new_treatment == 0)
                {        
                    $new_treatment = $this->Report_model->save_treatment();   
                }
                //save the rest of the report
                $this->Report_model->save_cystic_ovarian_disease($new_treatment);
                redirect('/reports');
            }
        }
        function create_induction_of_ovulation()
        {
            $this->load->library('form_validation');
            //animal
            $this->form_validation->set_rules("name","name","trim|required");
            $this->form_validation->set_rules("gender","gender","trim|required");
            
            //sickness
            $this->form_validation->set_rules("discharge","discharge","trim|required");
            $this->form_validation->set_rules("quality_discharge","quality_discharge","trim|required");
            $this->form_validation->set_rules("vaginal_folds","vaginal_folds","trim|required");
            
            $this->form_validation->set_rules("basal_cells","basal_cells","trim|required|numeric");
            $this->form_validation->set_rules("parabasal_cells","parabasal_cells","trim|required|numeric");
            $this->form_validation->set_rules("intermediate_cells","intermediate_cells","trim|required|numeric");
            $this->form_validation->set_rules("superficial_cells","superficial_cells","trim|required|numeric");
            $this->form_validation->set_rules("potatoe_chips","potatoe_chips","trim|required|numeric");
            
            $this->form_validation->set_rules("WBC","WBC","trim|required");
            $this->form_validation->set_rules("oestradiol","oestradiol","trim|required|numeric");
            $this->form_validation->set_rules("progesterone","progesterone","trim|required|numeric");
            $this->form_validation->set_rules("LH","LH","trim|required|numeric");
            
            //check if a old treatment was used
            $new_treatment = $this->input->post('treatment');
            //treatment
            if($new_treatment == 0)
            {
                $this->form_validation->set_rules("ingredient","ingredient","trim|required");
                $this->form_validation->set_rules("dosage","dosage","trim|required");
                $this->form_validation->set_rules("taken_for","taken_for","trim");
                $this->form_validation->set_rules("times","times","trim|required|numeric");
                $this->form_validation->set_rules("treatment_count","treatment_count","trim|required|numeric");
                $this->form_validation->set_rules("each_period","each_period","trim");
            }
            
            $this->form_validation->set_rules("treatment_notes","treatment_notes","trim");
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if($this->form_validation->run() === FALSE)
            {
                $this->new_generate_form();
            }
            else
            {
                //save new treatment
                if($new_treatment == 0)
                {        
                    $new_treatment = $this->Report_model->save_treatment();   
                }
                //save the rest of the report
                $this->Report_model->save_induction_of_ovulation($new_treatment);
                redirect('/reports');       
            }
        }
        //form validation and saving for a new cryptorchidism report
        function create_cryptorchidism()
        {
           // $this->load->model('Report_model');
            
            $this->load->library('form_validation');
            //animal
            $this->form_validation->set_rules("name","name","trim|required");
            $this->form_validation->set_rules("gender","gender","trim|required");
            //Sickness
            $this->form_validation->set_rules("left_testicle_location","left_testicle_location","trim|required");
            $this->form_validation->set_rules("left_size_diameter","left_size_diameter","trim|required|numeric");
            $this->form_validation->set_rules("left_testicle_notes","left_testicle_notes","trim");
            $this->form_validation->set_rules("right_testicle_location","right_testicle_location","trim|required");
            $this->form_validation->set_rules("right_size_diameter","right_size_diameter","trim|required|numeric");
            $this->form_validation->set_rules("right_testicle_notes","right_testicle_notes","trim");
            
            //check if a old treatment was used
            $new_treatment = $this->input->post('treatment');
            //treatment
            if($new_treatment == 0)
            {
                $this->form_validation->set_rules("ingredient","ingredient","trim|required");
                $this->form_validation->set_rules("dosage","dosage","trim|required");
                $this->form_validation->set_rules("taken_for","taken_for","trim");
                $this->form_validation->set_rules("times","times","trim|required|numeric");
                $this->form_validation->set_rules("treatment_count","treatment_count","trim|required|numeric");
                $this->form_validation->set_rules("each_period","each_period","trim");
            }
            
            $this->form_validation->set_rules("treatment_notes","treatment_notes","trim");
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if($this->form_validation->run() === FALSE)
            {
                $this->new_generate_form();
    
            }
            else
            {
                //save new treatment
                if($new_treatment == 0)
                {        
                    $new_treatment = $this->Report_model->save_treatment();   
                }
                //save the rest of the report
                $this->Report_model->save_Cryptorchidism($new_treatment);
                redirect('/reports');       
            }
            
        }
        
        function load_report($id)
        {
            $sickness_id = $this->Report_model->get_sickness_id($id);
            if (($sickness_id >= 3)&&($sickness_id <= 5))
            {
                $this->load_report_old($id);
            }
            else
            {
                $this->load_report_new($id);
            }
        }
        
        function load_report_old($id)
        {
            $load_document = true;
            $init['load_form_data'] = $load_document;
            $init['reportID']= $id;
            $init['loaded_report_entries'] = $this->Report_model->load_report_entries($id);
            
            $animal['id'] =  $init['loaded_report_entries']['animal_id'];
            $animal['load_form_data'] = $load_document;
            $animal['data'] = $this->Report_model->load_animal($animal['id']);
            //todo get sickness
            //print_r($animal['data']);
            $sickness = $this->Report_model->get_sickness_name($init['loaded_report_entries']['sickness_id']);
            $sickness = str_replace(' ', '_', $sickness);
            //TODO get count of visits and load them dynamically
            $visit = 0;
            $init['day0'] = $this->Report_model->load_report_visit($id, $sickness, $visit);
            //print_r($init['day0']);
            $data['load_form_data'] = $load_document;
            $data['treatment_selected']= $init['loaded_report_entries']['treatment_for_sickness_id'];
            $data['ingredients'] =  $this->Report_model->get_ingredients();
            $data['treatment_details'] = $this->Report_model->get_details_for_treatment($data['treatment_selected']);
            $data['dropdown_defined_treatments'] = $this->dropdownData($data['ingredients'], 'name', 'Ingredient/Treatment');
            $data['treatments']= $this->Report_model->get_treatments_for_sickness($init['loaded_report_entries']['sickness_id']);
            $data['dropdown_treatments'] = $this->prepare_dropdown_treatments($data['treatments'],'name','dosage' , ' treatment');
            $this->load->view('templates/header');
            $this->load->view('reports/animal',$animal);
            $this->load->view('reports/'.$sickness,$init);
            $this->load->view('reports/treatment',$data);
            $this->load->view('templates/footer');
        }
        //new load function
        function load_report_new($id)
        {
            $load_document = true;
            $init['load_form_data'] = $load_document;
            $init['reportID']= $id;
            $init['loaded_report_entries'] = $this->Report_model->load_report_entries($id);
            
            $sicknessID = $init['loaded_report_entries']['sickness_id'];
            
            $animal['id'] =  $init['loaded_report_entries']['animal_id'];
            $animal['load_form_data'] = $load_document;
            $animal['data'] = $this->Report_model->load_animal($animal['id']);
            
            $data['load_form_data'] = $load_document;
            $data['treatment_selected']= $init['loaded_report_entries']['treatment_for_sickness_id'];
            $data['ingredients'] =  $this->Report_model->get_ingredients();
            $data['treatment_details'] = $this->Report_model->get_details_for_treatment($data['treatment_selected']);
            $data['dropdown_defined_treatments'] = $this->dropdownData($data['ingredients'], 'name', 'Ingredient/Treatment');
            $data['treatments']= $this->Report_model->get_treatments_for_sickness($init['loaded_report_entries']['sickness_id']);
            $data['dropdown_treatments'] = $this->prepare_dropdown_treatments($data['treatments'],'name','dosage' , ' treatment');
            
            $form_data['load_form_data'] = $load_document;
            $form_data['entries'] = $this->Report_model->load_input_fields_results($id);
            foreach ($form_data['entries'] as $value)
            {
                if($value['type'] == "drop")
                {
                    $form_data[$value['name']]= $this->Report_model->get_dropdown_data($value['id']);
                    $form_data['dropdowns'][$value['name']]= $this->dropdownData($form_data[$value['name']], 'text', $value['description']); 
                }
            }
            $this->load->view('templates/header');
            $this->load->view('reports/animal',$animal);
            $this->load->view('reports/sickness',$form_data);
            $this->load->view('reports/treatment',$data);
            $visit_count = $this->Report_model->get_visit_count($id);
            
            //print_r($visit_count);
            if($visit_count > 0)
            {
                $this_count =1;
                $visits = $this->Report_model->get_visits($id);
                //print_r($visits);
                foreach($visits as $this_visit)
                {
                    $visit['new_visit'] = false;
                    
                    $visit['this_count'] = $this_count;
                    $visit['entries'] = $this->Report_model->load_visit_fields_results($this_visit['id']);
                    foreach ($visit['entries'] as $value)
                    {
                        
                        if($value['type'] == "drop")
                        {
                            $visit[$value['name']]= $this->Report_model->get_dropdown_data_visits($value['id']);
                            $visit['dropdowns'][$value['name']]= $this->dropdownData($visit[$value['name']], 'text', $value['description']); 
                        }
                    }
                
                    $this->load->view('reports/visit',$visit);
                    $this_count++;
                }
                 
            }
            $this->load->view('templates/footer');
        }
        function load_edit_report($id , $add_visit = null)
        {
            //check for add visit 
            //print_r($add_visit);
            if(null == ($add_visit))
            {
                $add_visit = false;
            }
             
            $lock_document = true;
            $init['load_form_data'] = $lock_document;
            $init['reportID']= $id;
            $init['loaded_report_entries'] = $this->Report_model->load_report_entries($id);
            
            $sicknessID = $init['loaded_report_entries']['sickness_id'];
            
            $animal['id'] =  $init['loaded_report_entries']['animal_id'];
            $animal['load_form_data'] = $lock_document;
            $animal['data'] = $this->Report_model->load_animal($animal['id']);
            
            $data['load_form_data'] = $lock_document;
            $data['treatment_selected']= $init['loaded_report_entries']['treatment_for_sickness_id'];
            $data['ingredients'] =  $this->Report_model->get_ingredients();
            $data['treatment_details'] = $this->Report_model->get_details_for_treatment($data['treatment_selected']);
            $data['dropdown_defined_treatments'] = $this->dropdownData($data['ingredients'], 'name', 'Ingredient/Treatment');
            $data['treatments']= $this->Report_model->get_treatments_for_sickness($init['loaded_report_entries']['sickness_id']);
            $data['dropdown_treatments'] = $this->prepare_dropdown_treatments($data['treatments'],'name','dosage' , ' treatment');
            
            $form_data['load_form_data'] = $lock_document;
            $form_data['entries'] = $this->Report_model->load_input_fields_results($id);
            foreach ($form_data['entries'] as $value)
            {
                if($value['type'] == "drop")
                {
                    $form_data[$value['name']]= $this->Report_model->get_dropdown_data($value['id']);
                    $form_data['dropdowns'][$value['name']]= $this->dropdownData($form_data[$value['name']], 'text', $value['description']); 
                }
            }
            $this->load->view('templates/header');
            $this->load->view('reports/animal',$animal);
            $this->load->view('reports/sickness',$form_data);
            $this->load->view('reports/treatment',$data);
            
            //todo get past visits count
            
            $visit_count = $this->Report_model->get_visit_count($id);
            //$count_existing_visits= $count_existing_visits['visit_count'];
            //print_r($visit_count);
            if($visit_count > 0)
            {
                $this_count =1;
                $visits = $this->Report_model->get_visits($id);
                //print_r($visits);
                $visit['load_form_data'] = $lock_document;
                foreach($visits as $this_visit)
                {
                    $visit['new_visit'] = false;
                    $visit['this_count'] = $this_count;
                    $visit['entries'] = $this->Report_model->load_visit_fields_results($this_visit['id']);
                    foreach ($visit['entries'] as $value)
                    {
                        if($value['type'] == "drop")
                        {
                            $visit[$value['name']]= $this->Report_model->get_dropdown_data_visits($value['id']);
                            $visit['dropdowns'][$value['name']]= $this->dropdownData($visit[$value['name']], 'text', $value['description']); 
                        }
                    }
                
                    $this->load->view('reports/visit',$visit);
                    $this_count++;
                }
                 
            }
            //add Visit
            if($add_visit)
            {
                $visit['report_id'] = $id;
                $visit['new_visit'] = true;
                $visit['this_count'] = $visit_count++;
                $visit['load_form_data'] = false;
                //todo load_visit_fields
                $visit['entries'] = $this->Report_model->load_visit_fields($sicknessID);
                foreach ($visit['entries'] as $value) {
                    if($value['type'] == "drop")
                    {
                        //todo get_dropdown_data_visits
                        $visit[$value['name']]= $this->Report_model->get_dropdown_data_visits($value['id']);
                        $visit['dropdowns'][$value['name']]= $this->dropdownData($visit[$value['name']], 'text', $value['description']); 
                    }
                }
                //load formdata for visit
                $this->load->view('reports/visit',$visit);
            }
            $this->load->view('templates/footer');
        }

        //js script access for treatment block. Gets description of a ingredient (the notes from treatment table)
        function get_ingredient_description()
        {
            $ingredient = $this->input->post('ingredient');
            $data['ingredientID']= $ingredient;
            $data['note']= $note= $this->Report_model->get_ingredient_description($ingredient);
            $result = json_encode($data);
            //print_r($result);
            echo $result;
        }
        //for JS 
        function get_sickness_description()
        {
            
            $sicknessID = $this->input->post('sickness');
            $data['sicknessID']= $sicknessID;
            $data['description']= $description = $this->Report_model->get_sickness_description($sicknessID);
            //$data['text'] = "i have returned";
            //$data= array();
            //$data[]= $description;
            $result = json_encode($data);
            echo $result;
        }
        //for js is called if the user selects a already defined treatment
        function load_treatment()
        {
            $treatmentID =  $this->input->post('treatment');
            $data['treatmentID'] = $treatmentID;
            $data['treatment_details'] = $this->Report_model->get_details_for_treatment($treatmentID);
            $result = json_encode($data);
            echo $result;
        }
        function add_examination()
        {
            $this->load->library('form_validation');
            
            $report_id = $this->input->post('report');
            $examination_count = $this->input->post('count_examination');
            //change status of report
            if($examination_count == 0)
            {
                $this->Report_model->change_status_of_report($report_id);
            }
            $entries = $this->Report_model->load_examination_fields($report_id);
            print_r($entries);
            foreach ($entries as $entrie)
            {
             
                $entrie['name'] = $entrie['name'].$examination_count;
                //print_r($this_name);
                $this->form_validation->set_rules($entrie['name'],$entrie['name'],$entrie['validation']);
            }
            
            if($this->form_validation->run() === FALSE)
            {
                $this->load_edit_report($report_id,true);
                 
            }
            else
            {
                //save the examination
                
                $this->Report_model->save_examination_values($report_id, $entries,$examination_count);
  
                redirect('/reports');
            }
        }

    }
    
    ?>