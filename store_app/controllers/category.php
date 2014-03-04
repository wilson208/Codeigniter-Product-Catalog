<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class category extends My_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $category_id = $this->uri->segment(2);
        if($category_id == FALSE){
            redirect('home', 'refresh');
        }else{
            $this->load->model('Model_Category');
            $category = $this->Model_Category->getCategory($category_id);
            $data['category'] = $category;
            
            
            
            
            parent::loadPage('category', $category->row()->name, $data);   
        }
    }
}
