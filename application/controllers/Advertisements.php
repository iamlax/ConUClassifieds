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
        $data['title'] = 'Create Advertisements';

        $categories = $this->category_model->get_categories();
        foreach($categories as &$category) {
            $category['subcategory'] = $this->category_model->get_subcategories($category['categoryId']);
        }
        
        $data['categories'] = $categories;

        // $this->form_validation->set_rules('category', 'Category', 'required');
        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');
        // $this->form_validation->set_rules('price', 'Price', 'required');
        // $this->form_validation->set_rules('type', 'Type', 'required');
        // $this->form_validation->set_rules('forsaleby', 'For Sale By', 'required');
        // $this->form_validation->set_rules('images', 'Images', 'required');
        // $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        // // $this->form_validation->set_rules('email', 'Email Address', 'required');
        // $this->form_validation->set_rules('address', 'Address', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('components/header');
            $this->load->view('advertisements/create', $data);
            $this->load->view('components/footer');
        } else {
            // Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);

            // Set message
            $this->session->set_flashdata('post_created', 'Your post has been created');

            redirect('posts');
        }
    }
}