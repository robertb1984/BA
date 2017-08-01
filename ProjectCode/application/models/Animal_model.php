<?php
    class Animal_model extends CI_Model
    {
        public function __construct() {
            $this->load->database();
            $this->load->helper('date');
        }
        function get_animals()
        {
            $query = $this->db->query('
                SELECT name, IFNULL(used_count,0) as used_count
                FROM species
                LEFT JOIN (
                        SELECT subspecies_id , Count(id) as used_count
                        FROM animals
                        Group BY subspecies_id)used_count
                        ON used_count.subspecies_id = species.id
                 ;');
            return $query->result_array();
        }
        function save_species($species)
        {
            $this->db->insert('species', array('name' => $species));
        }
        
    }