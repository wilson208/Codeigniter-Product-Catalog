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
    function __construct() {
        parent::__construct();
    }
    function loadPage($view, $title = 'Online Store', $data = array()){
        $this->load->model('Model_Category', 'category');
        $this->load->model('Model_Manufacturer', 'manufacturer');
        
        $headData['categories'] = $this->category->getTopLevel();
        $headData['manufacturers'] = $this->manufacturer->getManufacturers();
        $headData['title']      = $title;
        
        $this->load->view('common/header', $headData);
        $this->load->view($view, $data);
        $this->load->view('common/footer');
    }
}
