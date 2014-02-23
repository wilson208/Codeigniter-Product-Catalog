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
        if($this->input->get('search') != false){
            $data['blogs'] = $this->Model_Blog->getBlogs($this->input->get('search'));
        }else{
            $data['blogs'] = $this->Model_Blog->getBlogs();
        }
        parent::loadPage('blog/list', 'Blog', $data);
    }
    
    function single(){
        if($this->input->get('blog_id') == false){
            redirect('blog', 'refresh');
        }else{
            $data['blog'] = $this->Model_Blog->getBlog($this->input->get('blog_id'));
            if($data['blog']->num_rows > 0){
                parent::loadPage('blog/single', 'Blog', $data);
            }else{
                redirect('blog', 'refresh');
            }
        }
    }
}
