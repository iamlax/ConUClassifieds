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

    public function view($id = NULL){
        $data['advertisement'] = $this->advertisement_model->get_ad($id);

        $data['user'] = $this->user_model->get_user($data['advertisement']['userId']);
        
        if(empty($data['advertisement'])){
            show_404();
        }
        
        if ($this->session->userdata('userId') == $data['user']['userId']) {
            $data['isowner'] = true;
        } else {
            $data['isowner'] = false;
        }

        $this->load->view('components/header');
        $this->load->view('advertisements/view', $data);
        $this->load->view('components/footer');
    }

    public function view_user($id = NULL){
        $data['advertisements'] = $this->advertisement_model->get_ads_by_user($id);

        $data['user'] = $this->user_model->get_user($id);

        if(empty($data['user'])){
            show_404();
        }

        if ($this->session->userdata('userId') == $data['user']['userId']) {
            $data['isowner'] = true;
        } else {
            $data['isowner'] = false;
        }
        $this->load->view('components/header');
        $this->load->view('advertisements/view_user', $data);
        $this->load->view('components/footer');
    }

    public function create(){
        $data['title'] = 'Create Advertisements';

        $categories = $this->category_model->get_categories();
        foreach($categories as &$category) {
            $category['subcategory'] = $this->category_model->get_subcategories($category['categoryId']);
        }
        
        $data['categories'] = $categories;

        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('forsaleby', 'For Sale By', 'required');
        // $this->form_validation->set_rules('images', 'Images', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        // $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('availability', 'Availability', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('components/header');
            $this->load->view('advertisements/create', $data);
            $this->load->view('components/footer');
        } else {
            // Upload Image
            // $config['upload_path'] = './assets/images/posts';
            // $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size'] = '2048';
            // $config['max_width'] = '2000';
            // $config['max_height'] = '2000';

            // $this->load->library('upload', $config);

            // if(!$this->upload->do_upload()){
            //     $errors = array('error' => $this->upload->display_errors());
            //     $post_image = 'noimage.jpg';
            // } else {
            //     $data = array('upload_data' => $this->upload->data());
            //     $post_image = $_FILES['userfile']['name'];
            // }

            $this->advertisement_model->create_advertisement();

            // Set message
            $this->session->set_flashdata('advertisement_created', 'Your advertisement has been created');

            redirect('advertisements/create');
        }
    }

    public function edit($id){
        $data['title'] = 'Edit Advertisements';

        $categories = $this->category_model->get_categories();
        foreach($categories as &$category) {
            $category['subcategory'] = $this->category_model->get_subcategories($category['categoryId']);
        }
        
        $data['categories'] = $categories;

        $data['advertisement'] = $this->advertisement_model->get_ad($id);
        
        if(empty($data['advertisement'])){
            show_404();
        }

        $this->load->view('components/header');
        $this->load->view('advertisements/edit', $data);
        $this->load->view('components/footer');
    }

    public function update(){
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('forsaleby', 'For Sale By', 'required');
        // $this->form_validation->set_rules('images', 'Images', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        // $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('availability', 'Availability', 'required');

        if($this->form_validation->run() === FALSE){
            redirect('advertisements/edit/'.$this->input->post('adId'), $data);
        } else {
            $this->advertisement_model->update_advertisement();

            // Set message
            $this->session->set_flashdata('avertisement_updated', 'Your advertisement has been updated');

            redirect('advertisements/user/'.$this->session->userdata('userId'));
        }
    }

    public function updateRating(){
        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if($this->form_validation->run() === FALSE){
            redirect('advertisements/'.$this->input->post('adId'), $data);
        } else {
            $this->advertisement_model->update_advertisement($this->input->post('rating'));

            // Set message
            $this->session->set_flashdata('avertisement_updated', 'Your advertisement has been updated');

            redirect('advertisements/'.$this->input->post('adId'), $data);
        }
    }

    public function delete($id){
		$this->advertisement_model->delete_advertisement($id);

		$this->session->set_flashdata('advertisement_deleted', 'Your advertisement has been deleted');

		redirect('advertisements/user/'.$this->session->userdata('userId'));
    }
}