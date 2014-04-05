<?php

class manufacturers extends My_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('model_manufacturer');
    }
    
    function index(){
        $data['manufacturers'] = $this->model_manufacturer->getManufacturers();
        $data['files'] = scandir('store_assets/images/manufacturers/');
        parent::loadAdmin('manufacturers', $data);
    }
    
    function add(){
        $this->model_manufacturer->addManufacturer('', '', '', '');
        redirect(admin_url('manufacturers'), 'refresh');
    }
    
    function save(){
        $this->load->library('form_validation');
        
        $manufacturers = $this->model_manufacturer->getManufacturers();
        $count = 1;
        foreach($manufacturers->result() as $manufacturer){
            $this->form_validation->set_rules("manufacturerid$count", "Manufacturer $count ID", 'required|integer');
            $this->form_validation->set_rules("manufacturername$count", "Manufacturer $count Name", 'required|max_length[20]');
            $this->form_validation->set_rules("manufacturerphone$count", "Manufacturer $count Phone", 'max_length[15]');
            $this->form_validation->set_rules("manufactureremail$count", "Manufacturer $count Email", 'max_length[50]|valid_email');
            $this->form_validation->set_rules("manufacturerlogo$count", "Manufacturer $count Logo", 'max_length[100]');
        }
        
        if($this->form_validation->run() == FALSE){
            $data['error'] = validation_errors();
            $this->index($data);
        }else{
            $count = 1;
            foreach($manufacturers->result() as $manufacturer){
                $id = $this->input->post("manufacturerid$count");
                $name = $this->input->post("manufacturername$count");
                $phone = $this->input->post("manufacturerphone$count");
                $email = $this->input->post("manufactureremail$count");
                $logo = $this->input->post("manufacturerlogo$count");
                $this->model_manufacturer->editManufacturer($id, $name, $phone, $email, $logo);
                $count++;
            }
            redirect(admin_url('manufacturers'), 'refresh');
        }
    }
    
    function delete(){
        $id = $this->input->get('id');
        
        if($id){
            $this->model_manufacturer->deleteManufacturer($id);
        }
        
        redirect(admin_url('manufacturers'), 'refresh');
    }
    
}
