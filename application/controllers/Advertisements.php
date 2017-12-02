<?php
class Advertisements extends MY_Controller{

    protected function middleware()
    {
        return array('user_auth');
    }

    public function index(){
        $location = $this->session->userdata('locationId');
        
        $data['ads'] = $this->advertisement_model->get_ads_by_category(FALSE, FALSE, $location);

        $this->load->view('components/header');
        $this->load->view('components/adbanner');
        $this->load->view('advertisements/index', $data);
        $this->load->view('components/footer');
    }

    public function view($id = NULL){
        $ad  = $this->advertisement_model->get_ad($id);

        $ads_by_sub = $this->advertisement_model->get_ads_by_category(FALSE, $ad['subCategoryId'], $this->session->userdata('locationId'));
        $ad['rank'] = array_search($ad['adId'], array_column($ads_by_sub, 'adId')) + 1;

        $data['advertisement'] = $ad;

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
        $ads = $this->advertisement_model->get_ads_by_user($id);

        foreach($ads as &$ad) {
            $ads_by_sub = $this->advertisement_model->get_ads_by_category(FALSE, $ad['subCategoryId'], $this->session->userdata('locationId'));
            $ad['rank'] = array_search($ad['adId'], array_column($ads_by_sub, 'adId')) + 1;
        }

        $data['advertisements'] = $ads;

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

        if (empty($_FILES['fileselect']['name'][0]))
        {
            $this->form_validation->set_rules('fileselect', 'images', 'required');
        }

        if($this->form_validation->run() === FALSE){
            $this->load->view('components/header');
            $this->load->view('advertisements/create', $data);
            $this->load->view('components/footer');
        } else {
            // Upload Images
            //Configure upload.
            $this->upload->initialize(array(
                "upload_path"	=> "./public/images/",
                "allowed_types" => "gif|jpg|png"
            ));

            //Perform upload.
            if($this->upload->do_multi_upload("fileselect")) {
                //Code to run upon successful upload.
                $imagesArray = $this->upload->get_multi_upload_data();
                $images = [];
                foreach($imagesArray as $image) {
                    $images[]= $image['file_name'];
                }
            }
        
            $this->advertisement_model->create_advertisement($images);

            // Set message
            $this->session->set_flashdata('advertisement_created', 'Your advertisement has been created');

            //redirect('advertisements/create');
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