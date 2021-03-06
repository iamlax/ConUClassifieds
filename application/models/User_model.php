<?php
class User_model extends CI_Model {
    
    public function get_user($id) {
        $this->db->where('userId', $id);
        $query = $this->db->get('User');
        return $query->row_array();
    }

    public function get_users() {
        $this->db->from('User');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function isStoreManager($managerId) {
        $query = $this->db->query("SELECT * FROM User 
            INNER JOIN Store on Store.managerId = User.userId
            WHERE Store.managerId = $managerId;");

        return $query->result_array();
    }
}