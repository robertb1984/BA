<?php
    class Animals extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            $this->is_authenticated();
            $this->load->model('Animal_model');
            $this->is_admin();
            
        }
         public function overview()
        {
           
            $data['title']= 'Created species';
            $data['animals']= $this->Animal_model->get_animals();
            //print_r($data['users']);
            //$this->load->helper('url'); 
            $this->load->view('templates/header');
            $this->load->view('animals/animals',$data);
            $this->load->view('templates/footer');
        }
        function add_animal()
        {
            $this->load->library('form_validation');
            $animal = $this->input->post('animal');
            $this->form_validation->set_rules('animal','name','trim|required|is_unique[species.name]');
            
            if($this->form_validation->run() === FALSE)
            {
                $this->overview();
                echo "<script> alert('Validation error'); </script>";
                 
            }
            else
            {
             
                $this->Animal_model->save_species($animal);
                $this->overview();
                echo "<script> alert('Success'); </script>";
                
            }
            
            //check if mail is used by a created user

        }
    }
    