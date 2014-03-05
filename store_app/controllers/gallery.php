<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class gallery extends My_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Gallery', 'gallery');
    }
    
    function index(){
        $data['gallery'] = $this->gallery->getAll();
        parent::loadPage('gallery', 'Gallery', $data);
    }
}
