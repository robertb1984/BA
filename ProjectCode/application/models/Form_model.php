<?php
    class Form_model extends CI_Model
    {
        public function __construct() {
            $this->load->database();
            $this->load->helper('date');
        }

        //basic function to save data into a table and get the last inserted id back.(todo : could be added to CI_Model)
        function save_data($data, $table)
        {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
        function get_sickness_by_block($block_id)
        {
            $query = $this->db->where('id',$block_id);
            $query = $this->db->get('sickness_block',1);
            return $query->row()->sickness_id;
        }
        //creates the basic disease form
        function save_this_form($data ,$drop)
        {
           $blockname = '/%'; 
           $inserted_block_id = 0;
           $last_value = 0;
           
            $this->db->trans_start();
            $insert_sickenss = array(
                'name' => $data[0]['sickness']['Name'],
                'description' => $data[0]['sickness']['description'],
                'creator' => $this->session->userdata('user_id')
                
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
                //select the right type_id. switch between number/text for possible future development
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
        function save_this_examination($data ,$drop)
        {
           $blockname = '/%'; 
           $inserted_block_id = 0;
           $last_value = 0;
           
            $this->db->trans_start();
            
           //Create new sickness
           foreach($data as $entrie)
           {
               //check for new Block
               if($entrie['blockname'] != $blockname)
               {
                   $blockname = $entrie['blockname'];
                   $new_block = array(
                        'name' => $entrie['blockname'],
                        'sickness_id' => $entrie['sickness_id']
                   );
                   $inserted_block_id = $this->save_data( $new_block,'visit_block');
                   
                }
                //select the right type_id. switch between number/text for possible future development
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
               $last_value = $this->save_data($new_value,'visit_value_definition');
               if( $type_id == 2)
               {
                   foreach($drop[$entrie['name']] as $dropnames)
                   {
                        $new_drop = array(
                            'value_id' => $last_value,
                            'text' => $dropnames
                        );
                        $this->save_data($new_drop,'visit_value_dropdown_values');
                   }
               }
           }
           $this->db->trans_complete();
        }
        //adds exhamination definition to chosen sickness and makes them the same as the disease block
        function use_disease_blocks($sickness_id)
        {
           $this->db->trans_start();
       
            $query= $this->db->query('  
                INSERT INTO visit_block(name, sickness_id)
                SELECT name, '.$sickness_id.'
                FROM sickness_block
                WHERE sickness_id ='.$sickness_id );
            
            $query= $this->db->query('  
                INSERT INTO visit_value_definition(block_id, type_id, name, description, validation)
                SELECT visit_block.id, type_id, sickness_value_definition.name, sickness_value_definition.description, sickness_value_definition.validation
                FROM visit_block
                INNER JOIN sickness_block ON sickness_block.sickness_id = visit_block.sickness_id
                    AND sickness_block.name = visit_block.name
                JOIN sickness_value_definition on sickness_block.id = sickness_value_definition.block_id
                WHERE sickness_block.sickness_id ='.$sickness_id );

            $query= $this->db->query('  
                INSERT INTO visit_value_dropdown_values(value_id, text)
                SELECT visit_value_definition.id ,sickness_value_dropdown_values.text 
                FROM visit_block
                INNER JOIN sickness_block ON sickness_block.sickness_id = visit_block.sickness_id
                    AND sickness_block.name = visit_block.name
                JOIN sickness_value_definition on sickness_block.id = sickness_value_definition.block_id
                JOIN visit_value_definition ON visit_value_definition.block_id = visit_block.id
                INNER JOIN sickness_value_dropdown_values ON sickness_value_dropdown_values.value_id = sickness_value_definition.id
                WHERE sickness_block.sickness_id ='.$sickness_id );

            $this->db->trans_complete();
        }
        //Clone disease/sickness block for examination
        function use_disease_block($block_id)
        {
           $this->db->trans_start();
            $sickness_id = $this->get_sickness_by_block($block_id);
                
            $query= $this->db->query('  
                INSERT INTO visit_block(name, sickness_id)
                SELECT name, '.$sickness_id.'
                FROM sickness_block
                WHERE id ='.$block_id );
            
            $query= $this->db->query('  
                INSERT INTO visit_value_definition(block_id, type_id, name, description, validation)
                SELECT visit_block.id, type_id, sickness_value_definition.name, sickness_value_definition.description, sickness_value_definition.validation
                FROM visit_block
                INNER JOIN sickness_block ON sickness_block.sickness_id = visit_block.sickness_id
                    AND sickness_block.name = visit_block.name
                JOIN sickness_value_definition on sickness_block.id = sickness_value_definition.block_id
                WHERE sickness_block.id ='.$block_id );

            $query= $this->db->query('  
                INSERT INTO visit_value_dropdown_values(value_id, text)
                SELECT visit_value_definition.id ,sickness_value_dropdown_values.text 
                FROM visit_block
                INNER JOIN sickness_block ON sickness_block.sickness_id = visit_block.sickness_id
                    AND sickness_block.name = visit_block.name
                JOIN sickness_value_definition on sickness_block.id = sickness_value_definition.block_id
                JOIN visit_value_definition ON visit_value_definition.block_id = visit_block.id
                INNER JOIN sickness_value_dropdown_values ON sickness_value_dropdown_values.value_id = sickness_value_definition.id
                WHERE sickness_block.id ='.$block_id );

            $this->db->trans_complete();
        }
        //gets all sickness blocks for $sickness_id
        function get_sickness_blocks($sickness_id)
        {
            $query = $this->db->where('sickness_id',$sickness_id);
            $query = $this->db->get('sickness_block');
            return $query->result_array();
        }
        function get_my_non_released($user_id)
        {
              $query = $this->db->query('
                SELECT sicknesses.id as id, name , IFNULL(used_count, 0 ) as used_count
                FROM sicknesses
                LEFT JOIN (
                    SELECT sickness_id , Count(id) as used_count
                    FROM reports
                    GROUP BY sickness_id)used_count
                    ON used_count.sickness_id = sicknesses.id
                WHERE (release_status = 0 && creator = '.$user_id.')
                 ;');
            return $query->result_array();
        }
        function delete_testreports($sickness_id)
        {
            $this->db->where('sickness_id', $sickness_id);
            $this->db->delete('reports');
        }
        function release_form($form_id)
        {
            $this->db->set('release_status', '1', FALSE);
            $this->db->where('id', $form_id);
            $this->db->update('sicknesses');
        }
        function get_sicknesses()
        {
            
            $query = $this->db->get('sicknesses');
            return $query->result_array();
        }
        function load_input_fields($id)
        {
            $query = $this->db->query('
                SELECT sickness_value_definition.id ,type, sickness_value_definition.name , sickness_value_definition.description, sickness_block.name AS blockname, "basic form" AS fromThis
                FROM sickness_value_definition
                JOIN sickness_block ON sickness_block.id = block_id
                LEFT JOIN sickness_value_types ON sickness_value_types.id = sickness_value_definition.type_id
                WHERE sickness_id = '.$id.'
                UNION
                SELECT visit_value_definition.id ,type, visit_value_definition.name , visit_value_definition.description, visit_block.name AS blockname, "examination" AS fromThis
                FROM visit_value_definition
                JOIN visit_block ON visit_block.id = block_id
                LEFT JOIN sickness_value_types ON sickness_value_types.id = visit_value_definition.type_id
                WHERE sickness_id = '.$id.'
                 ;');
            return $query->result_array();
        }
        function update_description($table,$id,$description)
        {
            $description= array(
               'description'=> $description
           );
           $this->db->where('id', $id);
           $this->db->update($table, $description);
           return 1;
        }
        function delete_non_released($sickness_id)
        {
            $this->db->where('id', $sickness_id);
            $this->db->delete('sicknesses');
        }
 }