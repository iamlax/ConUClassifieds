<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-27
 * Time: 4:26 AM
 */

class Auth_Controller extends CI_Controller {

    public function register(){
        $this->load->library('form_validation');
        $this->load->view('components/header');
        $this->load->view('pages/register');
        $this->load->view('components/footer');

        if(isset($_POST['register'])){
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == true){
                $data = array(
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                );
                $this->load->model('Auth_Model');
                $this->Auth_Model->insert_register($data);
                $this->session->set_flashdata("Success","Your account has been registered!");

            }
        }
    }

}