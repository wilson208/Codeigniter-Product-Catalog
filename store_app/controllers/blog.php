<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blog
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class blog extends My_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Blog');
    }

    function index(){
        $this->all();
    }
    
    function all(){
        $data['blogs'] = $this->Model_Blog->getBlogs(true, 20);
        parent::loadPage('blog/list', 'Blog', $data);
    }
    
    function single(){
        $blog_id = -1;
        if($this->input->get('blog_id')){
            $blog_id = $this->input->get('blog_id');
        }else if(is_numeric($this->uri->segment(2))){
            $blog_id = $this->uri->segment(2);
        }else if(is_string($this->uri->segment(2)) && strlen($this->uri->segment(2)) > 0){
            $blog_id = $this->Model_Blog->getBlogId($this->uri->segment(2));
        }
        
        $data['blog'] = $this->Model_Blog->getBlog($blog_id);
        if($data['blog'] != null){
            parent::loadPage('blog/single', 'Blog', $data);
        }else{
            redirect('blog', 'refresh');
        }
        
    }
}
