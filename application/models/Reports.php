<?php
/**
 * Created by PhpStorm.
 * User: Laxman
 * Date: 11/29/2017
 * Time: 11:02 PM
 */

class Reports
{
    public function usersThatPostedHighestNumberInEachCategory($category) {

        // Sub Query
        $this->db->select('id')->from('employees_backup');
        $subQuery =  $this->db->get_compiled_select();

// Main Query
        $this->db->select('*')
            ->from('employees')
            ->where("id IN ($subQuery)", NULL, FALSE)
            ->get()
            ->result();


        $this->db->select('User.userId, COUNT(*)');
            $this->db->from('User');
            $this->db->join('Advertisement', 'Advertisement.userId = User.userId', 'INNER');
            $this->db->join('Subcategory', 'Subcategory.subCategoryId = Advertisement.subCategoryId', 'LEFT');
            $this->db->join('Category', 'Category.categoryId = Subcategory.categoryId', 'LEFT');
            $this->db->where('Category.name', $category);
            $this->db->group_by("User.userId");
            $this->db->having('COUNT(*)', );
            $query = $this->db->get();

        return $query->result_array();
    }
}
/*
HAVING COUNT(*) =
(SELECT MAX(x.num)
FROM
(SELECT Count(*) as num
FROM user
INNER JOIN advertisement ON user.userId = advertisement.userId
LEFT JOIN subcategory ON advertisement.subCategoryId = subcategory.subCategoryid
Left JOIN category ON subcategory.categoryId = category.categoryId
WHERE category.name = $
GROUP BY user.userId) x);

$ = ‘Buy and Sell’ or ‘Rent’ or ‘Services’ or ‘Cars’
*/