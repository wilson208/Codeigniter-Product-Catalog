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
        $this->load->library('form_validation');
        $this->load->model('Model_User');
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
        
        $this->form_validation->set_rules('email', 'Username', 'required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        
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
                $data['admin'] = $userdetails->admin;
                $data['logged_in'] = true;
                $this->session->set_userdata($data);
                redirect('account/loginSuccess', 'refresh');
            }
        }
        //Only reached if the login failed.
        //Go back to login page, displaying the generic error message
        $data['error'] = 'Invalid Email/Password Combination.';
        parent::loadPage('account/login', 'Login', $data); 
    }
    
    function processLogout(){
        //Destroy session
        session_start();
        $this->session->userdata = null;
        $this->session->sess_destroy();
        
        //Have to clear cache because even when logged out the browser is pulling a cached, logged in page.
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        redirect('account/logoutSuccess', 'refresh');
    }
    
    function processRegistration(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|max_length[5]');
	$this->form_validation->set_rules('forename', 'Forename', 'trim|required|xss_clean|max_length[15]');
	$this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean|max_length[15]');
	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|max_length[50]|valid_email|is_unique[user.email]');
	$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[passwordconfirm]');
	$this->form_validation->set_rules('passwordconfirm', 'Password Confirm', 'required');
	$this->form_validation->set_rules('address1', 'Address 1', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('town', 'Town', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('postcode', 'Postcode', 'required|xss_clean|max_length[8]');
	$this->form_validation->set_rules('county', 'County', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|max_length[16]');
	$this->form_validation->set_rules('agree', 'Agree', 'trim|required');
        
        if ($this->form_validation->run() != FALSE){
            if($this->input->post('agree') != false){
                
                $data = array(
                    'title'     => $this->input->post('title'),
                    'forename'  => $this->input->post('forename'),
                    'surname'   => $this->input->post('surname'),
                    'email'     => $this->input->post('email'),
                    'password'  => $this->input->post('password'),
                    'address1'  => $this->input->post('address1'),
                    'address2'  => $this->input->post('address2'),
                    'town'      => $this->input->post('town'),
                    'postcode'  => $this->input->post('postcode'),
                    'county'    => $this->input->post('county'),
                    'phone'     => $this->input->post('phone')
                );
                
                if($this->input->post('newsletter') == 0){
                    $data['newsletter'] = 0;
                }else{
                    $data['newsletter'] = 1;
                }
                
                $id = $this->Model_User->insertUser($data);
                if(is_numeric($id) && $id > 0){
                    
                    parent::loadPage("account/registration-success");
                }else{
                    parent::loadPage("account/registration-failure");
                }
            }else{
                parent::loadPage('account/register', 'Register', $this->input->post());
            }
        }else{
            parent::loadPage('account/register', 'Register', $this->input->post());
        }
        
    }
    
    
    //Success Pages
    
    function logoutSuccess(){
        parent::loadPage('account/logout_success', 'Logout Successful'); 
    }
    
    function loginSuccess(){
        parent::loadPage('account/login_success', 'Login Successful'); 
    }
    
    function editDetails(){
        if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == true){
            $data['user']= $this->Model_User->getUser($this->session->userdata['id']);
            parent::loadPage('account/edit_details', 'Edit Details',$data);
           
        }else{
            $this->login();
        }
    }
        
    function processEditDetails(){
        
        $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean|max_length[5]');
	$this->form_validation->set_rules('forename', 'Forename', 'trim|xss_clean|max_length[15]');
	$this->form_validation->set_rules('surname', 'Surname', 'trim|xss_clean|max_length[15]');
	$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|max_length[50]|valid_email|is_unique[user.email]');
	$this->form_validation->set_rules('address1', 'Address 1', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('town', 'Town', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('postcode', 'Postcode', 'xss_clean|max_length[8]');
	$this->form_validation->set_rules('county', 'County', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('country', 'Country', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|max_length[16]');
	$this->form_validation->set_rules('agree', 'Agree', 'trim|required');
        
        if ($this->form_validation->run() != FALSE){
            if($this->input->post('agree') != false){
                
                $data = array(
                    'title'     => $this->input->post('title'),
                    'forename'  => $this->input->post('forename'),
                    'surname'   => $this->input->post('surname'),
                    'email'     => $this->input->post('email'),
                    'address1'  => $this->input->post('address1'),
                    'address2'  => $this->input->post('address2'),
                    'town'      => $this->input->post('town'),
                    'postcode'  => $this->input->post('postcode'),
                    'county'    => $this->input->post('county'),
                    'phone'     => $this->input->post('phone')
                );
            }else{
                parent::loadPage('account/edit_details', 'Edit Details',$data);
            }
        }else{
            parent::loadPage('account/edit_details', 'Edit Details',$data);
        }       
    }
}
