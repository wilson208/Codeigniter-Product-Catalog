<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Manufacturer
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class Model_Manufacturer extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function addManufacturer($name, $phone, $email, $logo){
        $data = array(
            'name'     => $title ,
            'phone'      => $blog ,
            'email'   => $user_id,
            'logo'    => $status
         );

        $this->db->insert('manufacturer', $data);
    }
    
    function editManufacturer($id, $name, $phone, $email, $logo){
        $data = array(
            'name'     => $title ,
            'phone'      => $blog ,
            'email'   => $user_id,
            'logo'    => $status
         );
        $this->db->where('id', $id);
        $this->db->update(`manufacturer`, $data);
    }
    
    function deleteManufacturer($id){
        $this->db->delete(`manufacturer`, array('id' => $id));
    }
    
    function getManufacturer($id){
        return $this->db->query('SELECT * FROM `manufacturer` WHERE `id` = ? LIMIT 1;', array($id));
    }
    
    function getManufacturers(){
        return $this->db->query('SELECT * FROM `manufacturer` ORDER BY `name` ASC;');
    }
}
