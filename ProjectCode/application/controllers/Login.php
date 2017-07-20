<?php
    class Login extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            //$this->is_authenticated();
        }
        //if not logged in show log in otherwise log the user out
        function index()
        {
            $isLoggedIn = FALSE;
            $isLoggedIn = $this->session->userdata('is_auth');
            if(!$isLoggedIn)
            {
                $data['title']= 'Login';
              //   $this->load->helper('url'); 
                $this->load->view('templates/header');
                $this->load->view('login/login',$data);
                $this->load->view('templates/footer');
            }
            //button in the header changes if user is logged in. this gives the logout functionality
            else{
                $this->logout();
            }
        }
        
        function validate_user()
        {
            //load the model user_model for DB access
            $this->load->model('user_model');
            //function returns true or false and checks for user +password(hashed)
            $validated = $this->user_model->validate();
            
            //if user exists set session userdata and redirect to Users page 
            if($validated['result']== true)
            {
                $userdata =
                      array(
                          'email' =>$this->input->post('email'),
                          'is_auth' => true,
                          'is_admin' => $validated['is_admin'],
                          'name'=> $validated['name']
                      );
                $this->session->set_userdata($userdata);
                //toDo change to "myReports"
                redirect('/users');
            }
            else {
                echo "<script> alert('No user found'); </script>";
                redirect('/reports');
            }
        }
        //signup Form in view
        function signup()
        {
            $this->load->view('templates/header');
            $this->load->view('login/signup');
            $this->load->view('templates/footer');
        }
        //create account after validation
        //toDO check for duplicate User (email)
        function create_account()
        {
           $this->load->library('form_validation');
           
           //validate
           $this->form_validation->set_rules('name','Name','trim|required');
           $this->form_validation->set_rules('email','E-mail','trim|required');
           $this->form_validation->set_rules('password','Password','trim|required|min_length[8]|max_length[32]');
           $this->form_validation->set_rules('password2','Password confirmation','trim|required|matches[password]');
           
           if($this->form_validation->run() == FALSE)
           {
               //if validate fails "stay" on document 
               $this->signup();
           }
           else
           {
               //create user and redirect to home
               //toDO redirect to "my reports"
               $this->load->model('user_model');
               $createmember = $this->user_model->create_user();
               if($createmember)
               {
                   $page ='home';
                    $this->load->view('templates/header');
                    $this->load->view('pages/'.$page);
                    $this->load->view('templates/footer');
               }
               else
               {
      //             alert('Email already registered');
                  echo "<script> alert('email already in use'); </script>";
                   $this->signup();
               }
           }
        }
        //logs the user out by removing the set session variables.
        function logout()
        {
  
            $userdata = array('email','is_auth','is_admin','name');
            $this->session->unset_userdata($userdata);
            redirect('users');
        }

    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

