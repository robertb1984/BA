<?php
    class User_model extends CI_Model
    {
        public function __construct() {
            $this->load->database();
        }
        //gets all users
        public function get_users()
        {
            $query = $this->db->get('users');
            return $query->result_array();
        }
        //validates a user through post data
        function validate()
        {
            $this->db->where('email',$this->input->post('email'));
            //$this->db->where('password',password_hash($this->input->post('password'),PASSWORD_BCRYPT));
            
            $query= $this->db->get('users',1);
            $row= $query->row();
            if(password_verify($this->input->post('password'), $row->password))
            {
                $result = array(
                    'result' => true,
                    'is_admin' => $row->adminstatus,
                    'name' => $row->name);
                return $result;
            }
            else 
            {
               $result = array(
                    'result' => false
                    );
               return $result;
            }
        }
        //insert new user into DB and with hashed PW
        function create_user()
        {
            $new_user=array(
              'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
            );
            
           $success = $this->check_email_exists($new_user['email']);
            if($success)
            {
                return false;
            }
            else
            {
                $success = $this->db->insert('users',$new_user);
                return $success;
            }
        }
                
        public function check_email_exists($email)
        {
            $this->db->from('users');
            $this->db->where('email',$email);
            if ($this->db->get()->num_rows() > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
            
        }

    }


