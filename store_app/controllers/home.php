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
class home extends My_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        parent::loadPage('home', 'Homepage');
    }
}
