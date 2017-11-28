<?php
class Location_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_locations() {
        $query = $this->db->get('location');
        return $query->result_array();
    }
}