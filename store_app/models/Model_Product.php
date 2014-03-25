<?php
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
        $this->db->update('product', $data, array('id' => $id));
    }
    function deleteProduct($id){
        $this->db->delete('product', array('id' => $id));
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
    
    
    
    
    function insertProductImage($productId, $url, $order, $description){
        $data = array(
            'product_id'    => $productId,
            'url'           => $url,
            'order'         => $order,
            'description'   => $description
        );
        
        $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }
    function editProductImage($id, $productId, $url, $order, $description){
        $data = array(
            'product_id'    => $productId,
            'url'           => $url,
            'order'         => $order,
            'description'   => $description
        );
        $this->db->update('product_image', $data, array('id' => $id));
    }
    function deleteProductImage($id){
        $this->db->delete('product_image', array('id' => $id));
    }
    function deleteAllProductImages($product_id){
        $this->db->delete('product_image', array('product_id' => $product_id));
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
        
    }
    function editProductSpecial($id, $specialPrice, $startDate = null, $stopDate = null){
        
    }
    function deleteProductSpecial($id){
        
    }
    function deleteAllProductSpecials($product_id){
        
    }
    function getProductSpecials($product_id){
        
    }
    
    
    function insertProductReview($productId, $rating, $review="", $name="Anonymous"){
        
    }
    function editProductReview($id, $rating, $review="", $name="Anonymous"){
        
    }
    function deleteProductReview($id){
        
    }
    function deleteAllProductReviews($product_id){
        
    }
    function getProductReviews($product_id){
        
    }
}
