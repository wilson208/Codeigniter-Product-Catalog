<?php
class Model_User extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function verifyLogin($email, $password){
        $result = $this->db->query('SELECT * FROM `user` WHERE LOWER(`email`) = LOWER(?) AND `password` = ?', array($email, $password));
        if($result->num_rows > 0){
            return $result->row()->id;
        }else{
            return false;
        }
    }
    
    function getUser($id){
        return $this->db->query('SELECT * FROM `user` WHERE `id` = ?;', array($id));
    }
    
}
