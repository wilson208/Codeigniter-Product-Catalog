<?php
class model_settings extends CI_Model{
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
