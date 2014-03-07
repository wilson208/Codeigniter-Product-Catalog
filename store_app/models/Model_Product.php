<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Product
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class Model_Product extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param array $data
     *      $data can contain:
     *          sku
     *          name
     *          description
     *          quantity
     *          image
     *          price
     */
    function insertProduct($data){
        if(!isset($data['sku'])){
            $data['sku'] = '';
        }
        
        if(!isset($data['name'])){
            $data['name'] = '';
        }
        
        if(!isset($data['description'])){
            $data['description'] = '';
        }
        
        if(!isset($data['quantity'])){
            $data['quantity'] = 0;
        }
        
        if(!isset($data['image'])){
            $data['image'] = '';
        }
        
        if(!isset($data['price'])){
            $data['price'] = 0;
        }
        
        $this->db->insert('product', $data);
    }
    
    /**
     * 
     * @param type $id
     * @param type $data
     */
    function updateProduct($id, $data){
        $this->db->update();
    }
    function deleteProduct($id){
        
    }
    function getProduct($id){
        return $this->db->get_where('product', array('id' => $id), 1, 0);
    }
    
    /**
     * 
     * @param int $manufacturer
     * @param int $category
     * @param int $status 1 for active, 0 for inactive
     * @return Products in form of Codeigniter Activ Result
     */
    function getProducts($manufacturer = null, $category = null, $status = 1){
        
        $this->db->where('status', $status);
        
        if($manufacturer != null){
            $this->db->where('manufacturer', $manufacturer);
        }
        
        if($category != null){
            $this->db->where('category', $category);
        }
        
        return $this->db->get('product');
    }
    
    function insertProductImage($productId, $url){
        
    }
    function editProductImage($id, $url){
        
    }
    function deleteProductImage($id){
        
    }
    function getProductImages($productId){
        return $this->db->get_where('product_image', array('product_id' => $productId));
    }
    
    /**
     * This method inserts a product special for a product.
     * 
     * @param int $productId
     * @param double $specialPrice 
     * @param timestamp $startDate (Optional)
     * @param timestamp $stopDate (Optional)
     * @return int id of inserted product special
     */
    function insertProductSpecial($productId, $specialPrice, $startDate = null, $stopDate = null){
        return 1;
    }
    
    
    function editProductSpecial($id, $specialPrice, $startDate = null, $stopDate = null){
        
    }
    function deleteProductSpecial($id){
        
    }
    
    /**
     * This method inserts review for a product
     * 
     * @param int $productId
     * @param int $rating between 1 and 5
     * @param string $review (optional)
     * @param string $name (optional)
     * 
     * @return null On Fail return null
     * @return int Return the inserted id
     */
    function insertProductReview($productId, $rating, $review="", $name="Anonymous"){
        
    }
    
    /**
     * This method updates review for a product
     * 
     * @param int $id The id of the product review
     * @param int $rating between 1 and 5
     * @param string $review (optional)
     * @param string $name (optional)
     * 
     * @return boolean true on success, false on fail.
     */
    function editProductReview($id, $rating, $review="", $name="Anonymous"){
        
    }
    
    /**
     * This method deletes a review of a product
     * 
     * @param type $id
     * @return boolean true on success, false on fail.
     */
    function deleteProductReview($id){
        
    }
}
