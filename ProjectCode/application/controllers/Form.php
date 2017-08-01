<?php
    class Form extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            $this->is_authenticated();
            $this->load->model('Report_model');
            $this->load->model('Form_model');
           
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
            $form_data['this_defines'] ='form' ;
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

        function save_form()
        {
            
            $thisData = $this->input->post('data');
            $thisData = base64_decode($thisData);
            $thisData = json_decode($thisData, true);
            $thisDrop = $this->input->post('drop');
            $thisDrop = base64_decode($thisDrop);
            $thisDrop = json_decode($thisDrop, true);
            $thisCase = $this->input->post('thiscase');
            $thisCase = base64_decode($thisCase);
            $thisCase = json_decode($thisCase, true);
            if($thisCase == 'form')
            {
                //print_r($thisData);
                $this->Form_model->save_this_form($thisData, $thisDrop);
            }
            else
            {
                $this->Form_model->save_this_examination($thisData, $thisDrop);
                
            }
            
            
            $thisData = json_encode($thisData);
            echo $thisData;
        }
        function select_disease_form()
        {
            $data['title']= 'Define Visits';
            $data['sicknesses']= $this->Report_model->get_sicknesses_without_defined_visits();
            $data['dropdownSick'] = $this->dropdownData($data['sicknesses'], 'name', 'Sickness');
            
            $this->load->view('templates/header');
            $this->load->view('form/select_sickness',$data);
            $this->load->view('templates/footer');
        }
        function define_visits()
        {
            //$variable = $this->input->raw_input_stream;
            //print_r($variable);
            $case = $this->input->post('submit');
            $sickness_id = $this->input->post('sickness');
            $data['sickness_id'] = $sickness_id;
            $this->load->view('templates/header');
            
            switch($case)
            {
                case 'define':
                    
                    $this->load->view('form/define_visits_new',$data);
                    break;
                case 'Same as basic Form':
                    //todo save form_visits
                    $this->Form_model->use_disease_blocks($sickness_id);
                    
                    redirect('create_visits');
                    break;
                case 'decide on Blocks':
                    //get Blocknames and add them to $data
                    $data['title'] = 'Select each Block you want to use for examination ';
                    $data['blocks'] = $this->Form_model->get_sickness_blocks($sickness_id);
                    $this->load->view('form/define_visits_by_block',$data);
                    //$this->load->view();
                    break;
            }
            
            $this->load->view('templates/footer');
        }
        function Use_selected_blocks()
        {
            $checked = $this->input->post('checked');
            foreach ($checked as $block_id) 
                {
                    $this->Form_model->use_disease_block($block_id);
                }
            redirect('create_visits');
        }
        function create_new_examination()
        {
            $variable = $this->input->raw_input_stream;
            print_r($variable);
            $form_data['result']=0 ;
            $form_data['this_defines'] ='examination' ; 
            $form_data['this_count'] = 0;
            $count = $this->input->post('count');
            $sickness = $this->input->post('sickness_id');
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
                                'sickness_id' => $sickness
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
            $this->load->view('form/define_visits_new');
            if(null!==($this->input->post('preview')))
            {
                
                $this->load->view('reports/visit',$form_data);
                $this->load->view('form/save_newform',$form_data);
            }
            $this->load->view('templates/footer');
        }


    }