<?php
class Advertisement_Model extends CI_Model {

    public function get_ads_by_category($category = FALSE, $subcategory = FALSE) {
        if ($subcategory === FALSE && category == FALSE) {
            $query = $this->db->get('advertisement');
        } else if ($subcategory === FALSE ) {
			$this->db->select('advertisement.*');
            $this->db->from('advertisement');
            $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
			$this->db->join('category', 'subcategory.categoryId = category.categoryId');
			$this->db->where('category.categoryId', $category);
			$query = $this->db->get();
        } else {
            $this->db->select('advertisement.*');
            $this->db->from('advertisement');
            $this->db->join('subcategory', 'advertisement.subcategoryId = subcategory.subcategoryId');
			$this->db->join('category', 'subcategory.categoryId = category.categoryId');
            $this->db->where('category.categoryId', $category);
            $this->db->where('subcategory.subcategoryId', $subcategory);
			$query = $this->db->get();
        }
        return $query->result_array();
    }
}