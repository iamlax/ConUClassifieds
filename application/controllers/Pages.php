<?php
class Pages extends CI_Controller{
    public function view($page = 'home'){
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);

        if($page == 'home' && $this->session->userdata('userId') !== null){
            redirect('locations');
        }

        $this->load->view('components/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('components/footer');
    }
}