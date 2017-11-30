<?php
class User_Model extends CI_Model {
    
    public function get_user($id) {
        $this->db->where('userId', $id);
        $query = $this->db->get('user');
        return $query->row_array();
    }
}