<?php
class Advertisement_Model extends CI_Model {

    public function get_ad($id) {
        $this->db->where('adId', $id);
        $query = $this->db->get('advertisement');
        return $query->row_array();
    }

    public function get_ads_by_user($id) {
        $this->db->where('advertisement.userId', $id);
        $query = $this->db->get('advertisement');
        return $query->result_array();
    }

    public function get_ads_by_category($category = FALSE, $subcategory = FALSE, $location) {
        if ($subcategory === FALSE && $category === FALSE) {
            $query = $this->db->get_where('advertisement', array('advertisement.locationId' => $location));
        } else if ($subcategory === FALSE ) {
			$this->db->select('advertisement.*');
            $this->db->from('advertisement');
            $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
			$this->db->join('category', 'subcategory.categoryId = category.categoryId');
            $this->db->where('category.categoryId', $category);
            $this->db->where('advertisement.locationId', $location);
			$query = $this->db->get();
        } else {
            $this->db->select('advertisement.*');
            $this->db->from('advertisement');
            $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
			$this->db->join('category', 'subcategory.categoryId = category.categoryId');
            $this->db->where('category.categoryId', $category);
            $this->db->where('subcategory.subcategoryId', $subcategory);
            $this->db->where('advertisement.locationId', $location);
			$query = $this->db->get();
        }
        return $query->result_array();
    }

    public function create_advertisement(){
        if ($this->input->post('storeId').length <= 0) {
            $storeId == NULL;
        } else {
            $storeId == $this->input->post('storeId');
        }

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
        );

        return $this->db->insert('advertisement', $data);
    }

    public function update_advertisement(){
        if ($this->input->post('storeId').length <= 0) {
            $storeId == NULL;
        } else {
            $storeId == $this->input->post('storeId');
        }

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

        $this->db->where('adId', $this->input->post('adId'));
        return $this->db->update('advertisement', $data);
    }

    public function delete_advertisement($id){
        $this->db->where('adId', $id);
        $this->db->delete('advertisement');
        return true;
    }
}