<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My_Controller
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class My_Controller extends CI_Controller{
    private $fullWidth;
    function __construct($fullWidth = false) {
        parent::__construct();
        $this->fullWidth = $fullWidth;
    }
    function loadPage($view, $title = 'Online Store', $data = array()){
        $this->load->model('Model_Category', 'category');
        $this->load->model('Model_Manufacturer', 'manufacturer');
        
        $headData['categories']     = $this->category->getTopLevel();
        $headData['manufacturers']  = $this->manufacturer->getManufacturers();
        $headData['title']          = $title;
        $headData['fullWidth']      = $this->fullWidth;
        
        $this->load->view('common/header', $headData);
        $this->load->view($view, $data);
        $this->load->view('common/footer');
    }
    
    function loadAdmin($view, $data = array()){
        session_start();
        
        if(isset($this->session->userdata['admin']) && $this->session->userdata['admin'] == 1){
            $this->load->view('admin/common/header');
            $this->load->view('admin/' . $view, $data);
            $this->load->view('admin/common/footer');
        }else{
            redirect('account/login', 'refresh');
        }
    }
}
