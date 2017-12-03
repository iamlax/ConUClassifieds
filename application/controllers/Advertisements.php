<?php
class Advertisements extends MY_Controller{

    protected function middleware()
    {
        return array('user_auth');
    }

    public function index(){
        if ($this->session->userdata('locationId') == NULL) {
            $this->session->set_flashdata('error', 'Please select a location before trying to select category.');
            redirect('home');
        }
        
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

        if ($this->session->userdata('userType') == 'Admin') {
            $data['isadmin'] = true;
        } else {
            $data['isadmin'] = false;
        }

        $this->load->view('components/header');
        $this->load->view('advertisements/view', $data);
        $this->load->view('components/footer');
    }

    public function view_user($id = NULL){
        $data['user'] = $this->user_model->get_user($id);
        
        if ($this->session->userdata('userId') == $data['user']['userId']) {
            $data['isowner'] = true;
            $ads = $this->advertisement_model->get_user_ads($id);
        } else {
            $data['isowner'] = false;
            $ads = $this->advertisement_model->get_ads_by_user($id);
        }

        foreach($ads as &$ad) {
            $ads_by_sub = $this->advertisement_model->get_ads_by_category(FALSE, $ad['subCategoryId'], $this->session->userdata('locationId'));
            $ad['rank'] = array_search($ad['adId'], array_column($ads_by_sub, 'adId')) + 1;
        }

        $data['advertisements'] = $ads;

        if(empty($data['user'])){
            show_404();
        }

        $this->load->view('components/header');
        $this->load->view('advertisements/view_user', $data);
        $this->load->view('components/footer');
    }

    public function create(){
        if ($this->session->userdata('locationId') == NULL) {
            $this->session->set_flashdata('error', 'Please select a location before trying to create an ad.');
            redirect('home');
        }

        $user = $this->user_model->get_user($this->session->userdata('userId'));

        // Makes sure user has a membership plan before creating an ad
        if ($user['membPlanId'] == NULL) {
            $this->session->set_flashdata('error', 'Purchase a membership plan to create an advertisement.');
            redirect('home');
        }

        $data['title'] = 'Create Advertisements';

        $categories = $this->category_model->get_categories();
        foreach($categories as &$category) {
            $category['subCategory'] = $this->category_model->get_subcategories($category['categoryId']);
        }
        
        $data['categories'] = $categories;

        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim|numeric');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('forSaleBy', 'For Sale By', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|regex_match[/^\d+\s[A-z]+/]');
        $this->form_validation->set_rules('availability', 'Availability', 'required');

        if ($this->input->post('availability') == 'Store') {
            $this->form_validation->set_rules('storeId', 'Store Id', 'required|trim|int');
        }

        if ($this->input->post('email'))
        {
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        }
        else if ($this->input->post('phone'))
        {
            $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|regex_match[/^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/]');
        }
        else
        {
            $this->form_validation->set_rules('phone', 'Phone or Email', 'required');
        }

        if (empty($_FILES['fileselect']['name'][0]))
        {
            $this->form_validation->set_rules('fileselect', 'images', 'required');
        }

        if($this->form_validation->run() === FALSE){
            if (validation_errors() != NULL) {
                $this->session->set_flashdata('error', validation_errors());
            }
            $this->load->view('components/header');
            $this->load->view('advertisements/create', $data);
            $this->load->view('components/footer');
        } else {
            // Upload Images
            //Configure upload.
            $this->upload->initialize(array(
                "upload_path"	=> "./public/images/uploads",
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
            $this->session->set_flashdata('success', 'Advertisement has been created.');

            redirect('advertisements/create');
        }
    }

    public function edit($id){
        $ad = $this->advertisement_model->get_ad($id);
        $user = $this->user_model->get_user($this->session->userdata('userId'));

        if ($ad['userId'] != $this->session->userdata('userId') && $user['userType'] != 'Admin') {
            $this->session->set_flashdata('error', 'You do not have permission to edit this ad.');
            redirect('home');
        }

        $data['title'] = 'Edit Advertisements';

        $categories = $this->category_model->get_categories();
        foreach($categories as &$category) {
            $category['subCategory'] = $this->category_model->get_subcategories($category['categoryId']);
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
        $ad = $this->advertisement_model->get_ad($this->input->post('adId'));
        $user = $this->user_model->get_user($this->session->userdata('userId'));

        if ($ad['userId'] != $this->session->userdata('userId') && $user['userType'] != 'Admin') {
            $this->session->set_flashdata('error', 'You do not have permission to edit this ad.');
            redirect('home');
        }

        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim|numeric');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('forSaleBy', 'For Sale By', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|regex_match[/^\d+\s[A-z]+/]');
        $this->form_validation->set_rules('availability', 'Availability', 'required');

        if ($this->input->post('availability') == 'Store') {
            $this->form_validation->set_rules('storeId', 'Store Id', 'required|trim|int');
        }

        if ($this->input->post('email'))
        {
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        }
        else if ($this->input->post('phone'))
        {
            $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|regex_match[/^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/]');
        }
        else
        {
            $this->form_validation->set_rules('phone', 'Phone or Email', 'required');
        }

        if($this->form_validation->run() === FALSE){
            if (validation_errors() != NULL) {
                $this->session->set_flashdata('error', validation_errors());
            }
            redirect('advertisements/edit/'.$this->input->post('adId'), $data);
        } else {
            $this->advertisement_model->update_advertisement();

            // Set message
            $this->session->set_flashdata('success', 'Advertisement has been updated.');

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
            $this->session->set_flashdata('success', 'Rating has been updated');

            redirect('advertisements/'.$this->input->post('adId'), $data);
        }
    }

    public function delete($id){
        $ad = $this->advertisement_model->get_ad($id);
        $user = $this->user_model->get_user($this->session->userdata('userId'));

        if ($ad['userId'] != $this->session->userdata('userId') && $user['userType'] != 'Admin') {
            $this->session->set_flashdata('error', 'You do not have permission to delete this ad.');
            redirect('home');
        }
        
        if ($ad['images']) {
            foreach(json_decode($ad['images']) as $image) {
                unlink('./public/images/uploads/'.$image);
            }
        }

		$this->advertisement_model->delete_advertisement($id);

		$this->session->set_flashdata('success', 'Advertisement has been deleted');

		redirect('advertisements/user/'.$this->session->userdata('userId'));
    }
}