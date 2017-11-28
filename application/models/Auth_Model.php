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

    public function check_login($data){
        $email = $data['email'];
        $query = "SELECT * FROM user WHERE 'email' = "."'$email'";
        $result = $this->db->query($query)->result_array();

        var_dump($result);
    }

}