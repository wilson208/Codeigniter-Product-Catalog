<?php

class Model_Review extends CI_Model{
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
        $this->db->insert('review', $data);
    }
    
    function deleteReview($id)
    {
        $this->db->delete(`review`, array('id' => $id));
    }
    
    function getReview($id)
    {
        return $this->db->query('SELECT * FROM `review` WHERE `productId` = ? ', array($id));
    }
    
    function getScore($id)
    {
        return $this->db->query('SELECT AVG(`score`) AS score FROM `review` WHERE `productId` = ? ', array($id));
    }  
}
?>