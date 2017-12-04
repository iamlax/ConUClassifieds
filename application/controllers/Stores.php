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

    public function calculator(){
        $data['title'] = 'Calculator';

        $this->load->view('components/header');
        $this->load->view('stores/calculator', $data);
        $this->load->view('components/footer');
    }

    public function calculate(){
        $data['title'] = 'Calculator';

        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('hours', 'Number of Hours', 'required');
        $this->form_validation->set_rules('strategicLocation', 'Strategic Location', 'required');
        $this->form_validation->set_rules('delivery', 'Delivery', 'required');

        if($this->form_validation->run() === FALSE){
            if (validation_errors() != NULL) {
                $this->session->set_flashdata('error', validation_errors());
            }
            $this->load->view('components/header');
            $this->load->view('stores/calculator', $data);
            $this->load->view('components/footer');
        } else {
            $isweekend = (date('N', strtotime($this->input->post('date'))) >= 6);
            $hours = $this->input->post('hours');
            if ($isweekend) {
                switch($this->input->post('strategicLocation')) {
                    case 1:
                        $cost = $hours*15*1.20;
                        break; 
                    case 2:
                        $cost = $hours*15*1.15;
                        break;
                    case 3:
                        $cost = $hours*15*1.10;
                        break;
                    case 4:
                        $cost = $hours*15*1.05;
                        break;
                }
                if($this->input->post('delivery') == 'True') {
                    $cost = $cost + ($hours*10);
                }
            } else {
                switch($this->input->post('strategicLocation')) {
                    case 1:
                        $cost = $hours*10*1.20;
                        break; 
                    case 2:
                        $cost = $hours*10*1.15;
                        break;
                    case 3:
                        $cost = $hours*10*1.10;
                        break;
                    case 4:
                        $cost = $hours*10*1.05;
                        break;
                }
                if($this->input->post('delivery') == 'True') {
                    $cost = $cost + ($hours*5);
                }
            }
    
            $data['cost'] = $cost;
            $data['date'] = $this->input->post('date');
            $data['hours'] = $this->input->post('hours');
            $data['delivery'] = $this->input->post('delivery');
            $data['strategicLocation'] = $this->input->post('strategicLocation');

            $this->load->view('components/header');
            $this->load->view('stores/calculator', $data);
            $this->load->view('components/footer');
        }
    }
}