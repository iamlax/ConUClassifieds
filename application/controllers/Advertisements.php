<?php
class Advertisements extends CI_Controller{
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

    public function create(){
        $data['title'] = 'Advertisements';

        $categories = $this->category_model->get_categories();
        foreach($categories as &$category) {
            $category['subcategory'] = $this->category_model->get_subcategories($category['categoryId']);
        }
        
        $data['categories'] = $categories;

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('components/header');
            $this->load->view('advertisements/create', $data);
            $this->load->view('components/footer');
        }
    }
}