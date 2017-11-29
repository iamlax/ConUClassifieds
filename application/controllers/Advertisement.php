<?php
class Ads extends CI_Controller{
    public function index(){
        $data['title'] = 'Advertisements';

        $categories = $this->category_model->get_categories();
        foreach($categories as &$category) {
            $category['subcategory'] = $this->category_model->get_subcategories($category['categoryId']);
        }
        
        $data['categories'] = $categories;

        $this->load->view('components/header');
        $this->load->view('advertisements/index', $data);
        $this->load->view('components/footer');
    }
}