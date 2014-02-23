<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class product extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Product');
    }
    
    function index(){
        $this->load->view('admin/common/header');
        /*$this->load->view('admin/product');
        $this->load->view('admin/common/footer');*/
        
        $data = array(
            'sku' => 'BCD234',
            'name' => 'Product 2',
            'description' => 'This is the description',
            'quantity' => 5,
            'image' => 'product/tv/image2.png',
            'price' => 4.5
        );
        
        $this->Model_Product->insertProduct($data);
    }
    
    function saveProduct(){
        
    }
    
    function newProduct(){
        
        $this->Product_Model->insertProduct();
    }
    
    function deleteProduct(){
        
    }
}
