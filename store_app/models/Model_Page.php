<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Page
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class Model_Page extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function getPage($url){
        $result = $this->db->query('SELECT * FROM `page` WHERE `url` = ? OR `id` = ? LIMIT 1', array($url, $url));
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return null;
        }
    }
    
    function getMenuPages(){
        return $this->db->query('SELECT `menu_title`, `url` FROM `page` WHERE `show_in_menu` = 1'); 
    }
}
