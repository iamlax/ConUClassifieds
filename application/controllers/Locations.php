<?php
class Locations extends CI_Controller{
    public function index(){
        $data['title'] = 'Locations';

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
    

        $this->load->view('components/header');
        $this->load->view('locations/index', $data);
        $this->load->view('components/footer');
    }

    public function set($id){
        $this->session->set_userdata('locationId', $id);
        redirect('/categories', 'refresh');
    }
}