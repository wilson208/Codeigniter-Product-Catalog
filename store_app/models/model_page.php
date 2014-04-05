<?php

class model_page extends CI_Model{
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
    
    function getPages(){
        return $this->db->get('page');
    }
    
    function getMenuPages(){
        return $this->db->query('SELECT `menu_title`, `url` FROM `page` WHERE `show_in_menu` = 1'); 
    }
    
    function insertPage($page_title, $menu_title, $show_in_menu, $content, $css, $url){
        $data = array(
            'page_title'    => $page_title,
            'menu_title'    => $menu_title,
            'show_in_menu'  => $show_in_menu,
            'content'       => $content,
            'css'           => $css,
            'url'           => $url
        );
        $this->db->insert('page', $data);
        return $this->db->insert_id();
    }
    
    function updatePage($id, $page_title, $menu_title, $show_in_menu, $content, $css, $url){
        $data = array(
            'page_title'    => $page_title,
            'menu_title'    => $menu_title,
            'show_in_menu'  => $show_in_menu,
            'content'       => $content,
            'css'           => $css,
            'url'           => $url
        );
        $this->db->update('page', $data, array('id' => $id));
    }
    
    function deletePage($id){
        $this->db->delete('page', array('id' => $id));
    }
}
