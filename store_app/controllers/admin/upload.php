<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class upload extends My_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $redirect = null;
        if($this->input->post('redirect')){
            $redirect = admin_url($this->input->post('redirect'));
        }else{
            $redirect = admin_url();
        }
            
        $config['allowed_types'] = '*';
        $config['max_size']	= '1024';
        $config['max_width']  = '1000';
        $config['max_height']  = '1000';
        $config['upload_path'] = 'store_assets/images/'. $this->input->post('path') . '/';
            
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('imagefile')){
            echo $this->upload->display_errors();
        }else{
            redirect($redirect, 'refresh');
        }        
    }
}
