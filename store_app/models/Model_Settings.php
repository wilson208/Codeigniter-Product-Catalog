<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Settings
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class Model_Settings extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function getSettings(){
        return $this->db->query('SELECT * FROM setting');
    }
    function getSetting($setting){
        return $this->db->query('SELECT * FROM setting WHERE `setting` = ?', $setting)->row();
    }
    
    function setSettings($settings){
        foreach ($settings as $setting => $value) {
            $this->setSetting($setting, $value);
        }
    }
    function setSetting($setting, $value){
        $sql = "insert into `setting` (`setting`, `value`) values(?, ?) on duplicate key update value=?;";
        
        $data = array('value' => $value);
        $this->db->query($sql, array($setting, $value, $value));
    }
}
