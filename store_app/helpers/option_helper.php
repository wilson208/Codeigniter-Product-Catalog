<?php

function getOption($option, $default = null){
    $result = $this->db->query('SELECT * FROM `option` WHERE `option` = ? LIMIT 1;', array($option));
    if($result->num_rows > 0){
        return $result->row()->option;
    }else{
        return $default;
    }
}