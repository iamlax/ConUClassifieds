<?php
class Pages extends CI_Controller{
    public function view($page = 'home'){
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);

        $locations = $this->location_model->get_locations();

        // Creating new array with cities mapped to province
        $newLocations = array();
        foreach ($locations as $locations) {
          $province = $locations['province'];
          $city = $locations['city'];
          $id = $locations['locationId'];
        
          $newLocations[$province][$id] = $city;
        }
        $data['locations'] = $newLocations;

        $this->load->view('components/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('components/footer');
    }
}