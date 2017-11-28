<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-27
 * Time: 4:26 AM
 */

class Auth_Controller extends CI_Controller {

    public function register(){

        if(isset($_POST['register'])){

            $this->form_validation->set_rules('firstName', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if($this->form_validation->run() == true){
                $data = array(
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'userType' => 'User'
                );
                $this->load->model('Auth_Model');
                $this->Auth_Model->insert_register($data);
                redirect('login');//If account created, go to login page
            }else{
                redirect('register');//If failed, go back to register page
            }
        }
    }

    public function login(){

        if(isset($_POST['login'])){

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if($this->form_validation->run() == true){
                $data = array(
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                );
                $this->load->model('Auth_Model');
                $this->Auth_Model->check_login($data);
                //redirect('login'); //If account created, go to login page
            }else{
                redirect('login'); //If failed, go back to login page
            }
        }
    }

}