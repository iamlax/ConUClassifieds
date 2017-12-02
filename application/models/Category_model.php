<?php
	class Category_model extends CI_Model{

		public function get_categories($id = FALSE){
			if($id == FALSE) {
				$query = $this->db->get('Category');
			} else {
				$this->db->where('Category.categoryId', $id);
				$query = $this->db->get('Category');
			}
			return $query->result_array();
        }
        
        public function get_subcategories($id = FALSE){
			if ($id === FALSE) {
				$query = $this->db->get('SubCategory');
			} else {
				$this->db->select('SubCategory.subCategoryId, SubCategory.name');
				$this->db->from('SubCategory');
				$this->db->join('Category', 'SubCategory.categoryId = Category.categoryId');
				$this->db->where('Category.categoryId', $id);
				$query = $this->db->get();
			}
			return $query->result_array();
		}
	}