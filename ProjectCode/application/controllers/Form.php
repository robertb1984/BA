<?php
    class Form extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            $this->is_authenticated();
            $this->load->model('Report_model');
           
        }
        function create_new()
        {
            
            //$variable = $this->input->raw_input_stream;
            //print_r($variable);
            $sickness =  array(
                'description' => '',
                'Name' => ''
            );
            
            if(null !== ($this->input->post('sickness_name')))
            {
                $sickness['Name'] = $this->input->post('sickness_name');
            }
            if(null !== ($this->input->post('sickness_desc')))
            {
                $sickness['description'] = $this->input->post('sickness_desc');
            }
            $form_data['result']=0 ;
            $count = $this->input->post('count');
            $animal['load_form_data'] = false;
            $data['load_form_data'] = false;
            $form_data['load_form_data'] = false;
            if(null!==($this->input->post('preview')))
            {
                $entries= array();
                $dropdowns = array();
                $this_block = 0;
                $blockname = '';
                //todo build the blocks
                for($i=0 ; $i <= $count ; $i++)
                {
                    $type = '';
                    $validation_rules = '';
                    $thisVar =  'var'.$i;
                    $thisRank= 'rank'.$i;
                    $thisDescription = 'Description'.$i;
                    $name =$this->input->post($thisVar);
                    $type_id = $this->input->post($thisRank);
                    $description = '';
                    switch($type_id)
                    {
                        case 0:
                            $this_block++;
                            $blockname = $name;
                            $description = $this->input->post($thisDescription);
                            break;
                        //text
                        case 1:
                            $type  ='text' ;
                            $validation_rules = 'trim';
                            $description = $this->input->post($thisDescription);
                            break;
                        //number
                        case 2:
                            $type  ='text' ;
                            $validation_rules = 'trim|required|numeric';
                            $description = $this->input->post($thisDescription);
                            break;
                        //dropdown
                        case 3:
                            $type ='drop' ;
                            $validation_rules = 'trim';
                            $description = $this->input->post($thisDescription);
                            break;
                        
                    }
                    if($type_id != 0)
                    {
                        $new_entrie = array(
                                'id'=> $i,
                                'block_id'=>$this_block,
                                'type'=>$type,
                                'name'=>$name,
                                'description'=> $description,
                                'validation'=>$validation_rules,
                                'blockname' =>$blockname,
                                'sickness' => $sickness
                        );
                        array_push($entries , $new_entrie);
                    }
                    if($type_id == 3)
                    {
                        $dropdownname = 'Dropdowns'.$i;
                        
                        $new_dropdown_data = explode(',', $this->input->post($dropdownname));
                        
                        //print_r($new_dropdown_data);
                        $dropdowns[$name] =  $new_dropdown_data ;
                        
                    }
                }
                
                $form_data['sickness'] = $sickness;
                $form_data['entries']= $entries;
                $form_data['dropdowns'] = $dropdowns;
            }
            print_r($form_data);
            $this->load->view('templates/header');
            $this->load->view('form/create');
            if(null!==($this->input->post('preview')))
            {
                $this->load->view('reports/animal',$animal);
                $this->load->view('reports/sickness',$form_data);
                $this->load->view('form/save_newform',$form_data);
            }
            $this->load->view('templates/footer');
        }
        /*
        function create_form()
        {
            
            $variable = $this->input->raw_input_stream; 
            print_r($variable);
            $this->load->view('templates/header');
            $this->load->view('form/create');
            $this->load->view('templates/footer');
        }
         */
        function save_form()
        {
            
            $thisData = $this->input->post('data');
            $thisData = base64_decode($thisData);
            $thisData = json_decode($thisData, true);
            $thisDrop = $this->input->post('drop');
            $thisDrop = base64_decode($thisDrop);
            $thisDrop = json_decode($thisDrop, true);
            //print_r($thisData);
            $this->Report_model->save_this_form($thisData, $thisDrop);
            
            $thisData = json_encode($thisData);
            echo $thisData;
        }
    }