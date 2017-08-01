<?php
    class Report_model extends CI_Model
    {
        public function __construct() {
            $this->load->database();
        }
        //gets all users
        public function get_myreports($status)
        {
           $user_id =  $this->get_user_id($this->session->email);
           $query= $this->db->query('  
                SELECT reports.id ,sicknesses.name, sickness_id, user_id, reports.created
                FROM reports
                LEFT JOIN sicknesses ON sicknesses.id = sickness_id
                WHERE user_id = '.$user_id.' AND status = '.$status);

            return $query->result_array();
        }
        function get_reports($sicknessID)
        {
            $query= $this->db->query('  
                SELECT reports.id ,sicknesses.name, sickness_id, user_id, reports.created
                FROM reports
                LEFT JOIN sicknesses ON sicknesses.id = sickness_id
                WHERE sickness_id = '.$sicknessID );

            return $query->result_array();
        }

        public function get_sicknesses()
        {
            $query = $this->db->get('sicknesses');
            return $query->result_array();
        }
        public function get_animals()
        {
            $query = $this->db->get('animals');
            return $query->result_array();
        }
        public function get_ingredients()
        {
            $query = $this->db->get('treatments');
            return $query->result_array();
        }
        public function get_species()
        {
            $query = $this->db->get('species');
            return $query->result_array();
        }
        function load_report_entries($id)
        {
            $query = $this->db->where('id',$id);
            $query = $this->db->get('reports',1);
            $row = $query->row_array();
            return $row;
        }
        function load_animal($id)
        {
            $query = $this->db->where('id',$id);
            $query = $this->db->get('animals',1);
            $row = $query->row_array();
            return $row;
        }
        function get_sickness_id($id)
        {
            $query = $this->db->where('id',$id);
            $query = $this->db->get('reports',1);
            return $query->row()->sickness_id;
        }
        public function get_sickness_name($id)
        {
            $query = $this->db->where('id',$id);
            $query = $this->db->get('sicknesses',1);
            return $query->row()->name;
        }
        function get_ingredient_description($id)
        {
            $query = $this->db->where('id',$id);
            $query = $this->db->get('treatments',1);
            return $query->row()->note;
        }
        public function get_sickness_description($id)
        {
            $query = $this->db->where('id',$id);
            $query = $this->db->get('sicknesses',1);
            return $query->row()->description;
        }
        public function get_treatments_for_sickness($id)
        {
           $query = $this->db->query('
                SELECT treatments_for_sicknesses.id, treatments.name ,dosage
                FROM treatments_for_sicknesses
                LEFT JOIN sicknesses ON sicknesses.id = sickness_id
                LEFT JOIN treatments ON treatments.id = treatment_id
                LEFT JOIN treatments_details ON treatments_details.treatments_for_sickness_id= treatments_for_sicknesses.id
                WHERE sicknesses.id = '.$id.';');
            return $query->result_array();
        }
        public function get_details_for_treatment($id)
        {
            $query = $this->db->query('           
                SELECT treatments_for_sicknesses.id, treatments.id ,dosage, count_each, each_period, for_period, for_count, treatments_details.note ,treatments.name
                FROM treatments_for_sicknesses
                LEFT JOIN sicknesses ON sicknesses.id = sickness_id
                LEFT JOIN treatments ON treatments.id = treatment_id
                LEFT JOIN treatments_details ON treatments_details.treatments_for_sickness_id= treatments_for_sicknesses.id
                WHERE treatments_for_sicknesses.id = '.$id.';');
            return $query->result_array();
        }
        function save_data($data, $table)
        {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
        function save_treatment()
        {
              
            $this->db->trans_start();
            
            $treatment_id = 0;
            $treatment_for_sickness_id = 0;
            /* maybe later new ingredient
            $treatments =
            array
            (
                'name' =>$this->input->post('treatment_name'),
                'note' => ''
            );
             */
             
            $treatment_id = $this->input->post('ingredient');
            
            $treatments_for_sicknesses =
            array(
                'treatment_id' =>$treatment_id ,
                'sickness_id' => $this->input->post('sickness'),
                'subspecies_id' => $this->input->post('species')
            );
            $treatment_for_sickness_id= $this->save_data($treatments_for_sicknesses, 'treatments_for_sicknesses');;
            
            $treatment_details =
                array(
                    'treatments_for_sickness_id' => $treatment_for_sickness_id,
                    'dosage' => $this->input->post('dosage'),
                    'count_each' => $this->input->post('treatment_count'),
                    'note' => $this->input->post('treatment_notes'),
                    'each_period' => $this->input->post('each_period'),
                    'for_count' => $this->input->post('times'),
                    'for_period' => $this->input->post('taken_for')
                );
            $this->save_data($treatment_details,'treatments_details');
            
            $this->db->trans_complete();
            
            return $treatment_for_sickness_id;
        }
        function save_cryptorchidism($treatment_id)
        {
            $this->db->trans_start();
            
            $new_animal=0;
            $new_report =0;
            
            $subspecies = $this->input->post('species');
            //save animal
            $animal = array(
                'subspecies_id' => $subspecies,
                //'birthdate' => $this->input->post(''),
                'name'=> $this->input->post('name'),
                'isFemale'=> $this->input->post('gender')
            );
            $new_animal= $this->save_data($animal, 'animals');

            $user_id =  $this->get_user_id($this->session->email);
            
            //save Report
            $report = array(
                'sickness_id'=> $this->input->post('sickness'),
                'user_id'=> $user_id,
                'treatment_for_sickness_id'=>$treatment_id,
                'animal_id'=>$new_animal
            );
            $new_report = $this->save_data($report, 'reports');
            
            //save details cryptorchidism
            $new_cryptorchidism = array(
                'report_id'=> $new_report,
                'right_testicle_location'=> $this->input->post('right_testicle_location'),
                'left_testicle_location' => $this->input->post('left_testicle_location'),
                'left_size_diameter' => $this->input->post('left_size_diameter'),
                'right_size_diameter'=> $this->input->post('right_size_diameter'),
                'left_notes'=> $this->input->post('left_testicle_notes'),
                'right_notes'=> $this->input->post('right_testicle_notes'),
                'Visit'=> 0
            );
            $this->save_data($new_cryptorchidism, 'cryptorchidism');

            $this->db->trans_complete();
        }
        function save_induction_of_ovulation($treatment_id)
        {
            $this->db->trans_start();
            
            $new_animal=0;
            $new_report =0;
            
            $subspecies = $this->input->post('species');
            //save animal
            $animal = array(
                'subspecies_id' => $subspecies,
                //'birthdate' => $this->input->post(''),
                'name'=> $this->input->post('name'),
                'isFemale'=> $this->input->post('gender')
            );
            $new_animal= $this->save_data($animal, 'animals');
         
             $user_id =  $this->get_user_id($this->session->email);
            
            //save Report
            $report = array(
                'sickness_id'=> $this->input->post('sickness'),
                'user_id'=> $user_id,
                'treatment_for_sickness_id'=>$treatment_id,
                'animal_id'=>$new_animal
            );
            $new_report = $this->save_data($report, 'reports');
           
            $new_induction_of_ovulation = array(
                'report_id'=> $new_report,
                'discharge' => $this->input->post('discharge'),
                'quality_discharge' => $this->input->post('quality_discharge'),
                'vaginal_folds' => $this->input->post('vaginal_folds'),
                'basal_cells' => $this->input->post('basal_cells'),
                'parabasal_cells' => $this->input->post('parabasal_cells'),
                'intermediate_cells' => $this->input->post('intermediate_cells'),
                'superficial_cells' => $this->input->post('superficial_cells'),
                'potatoe_chips' => $this->input->post('potatoe_chips'),
                'WBC' => $this->input->post('WBC'),
                'oestradiol' => $this->input->post('oestradiol'),
                'progesterone' => $this->input->post('progesterone'),
                'LH' => $this->input->post('LH'),
                'Visit'=> 0
                
            );
            $this->save_data($new_induction_of_ovulation, 'induction_of_ovulation');
            $this->db->trans_complete();
        }
        function save_cystic_ovarian_disease($treatment_id)
        {
            $this->db->trans_start();
            
            $new_animal=0;
            $new_report =0;
            
            $subspecies = $this->input->post('species');
            //save animal
            $animal = array(
                'subspecies_id' => $subspecies,
                //'birthdate' => $this->input->post(''),
                'name'=> $this->input->post('name'),
                'isFemale'=> $this->input->post('gender')
            );
            $new_animal= $this->save_data($animal, 'animals');
            /*
            $query = $this->db->where('email',$this->session->email);
            $query = $this->db->get('users',1);
             * 
             */
            $user_id =  $this->get_user_id($this->session->email);
            
            //save Report
            $report = array(
                'sickness_id'=> $this->input->post('sickness'),
                'user_id'=> $user_id,
                'treatment_for_sickness_id'=>$treatment_id,
                'animal_id'=>$new_animal
            );
            $new_report = $this->save_data($report, 'reports');
          
            $new_cystic_ovarian_disease = array(
                'report_id'=> $new_report,
                'Right_ovary_length'=> $this->input->post('Right_ovary_length'),
                'Right_ovary_width' => $this->input->post('Right_ovary_width'),
                'Right_ovary_height' => $this->input->post('Right_ovary_height'),
                'Right_cystic_structures_count'=> $this->input->post('Right_cystic_structures_count'),
                'Right_notes'=> $this->input->post('Left_notes'),
                'Left_ovary_length'=> $this->input->post('Left_ovary_length'),
                'Left_ovary_width' => $this->input->post('Left_ovary_width'),
                'Left_ovary_height' => $this->input->post('Left_ovary_height'),
                'Left_cystic_structures_count'=> $this->input->post('Left_cystic_structures_count'),
                'Left_notes'=> $this->input->post('Left_notes'),
                'Visit'=> 0
            );
            $this->save_data($new_cystic_ovarian_disease, 'cystic_ovarian_disease');
            
            $this->db->trans_complete();
        }
        function load_report_visit($id, $sickness, $visit)
        {
              $query = $this->db->query('
                SELECT *
                FROM '.$sickness.'
                WHERE report_id = '.$id.'
                     AND Visit = '.$visit.' ;');
            return $query->result_array();
        }
        private function get_user_id($email)
        {
            $query = $this->db->where('email',$email);
            $query = $this->db->get('users',1);
            $user_id =  $query->row()->id;
            return $user_id;
        }
        function load_input_fields($id)
        {
             $query = $this->db->query('
                SELECT sickness_value_definition.id ,type, sickness_value_definition.name , sickness_value_definition.description, validation, sickness_block.name AS blockname
                FROM sickness_value_definition
                JOIN sickness_block ON sickness_block.id = block_id
                LEFT JOIN sickness_value_types ON sickness_value_types.id = sickness_value_definition.type_id
                WHERE sickness_id = '.$id.'
                 ;');
            return $query->result_array();
        }
        function load_input_fields_results($id)
        {
            $query = $this->db->query('
                SELECT sickness_value_definition.id ,type, sickness_value_definition.name , sickness_value_definition.description, validation, sickness_block.name AS blockname, value
                FROM sickness_value_definition
                JOIN sickness_block ON sickness_block.id = block_id
                LEFT JOIN sickness_value_types ON sickness_value_types.id = sickness_value_definition.type_id
                LEFT JOIN report_values ON report_values.value_id = sickness_value_definition.id
                WHERE report_values.report_id = '.$id.'
              
                 ;');
            return $query->result_array();
        }
        
        function get_dropdown_data($id)
        {
            $query = $this->db->query('
                SELECT id,text
                FROM sickness_value_dropdown_values
                WHERE value_id= '.$id.'
                 ;');
            return $query->result_array();
        }
        
        function save_report($treatment_id)
        {
            $this->db->trans_start();
            
            $new_animal=0;
            $new_report =0;
            
            $subspecies = $this->input->post('species');
            //save animal
            $animal = array(
                'subspecies_id' => $subspecies,
                //'birthdate' => $this->input->post(''),
                'name'=> $this->input->post('name'),
                'isFemale'=> $this->input->post('gender')
            );
            $new_animal= $this->save_data($animal, 'animals');
            /*
            $query = $this->db->where('email',$this->session->email);
            $query = $this->db->get('users',1);
             * 
             */
            $user_id =  $this->get_user_id($this->session->email);
            
            //save Report
            $report = array(
                'sickness_id'=> $this->input->post('sickness'),
                'user_id'=> $user_id,
                'treatment_for_sickness_id'=>$treatment_id,
                'animal_id'=>$new_animal
            );
            $new_report = $this->save_data($report, 'reports');
            //$this->db->trans_complete();
            return $new_report;
        }
        function save_report_values($report_id, $entries)
        {
            // $this->db->trans_start();
             foreach($entries as $entrie)
             {
                 $insert = array(
                     'report_id'=>$report_id,
                     'value' => $this->input->post($entrie['name']),
                     'value_id' => $entrie['id']
                 );
                 $this->db->insert('report_values', $insert);
             }
             $this->db->trans_complete();
        }
       function save_this_form($data ,$drop)
       {
           $blockname = '/%'; 
           $inserted_block_id = 0;
           //$inserted_sickness_id = 0;
           $last_value = 0;
           
            $this->db->trans_start();
            $insert_sickenss = array(
                'name' => $data[0]['sickness']['Name'],
                'description' => $data[0]['sickness']['description']
            );
            
            $inserted_sickness_id = $this->save_data($insert_sickenss, 'sicknesses');
           //Create new sickness
           foreach($data as $entrie)
           {
               //check for new Block
               if($entrie['blockname'] != $blockname)
               {
                   $blockname = $entrie['blockname'];
                   $new_block = array(
                        'name' => $entrie['blockname'],
                        'sickness_id' => $inserted_sickness_id
                   );
                   $inserted_block_id = $this->save_data( $new_block,'sickness_block');
                   
                }
                //select the right type_id. Divide between number/text for possible future development
                $type_id = 0;
                switch($entrie['type'])
                {
                    case 'text':
                        $type_id=1;
                        break;
                    case 'number':
                        $type_id=1;
                        break;
                    case 'drop':
                        $type_id=2;
                        break;
                }        
               //insert entrie into 
               //{"id":2,"block_id":2,"type":"text","name":"daasssa","description":"please enter text","validation":"trim|required|numeric","blockname":"fffddd"}]
               $new_value = array(
                   'block_id' => $inserted_block_id,
                   'type_id' => $type_id,
                   'name' => $entrie['name'],
                   'description' => $entrie['description'],
                   'validation' => $entrie['validation']
                      
               );
               //$this->db->insert('sickness_value_definition', $new_value);
               $last_value = $this->save_data($new_value,'sickness_value_definition');
               if( $type_id == 2)
               {
                   foreach($drop[$entrie['name']] as $dropnames)
                   {
                        $new_drop = array(
                            'value_id' => $last_value,
                            'text' => $dropnames
                        );
                        $this->save_data($new_drop,'sickness_value_dropdown_values');
                   }
               }
           }
           $this->db->trans_complete();
       }
        
    }