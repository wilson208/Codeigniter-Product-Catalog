<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manufacturer
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class manufacturer extends My_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Manufacturer');
    }
    
    function index(){
        $id = $this->uri->segment(2);
        $manufacturer = $this->Model_Manufacturer->getManufacturer($id);
        $data['manufacturer'] = $manufacturer;
        parent::loadPage('manufacturer', $manufacturer->row()->name, $data);
    }
}
