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
                    'name' => $row->name,
                    'user_id'=> $row->id);
                
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
            $allowed = $this->check_if_email_allowed($new_user['email']);
            //$success = $this->check_email_exists($new_user['email']);
            if($allowed)
            {
                $success = $this->db->insert('users',$new_user);
                return $allowed;
                
            }
            else
            {
                return false;
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
        function check_if_email_allowed($email)
        {
            //first check if email is in allowed list
            $this->db->from('allowed_emails');
            $this->db->where('email',$email);
            if($this->db->get()->num_rows() > 0)
            {
                //check if email is not in use
                $email_in_use = $this->check_email_exists($email);
                if($email_in_use)
                {
                    return false;
                }
                else{
                    return true;
                }
            }
            else
            {
                return false;
            }
        }
        function get_allowed_mails()
        {
            $query = $this->db->get('allowed_emails');
            return $query->result_array();
        }
        function delete_mail($id)
        {
            $this->db->delete('allowed_emails', array('id' => $id));
        }
        function save_mail($email)
        {
            $this->db->insert('allowed_emails', array('email' => $email));
        }
        function give_admin($future_admins)
        {
            foreach ($future_admins as $user) 
            {
                $this->db->set('adminstatus', '1', FALSE);
                $this->db->where('id', $user);
                $this->db->update('users');
            }
        }
             

    }


