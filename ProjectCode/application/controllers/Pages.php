<?php
    class Pages extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            $this->is_authenticated();
        }
        public function view($page = 'home')
        {
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
               // show_404();
            }
            
            $data['title']= ucfirst($page);
           // $this->load->helper('url'); 
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/footer');
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

