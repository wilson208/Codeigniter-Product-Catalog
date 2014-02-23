<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class home extends CI_Controller{
    
    function __construct() {
        parent::__construct();        
    }
    
    function index(){
        $this->load->view('admin/common/header');
        $this->load->view('admin/home');
        $this->load->view('admin/common/header');
    }
}
