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
        return $this->db->query('SELECT * FROM `category` WHERE `id` = ? LIMIT 1', array($id));
    }
    
    function getCategories(){
        return $this->db->query('SELECT * FROM `category` ORDER BY `order` ASC');
    }
    
    function getTopLevel(){
        return $this->db->query('SELECT * FROM `category` WHERE `parent` = 0 ORDER BY `order` ASC');
    }
    
    function getChildren($parent_id){
        return $this->db->query('SELECT * FROM `category` WHERE `parent` = ? ORDER BY `order` ASC', array($parent_id));
    }
}
