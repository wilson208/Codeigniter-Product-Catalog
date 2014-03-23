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
        if($this->input->get('redirect')){
            $redirect = admin_url($this->input->get('redirect'));
        }else{
            $redirect = admin_url();
        }
        
        if($this->input->get('path')){  
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);
            $this->upload->do_upload();
        }
        
        redirect($redirect, 'refresh');
        
    }
}
