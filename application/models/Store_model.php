<?php
class Store_model extends CI_Model {

    public function get_stores() {
        $this->db->select('*');
        $this->db->from('Store');
        $this->db->join('StrategicLocation', 'Store.strategicLocationId = StrategicLocation.strategicLocationId', 'INNER');
        $query = $this->db->get();
        return $query->result_array();
    }
}