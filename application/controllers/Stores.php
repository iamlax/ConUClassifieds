<?php
class Stores extends MY_Controller{

    protected function middleware()
    {
        return array('user_auth');
    }

    public function index(){
        $data['title'] = 'Stores';

        $stores = $this->store_model->get_stores();
        
        $data['stores'] = $stores;

        $this->load->view('components/header');
        $this->load->view('stores/index', $data);
        $this->load->view('components/footer');
    }
}