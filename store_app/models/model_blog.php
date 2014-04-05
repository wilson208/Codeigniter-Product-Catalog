<?php
class model_blog extends CI_Model{
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
        $this->db->delete('blog', array('id' => $id));
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
    
    function getBlogs($getEnabled = true, $limit = 20){
        
        if($getEnabled){
            $this->db->where(array('status' => 1));
        }
        
        return $this->db->get('blog', $limit, 0);
    }
    
}
