<?php
class Categories extends MY_Controller{

    protected function middleware()
    {
        return array('user_auth');
    }

    public function index(){
        $data['title'] = 'Categories';

        $categories = $this->category_model->get_categories();
        
        $data['categories'] = $categories;

        $this->load->view('components/header');
        $this->load->view('categories/index', $data);
        $this->load->view('components/footer');
    }

    public function subcategory($id){
        $data['title'] = 'Sub Categories';

        $categories = $this->category_model->get_categories($id);
        foreach($categories as &$category) {
            $category['subcategory'] = $this->category_model->get_subcategories($category['categoryId']);
        }
        
        $data['categories'] = $categories;

        $this->load->view('components/header');
        $this->load->view('categories/subcategories', $data);
        $this->load->view('components/footer');
    }

    public function advertisements($cat = FALSE, $subcat = FALSE){
        $location = $this->session->userdata('locationId');

        $data['ads'] = $this->advertisement_model->get_ads_by_category($cat, $subcat, $location);

        $this->load->view('components/header');
        $this->load->view('components/adbanner');
        $this->load->view('advertisements/index', $data);
        $this->load->view('components/footer');
    }
}