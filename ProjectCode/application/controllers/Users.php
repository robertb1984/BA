<?php
    class Users extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            $this->is_authenticated();
        }
        //placeholder just shows all users
        public function index()
        {

            $data['title']= 'users';
            $data['users']= $this->user_model->get_users();
            //print_r($data['users']);
            //$this->load->helper('url'); 
            $this->load->view('templates/header');
            $this->load->view('users/index',$data);
            $this->load->view('templates/footer');
        }
    }