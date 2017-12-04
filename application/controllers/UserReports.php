<?php
/**
 * Created by PhpStorm.
 * User: Laxman
 * Date: 12/3/2017
 * Time: 10:00 PM
 */

class UserReports extends MY_Controller{

    protected function middleware()
    {
        return array('user_auth');
    }

    public function userReportsView(){
        $data['title'] = 'User Report List';

        $this->load->view('components/header');
        $this->load->view('userReports/userReports', $data);
        $this->load->view('components/footer');
    }

    public function report10_2(){

        $user = $this->user_model->get_user($this->session->userdata('userId'));

        $data['report10_2'] = $this->reports_model->listOfSellersItemsSoldAndRating($user['userId']);

        $this->load->view('components/header');
        $this->load->view('userReports/userReports_view', $data);
        $this->load->view('components/footer');
    }

    public function report10_3(){

        $user = $this->user_model->get_user($this->session->userdata('userId'));

        $data['report10_3'] = $this->reports_model->listOfUsersItemsThatHaveAPromotionPackageOnThemWithThePostedAndExpiryDate($user['userId']);

        $this->load->view('components/header');
        $this->load->view('userReports/userReports_view', $data);
        $this->load->view('components/footer');
    }

    public function report10_4(){

        $user = $this->user_model->get_user($this->session->userdata('userId'));

        $data['report10_4'] = $this->reports_model->listOfUsersExpiredItems($user['userId']);

        $this->load->view('components/header');
        $this->load->view('userReports/userReports_view', $data);
        $this->load->view('components/footer');
    }

    public function report10_5($storeId=NULL){

        $data['stores'] = $this->reports_model->getStores();

        if(!empty($storeId)) {

            $data['report10_5'] = $this->reports_model->listOfUsersRentingStoreSpaceAndTheTimesRented($storeId);
        }

        $this->load->view('components/header');
        $this->load->view('userReports/userReports_view', $data);
        $this->load->view('components/footer');
    }
}