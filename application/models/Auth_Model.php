<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-27
 * Time: 4:43 AM
 */

class Auth_Model extends CI_Model {

    public function insert_register($data){

        $this->db->insert('user',$data);

    }

}