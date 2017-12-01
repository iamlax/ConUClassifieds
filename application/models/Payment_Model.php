<?php
class Payment_Model extends CI_Model {

    public function get_payments() {
        $this->db->select('*');
        $this->db->from('Payment');
        $this->db->join('Card', 'Card.cardId = Payment.cardId', 'INNER');
        $query = $this->db->get();
        return $query->result_array();
    }
}