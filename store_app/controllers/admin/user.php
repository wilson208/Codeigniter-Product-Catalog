<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author Wilson
 */
class user extends My_Controller{
        
    function __construct() {
        parent::__construct();
        $this->load->model('Model_User', 'user');
    }
    
    function index($data = array()){
        $this -> all($data);
    }
    
    function all($data = array()){
        $data['user'] = $this->user->getUsers();
        parent::loadAdmin('user/all', $data);
    }
    
    function single($data = array(), $id = null){
        if($id == null){
            $id = $this->input->get('id');
        }
        
        if(is_numeric($id)){
            $data['user'] = $this->user->getUserAdmin($id);
            parent::loadAdmin('user/single', $data); 
        }else{
            redirect(admin_url('user'));
        }
    }
    
    function add(){
        $id = $this->user->newUser('id', 'Title', 'Forename', 'Surname', 'Email', 'Address 1', 'Address 2', 'Town', 'Postcode', 'County', 'Country', 'Phone', 'newsletter', 'admin');
        redirect(admin_url('user/single?id=' . $id), 'refresh');
    }
    
    function save(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|max_length[5]');
	$this->form_validation->set_rules('forename', 'Forename', 'trim|required|xss_clean|max_length[15]');
	$this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean|max_length[15]');
	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|max_length[50]|valid_email');
	$this->form_validation->set_rules('address1', 'Address 1', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[40]');
	$this->form_validation->set_rules('town', 'Town', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('postcode', 'Postcode', 'required|xss_clean|max_length[8]');
	$this->form_validation->set_rules('county', 'County', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean|max_length[40]');
	$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|max_length[16]');
        $this->form_validation->set_rules('admin', 'Admin', 'trim|required|xss_clean|max_length[1]');
        $this->form_validation->set_rules('newsletter', 'Newsletter', 'trim|required|xss_clean|max_length[1]');


        $id = $this->input->post('id');
        if ($this->form_validation->run() != FALSE){
            $id        = $this->input->post('id');
            $title     = $this->input->post('title');
            $forename  = $this->input->post('forename');
            $surname   = $this->input->post('surname');
            $email     = $this->input->post('email');
            $address1  = $this->input->post('address1');
            $address2  = $this->input->post('address2');
            $town      = $this->input->post('town');
            $postcode  = $this->input->post('postcode');
            $county    = $this->input->post('county');
            $country   = $this->input->post('country');
            $phone     = $this->input->post('phone');
            $admin     = $this->input->post('admin');
            $newsletter= $this->input->post('newsletter');
            
            $this->user->changeUser($id, $title, $forename, $surname, $email, $address1, $address2, $town, $postcode, $county, $country, $phone, $newsletter, $admin);
            redirect(admin_url('user/single?id=') . $id, 'refresh');
	}else{
            $this->single(array(), $id);
	}
        }
    
    function delete(){
        $id = $this->input->get('id');
        
        if(is_numeric($id)){
            $data['user'] = $this->user->deleteUser($id);
        }
            
        redirect(admin_url('user'));
        
    }
}

