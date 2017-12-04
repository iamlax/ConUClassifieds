<?php
class Advertisement_model extends CI_Model {

    public function get_ad($id) {
        $this->db->select('Advertisement.*, Location.city, SubCategory.name as sub_name, Category.name as cat_name');
        $this->db->from('Advertisement');
        $this->db->join('SubCategory', 'Advertisement.subCategoryId = SubCategory.subCategoryId');
        $this->db->join('Category', 'SubCategory.categoryId = Category.categoryId');
        $this->db->join('Location', 'Advertisement.locationId = Location.locationId');
        $this->db->where('adId', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_user_ads($id) {
        $this->db->select('Advertisement.*, Location.city, SubCategory.name as sub_name, Category.name as cat_name');
        $this->db->from('Advertisement');
        $this->db->join('SubCategory', 'Advertisement.subCategoryId = SubCategory.subCategoryId');
        $this->db->join('Category', 'SubCategory.categoryId = Category.categoryId');
        $this->db->join('Location', 'Advertisement.locationId = Location.locationId');
        $this->db->where('Advertisement.userId', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ads_by_user($id) {
        $this->db->select('Advertisement.*, Location.city, SubCategory.name as sub_name, Category.name as cat_name');
        $this->db->from('Advertisement');
        $this->db->join('SubCategory', 'Advertisement.subCategoryId = SubCategory.subCategoryId');
        $this->db->join('Category', 'SubCategory.categoryId = Category.categoryId');
        $this->db->join('Location', 'Advertisement.locationId = Location.locationId');
        $this->db->group_start();
        $this->db->where('Advertisement.expiryDate >=', date("Y-m-d H:i:s"));
        $this->db->or_where('Advertisement.promoExpiration >=', date("Y-m-d H:i:s"));
        $this->db->group_end();
        $this->db->where('Advertisement.userId', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ads_by_category($category = FALSE, $subcategory = FALSE, $location) {
        if ($subcategory === FALSE && $category === FALSE) {
            $this->db->where('Advertisement.locationId', $location);
            $this->db->group_start();
            $this->db->where('Advertisement.expiryDate >=', date("Y-m-d H:i:s"));
            $this->db->or_where('Advertisement.promoExpiration >=', date("Y-m-d H:i:s"));
            $this->db->group_end();
            $this->db->order_by('Advertisement.promoId', 'DESC');
            $this->db->order_by('Advertisement.date', 'DESC');
            $query = $this->db->get('Advertisement');
        } else if ($subcategory === FALSE ) {
			$this->db->select('Advertisement.*, Location.city, SubCategory.name as sub_name, Category.name as cat_name');
            $this->db->from('Advertisement');
            $this->db->join('SubCategory', 'Advertisement.subCategoryId = SubCategory.subCategoryId');
            $this->db->join('Category', 'SubCategory.categoryId = Category.categoryId');
            $this->db->join('Location', 'Advertisement.locationId = Location.locationId');
            $this->db->where('Category.categoryId', $category);
            $this->db->where('Advertisement.locationId', $location);
            $this->db->group_start();
            $this->db->where('Advertisement.expiryDate >=', date("Y-m-d H:i:s"));
            $this->db->or_where('Advertisement.promoExpiration >=', date("Y-m-d H:i:s"));
            $this->db->group_end();
            $this->db->order_by('Advertisement.promoId', 'DESC');
            $this->db->order_by('Advertisement.date', 'DESC');
			$query = $this->db->get();
        } else {
            $this->db->select('Advertisement.*, Location.city, SubCategory.name as sub_name, Category.name as cat_name');
            $this->db->from('Advertisement');
            $this->db->join('SubCategory', 'Advertisement.subCategoryId = SubCategory.subCategoryId');
            $this->db->join('Category', 'SubCategory.categoryId = Category.categoryId');
            $this->db->join('Location', 'Advertisement.locationId = Location.locationId');
            $this->db->where('SubCategory.subCategoryId', $subcategory);
            $this->db->where('Advertisement.locationId', $location);
            $this->db->group_start();
            $this->db->where('Advertisement.expiryDate >=', date("Y-m-d H:i:s"));
            $this->db->or_where('Advertisement.promoExpiration >=', date("Y-m-d H:i:s"));
            $this->db->group_end();
            $this->db->order_by('Advertisement.promoId', 'DESC');
            $this->db->order_by('Advertisement.date', 'DESC');
			$query = $this->db->get();
        }
        return $query->result_array();
    }

    public function create_advertisement($images){
        if ($this->input->post('storeId') <= 0 || $this->input->post('availability') == 'Online') {
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
            'forSaleBy' => $this->input->post('forSaleBy'),
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

        return $this->db->insert('Advertisement', $data);
    }

    public function update_advertisement($rating = FALSE){
        if ($this->input->post('storeId') <= 0 || $this->input->post('availability') == 'Online') {
            $storeId = NULL;
        } else {
            $storeId = $this->input->post('storeId');
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
                'forSaleby' => $this->input->post('forSaleBy'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'availability' => $this->input->post('availability'),
                'storeId' => $storeId,
            );
        }

        $this->db->where('adId', $this->input->post('adId'));
        return $this->db->update('Advertisement', $data);
    }

    public function delete_advertisement($id){
        $this->db->where('adId', $id);
        $this->db->delete('Advertisement');
        return true;
    }
}