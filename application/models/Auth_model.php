<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-27
 * Time: 4:43 AM
 */

class Auth_model extends CI_Model {

    public function insert_register($data){

        $this->db->insert('User',$data);

    }

    public function check_login($data){
        $email = $data['email'];
        $password = $data['password'];
        $this->db->select('*');
        $this->db->from('User');
        $this->db->where(array('email'=>$email));
        $result = $query= $this->db->get()->result_array();

        if($result[0]['password'] === $password ){
            return $result[0];
        }else{
            return false;
        }

    }

    public function getPlan($id){
        $this->db->select('name');
        $this->db->from('MembershipPlan');
        $this->db->where(array('membPlanId'=>$id));
        $memberPlan = $query = $this->db->get()->result_array();
        if($memberPlan == null){
            return $memberPlan = array('name'=>'None');
        }else{
            return $memberPlan[0];
        }

    }

}