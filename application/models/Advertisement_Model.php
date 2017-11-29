<?php
class Advertisement_Model extends CI_Model {

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
}