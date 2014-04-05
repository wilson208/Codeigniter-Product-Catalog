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
    
    function editDetails($data = array()){
        if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == true){
            $data['user']= $this->Model_User->getUser($this->session->userdata['id'])->row();
            parent::loadPage('account/edit_details', 'Edit Details',$data);
           
        }else{
            $this->login();
        }
        
    }     
    
    function editPassword($data = array()){
        if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == true){
            parent::loadPage('account/edit_password', 'Edit Password', $data);
        }else{
            $this->login();
        }
    }
    
    function login($data = array()){
        parent::loadPage('account/login', 'Login', $data);  
    }
    
    function forgotPassword($data = array()){
        parent::loadPage('account/forgotpassword', "Password Reset", $data);
    }
    
    function orders(){
        $this->load->model('model_order');
        $data['orders'] = $this->model_order->getOrders($this->session->userdata['id']);
        parent::loadPage('account/orders', 'Order History', $data);
    }
    
    function order(){
        $id = $this->uri->segment(3);
        if(!$id){
            $id = $this->uri->segment(2);
        }
         
        $this->load->model('model_order');

        $data['order'] = $this->model_order->getOrder($id);

        if($data['order']->num_rows == 1){
            $data['order'] = $data['order']->row();
            $data['products'] = $this->model_order->getOrderProducts($id);
            $data['total'] = $this->model_order->getOrderTotal($id);
            parent::loadPage('account/order', 'Order: ' . $data['order']->id, $data);
        }else{
            $this->orders();
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
            
            $user_id = $this->Model_User->verifyLogin($email, passwordHash($password)); //Returns user_id if valid login. Else, returns false.
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
        $this->login($data);
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
    
    function processEditDetails(){
        
        $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean|max_length[5]');
	$this->form_validation->set_rules('forename', 'Forename', 'trim|xss_clean|max_length[15]');
	$this->form_validation->set_rules('surname', 'Surname', 'trim|xss_clean|max_length[15]');
	$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|max_length[50]|valid_email');
	$this->form_validation->set_rules('address1', 'Address 1', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('town', 'Town', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('postcode', 'Postcode', 'xss_clean|max_length[8]');
	$this->form_validation->set_rules('county', 'County', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('country', 'Country', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|max_length[16]');
        
        if ($this->form_validation->run() != FALSE){          
                
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
                
                if($this->input->post('newsletter') == 0){
                    $data['newsletter'] = 0;
                }else{
                    $data['newsletter'] = 1;
                }
                
                if($this->Model_User->updateUser($this->session->userdata['id'],$data)){
                    $data['message'] = 'Updated Successfully';
                }else{
                    $data['message'] = 'NOT Updated!';
                }
                
            }else{
                $data['message'] = 'NOT Updated!';
            }             
            $this->editDetails($data);
        }      
     
    function processEditPassword(){
        var_dump($this->input->post());
        $this->form_validation->set_rules('oldPassword', 'Password Old', 'required|xss_clean');
	$this->form_validation->set_rules('newPassword', 'Password New', 'required|min_length[8]');
        $this->form_validation->set_rules('confirmPassword', 'Password Confirm', 'required|matches[newPassword]');
        $data = array();
        if ($this->form_validation->run() != FALSE){//If form meets the rules set out above. 
            $email = $this->session->userdata['email'];
            $password = $this->input->post('oldPassword');
            echo $email . '  ' . $password;
            $user_id = $this->Model_User->verifyLogin($email, passwordHash($password)); //Returns user_id if valid login. Else, returns false.
            
            if($user_id != false){    
                $data = array('password' => passwordHash($this->input->post('newPassword')));
                if($this->Model_User->updateUser($user_id, $data)){
                    $data['message'] = 'Password Updated Successfully!';
                }else{
                    $data['error'] = 'Unknown Error Updating.';
                } 
            }else{
                $data['error'] = 'Old Password Incorrect!';
            }
        }
        else
        {
            $data['error'] = validation_errors();
        }
        
        $this->editPassword($data);
        
    }
    
    function processForgotPassword(){
        $email = $this->input->post('emailAddress');
        $data = array();
        
        if($email){
            $this->load->model('model_email');
            $newPassword = $this->Model_User->setRandomPassword($email);
            
            if($newPassword!= null){
                $message = "Your password has been reset for our online store. Please login and set your password to a password of your choice asap. Your new random password is: $newPassword";
                $this->model_email->sendEmail($email, 'Password Reset', $message);
            }
            
            $data['message'] = 'Email Has Been Sent To Specified Email, if it is a valid email of an account.';
        }else{
            $data['error'] = 'You must enter a valid email address in the field.';
        }
        
        $this->forgotPassword($data);
    }
    
    function logoutSuccess(){
        parent::loadPage('account/logout_success', 'Logout Successful'); 
    }
    
    function loginSuccess(){
        parent::loadPage('account/login_success', 'Login Successful'); 
    }
    
  
}
