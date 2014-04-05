<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Category
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class Model_Category extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function getCategory($id){
        $this->db->where(array('id' => $id));
        return $this->db->get('category');
    }
    
    function getCategories(){
        return $this->db->query('SELECT * FROM `category` ORDER BY `order` ASC, `name` DESC');
    }
    
    function addCategory($name, $order = 0){
        $data = array(
            'name' => $name,
            'order' => $order
            );
        
        $this->db->insert('category', $data);
        return $this->db->insert_id();
    }
    
    function deleteCategory($id){
        $this->db->delete('category', array('id' => $id));
    }
    
    function updateCategory($id, $name, $order = 0){
        $data = array(
            'name' => $name,
            'order' => $order
            );
        
            $this->db->update('category', $data, array('id' => $id));
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
    }
}
