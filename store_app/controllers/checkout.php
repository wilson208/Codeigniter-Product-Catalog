<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of checkout
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class checkout extends My_Controller{
    function __construct() {
        parent::__construct(true);
    }
    function index(){
        parent::loadPage('checkout');
    }
    
}
