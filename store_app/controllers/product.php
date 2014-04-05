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
        $this->load->model('Model_Review');
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
            $data['productScore'] = $this->Model_Review->getScore($productId)->row()->score;
            
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
    
    function all($manufacturer = null, $category = null){
        $title = "Products";
        
        if($this->input->get('manufacturer') != FALSE){
            $manufacturer = $this->input->get('manufacturer');
        }
        if($manufacturer != null){
            $result = $this->manufacturer->getManufacturer($manufacturer);
            if($result->num_rows() > 0){
                $title = $result->row()->name;
            }
        }
        
        if($this->input->get('category') != FALSE){
            $category = $this->input->get('category');
        }
        if($category != null){
            $result = $this->category->getCategory($category);
            if($result->num_rows() > 0){
                $title = $result->row()->name;
            }
        }
        
        $data['products'] = $this->product->getProducts($manufacturer, $category);
        $data['title'] = $title;
        parent::loadPage('product/list', 'Products', $data);
        
    }
    
    function manufacturer(){
        if(is_numeric($this->uri->segment(2))){
            $this->all($this->uri->segment(2));
        }else{
            $this->all();
        }
    }
    function category(){
        if(is_numeric($this->uri->segment(2))){
            $this->all(null, $this->uri->segment(2));
        }else{
            $this->all();
        }
    }
    
    function addToCart(){
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity');
        
        $itemInCart = null;
        $cartItems = $this->cart->contents();
        foreach($cartItems as $item){
            if($item['id'] == $product_id){
                $itemInCart = $item;
            }
        }
        
        if($product_id != false && $quantity != false){
            if($itemInCart != null){
                $newQuantity = $itemInCart['qty'] + $quantity;
                $data = array(
                    'rowid' => $itemInCart['rowid'],
                    'qty' => $newQuantity
                );
                $this->cart->update($data);
            }else{
                $product = $this->product->getProduct($product_id);
                $product_special = $this->product->getProductSpecials($product_id);

                $data = array(
                   'id'      => $product->row()->id,
                   'qty'     => $quantity,
                   'price'   => $product->row()->price,
                   'name'    => $product->row()->name
                );

                if($product_special != null && $product_special->num_rows() > 0){
                    $data['price'] = $product_special->row()->price;
                }
                $this->cart->insert($data);
            }
        }
        redirect(base_url('product/' . $product_id), 'refresh');
    }
    
    function deleteFromCart(){
        $row_id = $this->input->get('rowid');
        $last_url = $_SERVER['HTTP_REFERER'];
        if($row_id != false){
            $this->cart->update(array('rowid' => $row_id, 'qty' => 0));
        }
        redirect($last_url, 'refresh');
    }
}
