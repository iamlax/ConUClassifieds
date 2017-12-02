<?php
	class Category_model extends CI_Model{

		public function get_categories($id = FALSE){
			if($id == FALSE) {
				$query = $this->db->get('category');
			} else {
				$this->db->where('category.categoryId', $id);
				$query = $this->db->get('category');
			}
			return $query->result_array();
        }
        
        public function get_subcategories($id = FALSE){
			if ($id === FALSE) {
				$query = $this->db->get('subcategory');
			} else {
				$this->db->select('subcategory.subcategoryId, subcategory.name');
				$this->db->from('subcategory');
				$this->db->join('category', 'subcategory.categoryId = category.categoryId');
				$this->db->where('category.categoryId', $id);
				$query = $this->db->get();
			}
			return $query->result_array();
		}
	}