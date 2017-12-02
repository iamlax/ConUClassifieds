<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-27
 * Time: 4:26 AM
 */

class Auth_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function register()
    {

        if (isset($_POST['register'])) {

            $this->form_validation->set_rules('firstName', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[User.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == true) {
                $data = array(
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'userType' => 'User'
                );
                $this->session->set_flashdata('success', 'Account has been created, you can now login.');
                $this->auth_model->insert_register($data);
                $this->load->view('components/header');
                $this->load->view('pages/login');
                $this->load->view('components/footer');
            } else {
                $this->load->view('components/header');
                $this->load->view('pages/register');
                $this->load->view('components/footer');
                //If failed, go back to register page, verified by validation
            }
        }
    }

    public function login()
    {

        if (isset($_POST['login'])) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == true) {
                $data = array(
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                );
                $result = $this->auth_model->check_login($data);
                if ($result == false) {
                    $this->session->set_flashdata('error', 'Wrong email or password, please try again.');
                    $this->load->view('components/header');
                    $this->load->view('pages/login');
                    $this->load->view('components/footer');
                    //if password is incorrect, redirect to login, verified by model.
                } else {
                    foreach ($result as $key => $value) {
                        $this->session->set_userdata($key, $value);
                    }
                    $this->session->set_flashdata('success', 'Successfully login.');
                    redirect('locations/index');
                }
            } else {
                $this->load->view('components/header');
                $this->load->view('pages/login');
                $this->load->view('components/footer');
                //If invalid input, go back to login page-> verified by validation
            }
        }
    }

    public function viewProfile(){
        $id = $this->session->userdata('membPlanId');
        $userId = $this->session->userdata('userId');
        //$this->load->model('Advertisement_Model');
        $data = $this->auth_model->getPlan($id);
        //$data2 = $this->Advertisement_Model->get_ads_by_user($userId);
        $data['userId'] = $userId;
        $this->load->view('components/header');
        $this->load->view('pages/profile', $data);
        $this->load->view('components/footer');
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Successfully logout.');
        redirect('home');
    }
}