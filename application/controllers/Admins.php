<?php
class Admins extends MY_Controller{
    
    protected function middleware()
    {
        return array('admin_auth');
    }

    public function index(){
        $data['title'] = 'Admin View Ads';

        $this->load->view('components/header');
        $this->load->view('admins/index', $data);
        $this->load->view('components/footer');
    }

    public function payments(){
        $data['payment'] = $this->payment_model->get_payments();

        $this->load->view('components/header');
        $this->load->view('admins/payments', $data);
        $this->load->view('components/footer');
    }

    public function reports(){
        $data['title'] = 'Admin Report List';

        $this->load->view('components/header');
        $this->load->view('admins/reports', $data);
        $this->load->view('components/footer');
    }

    public function report1(){
        $r1 = $this->reports_model->usersThatPostedHighestNumberInEachCategory("Buy and Sell");
        $r2 = $this->reports_model->usersThatPostedHighestNumberInEachCategory("Rent");
        $r3 = $this->reports_model->usersThatPostedHighestNumberInEachCategory("Services");
        $r4 = $this->reports_model->usersThatPostedHighestNumberInEachCategory("Cars");

        $merge1 = array_merge($r1, $r2);
        $merge2 = array_merge($merge1, $r3);
        $merge3 = array_merge($merge2, $r4);

        $data['report1']=$merge3;

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

    public function report2(){

        $data['report2'] = $this->reports_model->detailsOfItemsPostedInLast10Days();

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

    public function report3(){

        $data['report3'] = $this->reports_model->usersInQuebecSellingMenWinterJackets();

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

    public function report4(){

        $data['report4'] = $this->reports_model->itemsInTheRentCategory();

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }


    public function report5(){

        $category = $this->category_model->get_categories();
        $locations = $this->location_model->get_locations();
        $merge1=[];
        foreach ($category as $c) {
            foreach ($locations as $l) {
                $temp = $this->reports_model->sellersHighestAverageRatingForItemsInACategoryForACity($l['city'], $c['name']);
                $merge1 = array_merge($merge1, $temp);
            }
        }

        $data['report5'] = $merge1;

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

    public function report6($managerId=NULL){

        $data['report6'] = $this->reports_model->getManagers();


        if(!empty($managerId)) {



            $data['report61'] = $this->reports_model->dailyRevenue($managerId);
            $data['report62'] = $this->reports_model->onlinePayments($managerId);
        }

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

    public function report7(){

        $data['report7'] = $this->reports_model->isItProfitableForASellerInSl1OrSl4();

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

    public function report8($province=NULL){

        $data['report8'] = $this->location_model->get_provinces();

        if(!empty($province)) {

            $data['report81'] = $this->reports_model->typesSoldInStore($province);
        }

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

    public function report9($userId=NULL){

        $data['report9'] = $this->user_model->get_users();

        if(!empty($userId)) {

            $data['report91'] = $this->reports_model->deliveryCostForPastAndPresent7Days($userId);
        }

        $this->load->view('components/header');
        $this->load->view('admins/reports_view', $data);
        $this->load->view('components/footer');
    }

}