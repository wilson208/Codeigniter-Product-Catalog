<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orders
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class orders extends My_Controller{
    function __construct($fullWidth = false) {
        parent::__construct($fullWidth);
        $this->load->model('model_order');
        $this->load->model('model_user');
    }
    
    function index(){
        $this->all();
    }
    
    function all(){
        $data['orders'] = $this->model_order->getOrders();
        
        parent::loadAdmin('order/all', $data);
    }
    
    function single(){
        
        $order_id = $this->input->get('id');
        $order = $this->model_order->getOrder($order_id);
        if($order->num_rows() == 1){
            $data['order'] = $order->row();
            $user_id = $data['order']->user_id;
            $data['products'] = $this->model_order->getOrderProducts($order_id);
            $data['total'] = $this->model_order->getOrderTotal($order_id);
            $data['user'] = $this->model_user->getUser($user_id)->row();
            
            parent::loadAdmin('order/single', $data);
        }else{
            $this->all();
        }
    }
    
    function markShipped(){
        
        $order_id = $this->input->get('id');
        if($order_id != false){
            $this->model_order->markShipped($order_id);
        }
        
        redirect(admin_url('orders/single?id=' . $order_id), 'refresh');
    }
}
