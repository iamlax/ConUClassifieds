<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-30
 * Time: 10:33 PM
 */

class ClientPayment extends MY_Controller
{
    protected function middleware()
    {
        return array('user_auth');
    }
    
    public function purchaseMembership(){

        $this->load->view('components/header');
        $this->load->view('payments/membershipForm');
        $this->load->view('components/footer');

        if (isset($_POST['purchase'])) {

            $this->form_validation->set_rules('membPlanId', 'Memberplan ID', 'required');
            $this->form_validation->set_rules('cardType', 'Card Type', 'required');
            $this->form_validation->set_rules('cardNumber', 'Card Number', 'required');

            if ($this->form_validation->run() == true) {

                $data = array(
                    'membPlanId' => $_POST['membPlanId'],
                    'cardType' => $_POST['cardType'],
                    'cardNumber' => $_POST['cardNumber'],
                    'userId' => $this->session->userdata('userId')
                );
                $this->clientpayment_model->purchaseMP($data);
                $this->session->set_flashdata('success', 'Membership plan has been applied to your account');
                //$this->load->view('components/header');
                redirect('viewProfile');
            } else {
                $this->load->view('components/header');
                $this->load->view('payments/membershipForm');
                $this->load->view('components/footer');
                //If failed, go back to register page, verified by validation
            }
        }
    }

    public function purchasePromotion($adId){

        $data['adId'] = intval($adId);

        $this->load->view('components/header');
        $this->load->view('payments/promotionPackageForm', $data);
        $this->load->view('components/footer');

        if (isset($_POST['purchasePromotion'])) {

            $this->form_validation->set_rules('promoId', 'Memberplan ID', 'required');
            $this->form_validation->set_rules('cardType', 'Card Type', 'required');
            $this->form_validation->set_rules('cardNumber', 'Card Number', 'required');

            if ($this->form_validation->run() == true) {

                $data = array(
                    'promoId' => $_POST['promoId'],
                    'cardType' => $_POST['cardType'],
                    'cardNumber' => $_POST['cardNumber'],
                    'userId' => $this->session->userdata('userId'),
                    'adId' => $adId
                );
                $this->clientpayment_model->purchasePromo($data);
                $this->session->set_flashdata('success', 'Promotion Package has been applied to your ad');
                //$this->load->view('components/header');
                redirect('advertisements/user/'.$this->session->userdata('userId'));
            } else {
                $this->load->view('components/header');
                $this->load->view('payments/promotionPackageForm', $data);
                $this->load->view('components/footer');
                //If failed, go back to register page, verified by validation
            }
        }
    }

}