<?php
class emailTaken extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function index(){
        $result = $this->db->query('SELECT * FROM `user` WHERE LOWER(`email`) = LOWER(?);', array($this->input->get('email')));
        if($result->num_rows == 0){
            echo json_encode(array('taken' => 0));
        }else{
            echo json_encode(array('taken' => 1));
        }
    }
}
