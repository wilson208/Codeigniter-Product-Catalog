<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery
 *
 * @author Wilson
 */
class gallery extends My_Controller{
    
    private $galleryItems = null;
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Gallery', 'gallery');
        $this -> galleryItems = $this->gallery->getAll();
    }
    
    function index(){
        $data['gallery'] = $this -> galleryItems;
        
        //Get Files In Gallery Directory
        $dir = asset_url('images/gallery');
        $data['files'] = scandir('store_assets/images/gallery/');
        
        parent::loadAdmin('gallery', $data);
    }
    
    function save(){
        $rows = $this->galleryItems->num_rows();
        for($x = 1; $x <= $rows; $x++){
            $id     = $this->input->post('id' . $x);
            $title  = $this->input->post('title' . $x);
            $image  = $this->input->post('image' . $x);
            $order  = $this->input->post('order' . $x);
            
            $this->gallery->editGallery($id, $title, $image, $order);
        }
        
        redirect('admin/gallery', 'refresh');
    }
    
    function delete(){
        $id = $this->input->get('id');
        if($id != false && is_numeric($id)){
            $this->gallery->deleteGallery($id);
        }
        redirect(admin_url('gallery'), 'refresh');
    }
    
    function add(){
        $this->gallery->insertGallery('', '', 0);
        redirect(admin_url('gallery'), 'refresh');
    }
    
    function upload(){
        $config['upload_path'] = asset_url('images/gallery');
        $config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']	= '2048';
	$config['max_width']  = '1000';
	$config['max_height']  = '1000';

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('imagefile')){
            $data = array('upload_error' => $this->upload->display_errors());
            echo $data['upload_error'];
            parent::loadAdmin('gallery', $data);
	}else{
            redirect(admin_url('gallery'), 'refresh');
	}
    }
}
