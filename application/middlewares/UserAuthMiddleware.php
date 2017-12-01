<?php
class UserAuthMiddleware {
    protected $controller;
    protected $ci;
    
    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;
    }
    
    public function run(){
        $userId = $this->ci->session->userdata('userId');
        if ($userId == NULL) {
            show_error('You are not allowed to perform this operation or go to this page.');
        }
    }
}