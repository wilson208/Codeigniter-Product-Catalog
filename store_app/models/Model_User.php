<?php
class Model_User extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
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
        $sql = "SELECT * FROM `user` WHERE `id` = ? ;";
        return $this->db->query($sql, array($id));
    }
    
    function getUserAdmin($id){       
        $result = $this->db->query('SELECT * FROM user WHERE id = ? LIMIT 1', array($id));
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return null;
        }
    } 
    
    function getUsers(){        
        return $this->db->get('user');
    }
    
    function insertUser($data){
        $data['password'] = passwordHash($data['password']);
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    
    function updateUser($id, $data){
        $this->db->update('user', $data, array('id' => $id));
        if($this->db->affected_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    
    function newUser($id, $title, $forename, $surname, $email, $address1, $address2, $town, $postcode, $county, $country, $phone){
        $data = array(
            'id'    => $id,
            'title'    => $title,
            'forename'    => $forename,
            'surname'  => $surname,
            'email'     => $email,
            'address1'       => $address1,
            'address2'       => $address2,
            'town'       => $town,
            'postcode'       => $postcode,
            'county'       => $county,
            'country'       => $country,
            'phone' => $phone
        );
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    
    function setRandomPassword($email){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomPassword = '';
        for ($i = 0; $i < 8; $i++) {
            $randomPassword .= $characters[rand(0, strlen($characters))];
        }
        
        $this->db->update('user', array('password' => passwordHash($randomPassword)), array('email' => $email));
        if($this->db->affected_rows() > 0){
            return $randomPassword;
        }else{
            return null;
        }
    }
    
    function changeUser($id, $title, $forename, $surname, $email, $address1, $address2, $town, $postcode, $county, $country, $phone){
        $data = array(
            'id'    => $id,
            'title'    => $title,
            'forename'    => $forename,
            'surname'  => $surname,
            'email'     => $email,
            'address1'       => $address1,
            'address2'       => $address2,
            'town'       => $town,
            'postcode'       => $postcode,
            'county'       => $county,
            'country'       => $country,
            'phone' => $phone
        );
        $this->db->update('user', $data, array('id' => $id));
    }
    
    function deleteUser($id){
        $this->db->delete('user', array('id' => $id));
    }
    
    function getAll(){
        $this->db->order_by("order", "asc"); 
        $this->db->order_by('id', 'asc');
        return $this->db->get('user');
    }
}
