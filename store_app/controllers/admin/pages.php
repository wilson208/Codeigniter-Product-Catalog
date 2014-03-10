<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class pages extends My_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Page', 'page');
    }
    
    function index($data = array()){
        $this->all($data);
    }
    
    function all($data = array()){
        $data['pages'] = $this->page->getPages();
        parent::loadAdmin('pages/all', $data);
    }
    
    function single($data = array(), $id = null){
        if($id == null){
            $id = $this->input->get('id');
        }
        
        if(is_numeric($id)){
            $data['page'] = $this->page->getPage($id);
            parent::loadAdmin('pages/single', $data); 
        }else{
            redirect(admin_url('pages'));
        }
    }
    
    function add(){
        $id = $this->page->insertPage('New Page', 'New Page', 0, '','', 'new_page');
        redirect(admin_url('pages/single?id=' . $id), 'refresh');
    }
    
    function save(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('page_title', 'Page Title', 'required|min_length[3]|xss_clean');
	$this->form_validation->set_rules('content', 'Content', 'required|min_length[3]');
	$this->form_validation->set_rules('url', 'URL', 'required|min_length[3]|alpha_dash');
        
        $id = $this->input->post('id');
        if ($this->form_validation->run() != FALSE){
            $page_title     = $this->input->post('page_title');
            $menu_title     = $this->input->post('menu_title');
            $show_in_menu   = $this->input->post('show_in_menu');
            $url            = $this->input->post('url');
            $css            = $this->input->post('css');
            $content        = $this->input->post('content');
            
            $this->page->updatePage($id, $page_title, $menu_title, $show_in_menu, $content, $css, $url);
            redirect(admin_url('pages/single?id=') . $id, 'refresh');
	}else{
            $this->single(array(), $id);
	}
    }
    
    function delete(){
        $id = $this->input->get('id');
        
        if(is_numeric($id)){
            $data['page'] = $this->page->deletePage($id);
        }
            
        redirect(admin_url('pages'));
        
    }
}
