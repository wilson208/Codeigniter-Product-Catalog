<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addToCart
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class addToCart extends My_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $data = array(
               'id'      => 'sku_123ABC',
               'qty'     => 1,
               'price'   => 39.95,
               'name'    => 'T-Shirt',
               'options' => array('Size' => 'L', 'Color' => 'Red')
            );

        $this->cart->insert($data);
    }
    
    function view(){
        foreach ($this->cart->contents() as $items){
            echo $items['name'];
        }
    }
    
    function destroy(){
        $this->cart->destroy();
    }
}
