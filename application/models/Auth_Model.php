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
        $password = $data['password'];
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('email'=>$email));
        $result = $query= $this->db->get()->result_array();

        if($result[0]['password'] === $password ){
            return $result[0];
        }else{
            return false;
        }

    }

}