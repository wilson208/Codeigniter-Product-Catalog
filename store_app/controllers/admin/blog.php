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
        $this->load->model('Model_Blog', 'blog');
        $this->load->model('Model_User', 'user');
    }
    
    function index($data = array()){
        $this->all($data);
    }
    
    function all($data = array()){
        $data['blog'] = $this->blog->getBlogs(false);
        parent::loadAdmin('blog/all', $data);
    }
    
    function single($data = array(), $id = null){
        if($id == null){
            $id = $this->input->get('id');
        }
        
        if(is_numeric($id)){
            $data['blog'] = $this->blog->getBlog($id);
            $data['user'] = $this->user->getUser($data['blog']->user_id)->row();
            parent::loadAdmin('blog/single', $data); 
        }else{
            redirect(admin_url('blog'));
        }
    }
    
    function add(){
        $id = $this->blog->newBlog('', '', $this->session->userdata['id'], 0);
        redirect(admin_url('blog/single?id=' . $id), 'refresh');
    }
    
    function save(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]|xss_clean');
	$this->form_validation->set_rules('blog', 'Blog', 'required|min_length[3]');
        
        $id = $this->input->post('id');
        if ($this->form_validation->run() != FALSE){
            $title          = $this->input->post('title');
            $blog           = $this->input->post('blog');
            $user_id        =$this->input->post('user_id');
            $status        =$this->input->post('status');
            
            $this->blog->editBlog($id, $title, $blog, $user_id, $status);
            redirect(admin_url('blog/single?id=') . $id, 'refresh');
	}else{
            $this->single(array(), $id);
	}
    }
    
    function delete(){
        $id = $this->input->get('id');
        
        if(is_numeric($id)){
            $data['blog'] = $this->blog->deleteBlog($id);
        }
            
        redirect(admin_url('blog'));
        
    }
}
