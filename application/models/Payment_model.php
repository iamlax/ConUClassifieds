<?php
class Payment_model extends CI_Model {

    public function get_payments() {
        $this->db->select('*');
        $this->db->from('Payment');
        $this->db->join('Card', 'Card.cardId = Payment.cardId', 'INNER');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function backupPayments() {
        $this->db->query('CALL backupPayments();');
        return $this->db->affected_rows();
    }
}