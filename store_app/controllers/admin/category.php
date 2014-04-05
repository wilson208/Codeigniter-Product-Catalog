<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class category extends My_Controller{
    function __construct($fullWidth = false) {
        parent::__construct($fullWidth);
        $this->load->model('model_category');
    }
    
    function index($data = array()){
        $data['categories'] = $this->model_category->getCategories();
        
        parent::loadAdmin('category', $data);
    }
    
    function save(){
        $this->load->library('form_validation');
        
        $categories = $this->model_category->getCategories();
        
        $count = 1;
        foreach($categories->result() as $category){
            $this->form_validation->set_rules("categoryname$count", "Category $count Name", 'required|max_length[20]');
            $this->form_validation->set_rules("categoryorder$count", "Category $count Order", 'required|integer');
            $this->form_validation->set_rules("categoryid$count", "Category $count ID", 'required|integer');
            $count++;
        }
                
        if($this->form_validation->run() == FALSE){
            $data['error'] = validation_errors();
            $this->index($data);
        }else{
            $count = 1;
            foreach($categories->result() as $category){
                $name = $this->input->post("categoryname$count");
                $order = $this->input->post("categoryorder$count");
                $id = $this->input->post("categoryid$count");
                
                $this->model_category->updateCategory($id, $name, $order);
                $count++;
            }
            redirect(admin_url('category'), 'refresh');
        }
        
    }
    
    function add(){
        $this->model_category->addCategory('', 0);
        redirect(admin_url('category'), 'refresh');
    }
    
    function delete(){
        if($this->input->get('id')){
            $this->model_category->deleteCategory($this->input->get('id'));
        }
        redirect(admin_url('category'), 'refresh');
    }
}
