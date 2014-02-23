<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class account extends My_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->myAccount();
    }
    
    function register(){
        if($this->input->post('submit') == 'Register'){
            parent::loadPage('account/register', 'Register', $this->input->post());
        }else{
            parent::loadPage('account/register', 'Register');
        }
    }
    
    function login(){
        parent::loadPage('account/login', 'Login');  
    }
    
    function myAccount(){
        if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == true){
            parent::loadPage('account/myaccount', 'My Account');
        }else{
            $this->login();
        }
    }
    
    
    /**
     * FORM PROCESSORS
     */
    
    /**
     * Processor to process login activity
     */
    function processLogin(){
        $this->load->library('form_validation');
        $this->load->model('Model_User');
        
        $this->form_validation->set_rules('email', 'Username', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() != FALSE){//If form meets the rules set out above.   
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $encryptedPassword = hash("sha256", $password);
            
            $user_id = $this->Model_User->verifyLogin($email, $encryptedPassword); //Returns user_id if valid login. Else, returns false.
            if($user_id != false){
                $userdetails = $this->Model_User->getUser($user_id)->row();
                $data['id'] = $userdetails->id;
                $data['name'] = $userdetails->forename;
                $data['email'] = $userdetails->email;
                $data['logged_in'] = true;
                $this->session->set_userdata($data);
                redirect('home', 'refresh');
            }
        }
        //Only reached if the login failed.
        //Go back to login page, displaying the generic error message
        parent::loadPage('account/login', 'Login', $data['error'] = 'Invalid Email/Password Combination.'); 
    }
    
    function processLogout(){
        $this->session->userdata = array();
        session_start();
        $_SESSION = array(); 
        session_unset();
        session_destroy();
        parent::loadPage('account/logout_success', 'Logout Successful');        
    }
    
    function processRegistration(){
        
    }
    
}
