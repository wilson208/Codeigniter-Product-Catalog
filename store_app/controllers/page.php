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
class page extends My_Controller{
    
    public function __construct() {
        parent::__construct();        
    }
    
    public function index() {
        $url = $this->uri->segment(2);
        if(!$url){
            $url = $this->uri->segment(1);
        }
        if($url == FALSE){
            redirect('home', 'refresh');
        }else{
            $this->load->model('Model_Page');
            $page = $this->Model_Page->getPage($url);
            
            if($page != null){
                $data['page'] = $page;
                parent::loadPage('page', $page->page_title, $data);   
            }else{
                show_404($url);
            }    
        }
        
        
    }
}
