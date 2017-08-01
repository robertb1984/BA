<?php
    class Users extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            $this->is_authenticated();
            $this->is_admin();
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
        function show_emails()
        {
            $data['title'] = 'Allowed E-mails';
            $data['emails'] = $this->user_model->get_allowed_mails();
            
            $this->load->view('templates/header');
            $this->load->view('users/allowed_mails',$data);
            $this->load->view('templates/footer');
            
        }
        function delete_mail($id)
        {
            $this->user_model->delete_mail($id);
            redirect('add_email');
        }
        function save_mail()
        {
            $this->load->library('form_validation');
            $email = $this->input->post('email');
            $this->form_validation->set_rules('email','E-mail','trim|required|valid_email|is_unique[users.email]');
            
            if($this->form_validation->run() === FALSE)
            {
                $this->show_emails();
                 
            }
            else
            {
                if(!($this->user_model->check_email_exists($email)))
                {
                    $this->user_model->save_mail($email);
                    redirect('add_email');
                }
            }
            
            //check if mail is used by a created user

        }
        function give_admin()
        {
            $this->is_admin();
            $future_admins= $this->input->post('admins');
            //print_r($future_admins);
            $this->user_model->give_admin($future_admins);
            redirect('users');
        }
    }