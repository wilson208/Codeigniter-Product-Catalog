<?php
class Model_Gallery extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function insertGallery($title, $image, $order){
        $data = array(
            'title' => $title,
            'image' => $image,
            'order' => $order
        );
        $this->db->insert('gallery', $data);
        return $this->db->insert_id();
    }
    
    function editGallery($id, $title, $image, $order){
        $data = array(
            'title' => $title,
            'image' => $image,
            'order' => $order
        );
        $this->db->where('id', $id);
        $this->db->update('gallery', $data);
    }
    
    function deleteGallery($id){
        $this->db->delete('gallery', array('id' => $id)); 
    }
    
    function getAll(){
        $this->db->order_by("order", "asc"); 
        $this->db->order_by('id', 'asc');
        return $this->db->get('gallery');
    }
}
