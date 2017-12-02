<?php
class Advertisement_Model extends CI_Model {

    public function get_ad($id) {
        $this->db->select('advertisement.*, location.city, subcategory.name as sub_name, category.name as cat_name');
        $this->db->from('advertisement');
        $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
        $this->db->join('category', 'subcategory.categoryId = category.categoryId');
        $this->db->join('location', 'advertisement.locationId = location.locationId');
        $this->db->where('adId', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_ads_by_user($id) {
        $this->db->select('advertisement.*, location.city, subcategory.name as sub_name, category.name as cat_name');
        $this->db->from('advertisement');
        $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
        $this->db->join('category', 'subcategory.categoryId = category.categoryId');
        $this->db->join('location', 'advertisement.locationId = location.locationId');
        $this->db->where('advertisement.userId', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ads_by_category($category = FALSE, $subcategory = FALSE, $location) {
        if ($subcategory === FALSE && $category === FALSE) {
            $query = $this->db->get_where('advertisement', array('advertisement.locationId' => $location));
        } else if ($subcategory === FALSE ) {
			$this->db->select('advertisement.*, location.city, subcategory.name as sub_name, category.name as cat_name');
            $this->db->from('advertisement');
            $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
            $this->db->join('category', 'subcategory.categoryId = category.categoryId');
            $this->db->join('location', 'advertisement.locationId = location.locationId');
            $this->db->where('category.categoryId', $category);
            $this->db->where('advertisement.locationId', $location);
            $this->db->order_by('advertisement.promoId', 'DESC');
            $this->db->order_by('advertisement.date', 'DESC');
			$query = $this->db->get();
        } else {
            $this->db->select('advertisement.*, location.city, subcategory.name as sub_name, category.name as cat_name');
            $this->db->from('advertisement');
            $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
            $this->db->join('category', 'subcategory.categoryId = category.categoryId');
            $this->db->join('location', 'advertisement.locationId = location.locationId');
            $this->db->where('subcategory.subcategoryId', $subcategory);
            $this->db->where('advertisement.locationId', $location);
            $this->db->order_by('advertisement.promoId', 'DESC');
            $this->db->order_by('advertisement.date', 'DESC');
			$query = $this->db->get();
        }
        return $query->result_array();
    }

    public function create_advertisement($images){
        if ($this->input->post('storeId') <= 0) {
            $storeId = NULL;
        } else {
            $storeId = $this->input->post('storeId');
        }
        $now = date('Y-m-d H:i:s');

        $data = array(
            'subCategoryId' => $this->input->post('category'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'type' => $this->input->post('type'),
            'forsaleby' => $this->input->post('forsaleby'),
            'images' => $this->input->post('images'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'availability' => $this->input->post('availability'),
            'storeId' => $storeId,
            'userId' => $this->session->userdata('userId'),
            'locationId' => $this->session->userdata('locationId'),
            'images' => json_encode($images),
            'date' => $now,
        );

        return $this->db->insert('advertisement', $data);
    }

    public function update_advertisement($rating = FALSE){
        if ($this->input->post('storeId').length <= 0) {
            $storeId == NULL;
        } else {
            $storeId == $this->input->post('storeId');
        }
        if ($rating) {
            $data = array('rating' => $rating);
        } else {
            $data = array(
                'subCategoryId' => $this->input->post('category'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'type' => $this->input->post('type'),
                'forsaleby' => $this->input->post('forsaleby'),
                'images' => $this->input->post('images'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'availability' => $this->input->post('availability'),
                'storeId' => $storeId,
            );
        }

        $this->db->where('adId', $this->input->post('adId'));
        return $this->db->update('advertisement', $data);
    }

    public function delete_advertisement($id){
        $this->db->where('adId', $id);
        $this->db->delete('advertisement');
        return true;
    }
}