<?php
class Store_model extends CI_Model {

    public function get_stores() {
        $this->db->select('Store.*, StrategicLocation.*, User.firstName, User.lastName, User.email');
        $this->db->from('Store');
        $this->db->join('StrategicLocation', 'Store.strategicLocationId = StrategicLocation.strategicLocationId', 'INNER');
        $this->db->join('User', 'User.userId = Store.managerId', 'INNER');
        $query = $this->db->get();
        return $query->result_array();
    }
}