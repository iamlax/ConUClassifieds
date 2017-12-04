<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-30
 * Time: 10:33 PM
 */

class Clientpayment_model extends CI_Model
{
    public function purchaseMP($data)
    {
        $amount = 0;
        switch ($data['membPlanId']) {
            case '1':
                $amount = 25;
                break;
            case '2':
                $amount = 50;
                break;
            case '3':
                $amount = 70;
                break;
        }

        $this->db->select('cardId');
        $this->db->from('Card');
        $this->db->where(array('cardNumber' => $data['cardNumber'], 'cardType' => $data['cardType']));
        $existCardId = $query = $this->db->get()->result_array();

        if(empty($existCardId)){
            $cardData = array(
                'cardNumber' => $data['cardNumber'],
                'cardType' => $data['cardType']
            );
            $this->db->insert('Card', $cardData);

            $this->db->select('cardId');
            $this->db->from('Card');
            $this->db->where(array('cardNumber' => $cardData['cardNumber'],'cardType' => $cardData['cardType']));
            $newCardId = $query = $this->db->get()->result_array();
            $paymentData = array(
                'userID' => $data['userId'],
                'amount' => $amount,
                'cardId' => $newCardId[0]['cardId'],
                'date' => date("Y-m-d")
            );
            $this->db->insert('Payment', $paymentData);
        }else{
            $paymentData = array(
                'userID' => $data['userId'],
                'amount' => $amount,
                'cardId' => $existCardId[0]['cardId'],
                'date' => date("Y-m-d")
            );
            $this->db->insert('Payment', $paymentData);
        }


        $newMembPlandId = intval($data['membPlanId']);

        $newPlan = array(
            'membPlanId' => $newMembPlandId
        );

        $this->db->where('userId', $data['userId']);
        $this->db->update('User', $newPlan);
        $this->session->set_userdata('membPlanId', $newMembPlandId);
    }

    public function purchasePromo($data)
    {
        $amount = 0;
        switch ($data['promoId']) {
            case '1':
                $amount = 10;
                $stop_date = new DateTime(); 
                $stop_date->modify('+7 day');
                $expiryDate= $stop_date->format('Y-m-d H:i:s');
                break;
            case '2':
                $amount = 50;
                $stop_date = new DateTime(); 
                $stop_date->modify('+30 day');
                $expiryDate= $stop_date->format('Y-m-d H:i:s');
                break;
            case '3':
                $amount = 90;
                $stop_date = new DateTime(); 
                $stop_date->modify('+60 day');
                $expiryDate = $stop_date->format('Y-m-d H:i:s');
                break;
        }

        $this->db->select('cardId');
        $this->db->from('Card');
        $this->db->where(array('cardNumber' => $data['cardNumber'], 'cardType' => $data['cardType']));
        $existCardId = $query = $this->db->get()->result_array();

        if(empty($existCardId)){
            $cardData = array(
                'cardNumber' => $data['cardNumber'],
                'cardType' => $data['cardType']
            );
            $this->db->insert('Card', $cardData);

            $this->db->select('cardId');
            $this->db->from('Card');
            $this->db->where(array('cardNumber' => $cardData['cardNumber'], 'cardType' => $cardData['cardType']));
            $newCardId = $query = $this->db->get()->result_array();
            $paymentData = array(
                'userID' => $data['userId'],
                'amount' => $amount,
                'cardId' => $newCardId[0]['cardId'],
                'date' => date("Y-m-d")
            );
            $this->db->insert('Payment', $paymentData);
        }else{
            $paymentData = array(
                'userID' => $data['userId'],
                'amount' => $amount,
                'cardId' => $existCardId[0]['cardId'],
                'date' => date("Y-m-d")
            );
            $this->db->insert('Payment', $paymentData);
        }

        $newPromoId = intval($data['promoId']);

        $newPromo = array(
            'promoId' => $newPromoId,
            'promoExpiration' => $expiryDate
        );

        $this->db->where('adId', $data['adId']);
        $this->db->update('Advertisement', $newPromo);
    }

}