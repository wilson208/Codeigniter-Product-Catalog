<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class contact extends My_Controller {
    function __construct() {
        parent::__construct(true);
    }
    function index(){
        parent::loadPage('contact/form');
    }
    
    function process(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[40]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', '');
        $this->form_validation->set_rules('phone', 'Phone', 'max_length[20]');
        $this->form_validation->set_rules('enquiry', 'Enquiry', 'required|min_length[10]|max_length[300]');
        
        if ($this->form_validation->run() == FALSE){
            parent::loadPage('contact/form', 'Contact Us');
	}else{
            redirect('contact/success', 'refresh');
	}

    }
    
    function success(){
            parent::loadPage('contact/success');
    }
    
    function failure(){
            parent::loadPage('contact/failure');
    }
}
