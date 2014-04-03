<?php

class Model_Blog extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function addReview($review,$user_id,$date,$score)
    {
        $data = array
            (
            'review'    => $review ,
            'user_id'   => $user_id,
            'date'      => $date,
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
        return $this->db->query('SELECT * FROM `review` WHERE `id` = ? LIMIT 1', array($id));
    }
}
?>