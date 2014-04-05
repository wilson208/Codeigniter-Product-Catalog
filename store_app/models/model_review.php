<?php

class model_review extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function addReview($name,$review,$productId,$score)
    {
        $data = array
            (
            'name' => $name,
            'review'    => $review ,
            'productId'   => $productId,
            'score'     => $score
            );
        $this->db->insert('product_review', $data);
    }
    
    function deleteReview($id)
    {
        $this->db->delete('product_review', array('id' => $id));
    }

    function deleteAllProductReviews($product_id){
        $this->db->delete('product_review', array('product_id' => $product_id));
    }
    function getReview($id)
    {
        return $this->db->query('SELECT * FROM `product_review` WHERE `productId` = ? ', array($id));
    }
    
    function getScore($id)
    {
        return $this->db->query('SELECT AVG(`score`) AS score FROM `product_review` WHERE `productId` = ? ', array($id));
    }  
}
?>