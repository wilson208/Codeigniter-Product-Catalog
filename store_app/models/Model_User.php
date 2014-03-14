<?php
class Model_User extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param type $email
     * @param type $password
     * @return false on no login
     * @return int id of user logged in
     */
    function verifyLogin($email, $password){
        $result = $this->db->query('SELECT * FROM `user` WHERE LOWER(`email`) = LOWER(?) AND `password` = ?', array($email, $password));
        if($result->num_rows > 0){
            return $result->row()->id;
        }else{
            return false;
        }
    }
    
    function getUser($id){
        $this->db->where('id', $id);
        return $this->db->get('user');
    }
    
    function insertUser($data){
        $data['password'] = hash("sha256", $data['password']);
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    
    function updateUser($id, $data){
        $this->db->update('user', $data, array('id' => $id));
    }
    
}
