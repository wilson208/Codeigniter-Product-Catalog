<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Blog
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class Model_Blog extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function newBlog($title, $blog, $user_id, $status = 0){
        $data = array(
            'title'     => $title,
            'blog'      => $blog,
            'user_id'   => $user_id,
            'status'    => $status
         );

        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }
    
    function editBlog($id, $title, $blog, $user_id, $status = 0){
        $data = array(
            'title'     => $title ,
            'blog'      => $blog ,
            'user_id'   => $user_id,
            'status'    => $status
         );
        $this->db->where('id', $id);
        $this->db->update('blog', $data);
    }
    
    function deleteBlog($id){
        $this->db->delete(`blog`, array('id' => $id));
    }
    
    function getBlog($id){
        $result = $this->db->query('SELECT * FROM `blog` WHERE `id` = ? LIMIT 1', array($id));
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return null;
        }
    }
    
    function getBlogId($seo_url){
        $this->db->where('seo_url', $seo_url);
        $result = $this->db->get('blog');
        if($result->num_rows() > 0){
            return $result->row()->id;
        }else{
            return -1;
        }
    }
    
    function getBlogs($searchQuery = '', $status = false){
        if($status == false){
            $status = 0;
        }else{
            $status = 1;
        }
        
        $result =  $this->db->query('SELECT * FROM `blog` WHERE `status` = ? AND LOWER(`title`) LIKE LOWER(?) OR LOWER(`blog`) LIKE LOWER(?)', array($status, "%$searchQuery%", "%$searchQuery%"));
        return $result;
    }
    
}
