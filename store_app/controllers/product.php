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
class product extends My_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Product', 'product');
        $this->load->model('Model_Manufacturer', 'manufacturer');
        $this->load->model('Model_Category', 'category');
    }
    
    function index(){
        $this->single();
    }
    
    function single(){
        if($this->uri->segment(2) > 0){
            
            $productId = $this->uri->segment(2);
            
            $data['product'] = $this->product->getProduct($productId);
            $data['productImages'] = $this->product->getProductImages($productId);
            $data['productManufacturer'] = $this->manufacturer->getManufacturer($data['product']->row()->manufacturer);
            $data['productCategory'] = $this->category->getCategory($data['product']->row()->category);
            
            $title = '';
            if($data['product']->num_rows() > 0){
                $title = $data['product']->row()->name;
            }else{
                $title = 'Product Not Found!';
            }
            parent::loadPage('product/single', $title, $data);
            
        }else{
            $this->all();
        }
    }
    
    function all(){
        $manufacturer = null;
        $category = null;
        $title = "Products";
        
        if($this->input->get('manufacturer') != FALSE){
            $manufacturer = $this->input->get('manufacturer');
            $result = $this->manufacturer->getManufacturer($manufacturer);
            if($result->num_rows() > 0){
                $title = $result->row()->name;
            }
        }
        
        if($this->input->get('category') != FALSE){
            $category = $this->input->get('category');
            $result = $this->category->getCategory($category);
            if($result->num_rows() > 0){
                $title = $result->row()->name;
            }
        }
        
        $data['products'] = $this->product->getProducts($manufacturer, $category);
        $data['title'] = $title;
        parent::loadPage('product/list', 'Products', $data);
        
    }
}
