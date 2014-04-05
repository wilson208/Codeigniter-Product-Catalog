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
        $this->load->model('model_user');
        $this->load->model('model_order');
    }
    function index($data = array()){
        $data['user'] = $this->model_user->getUser($this->session->userdata['id'])->row();
        parent::loadPage('checkout/checkout', 'Checkout', $data);
    }
    
    function processCheckout(){
        $this->load->library('form_validation');
        
        $details_correct = $this->input->post('details_correct');
        $terms_ageed = $this->input->post('terms_ageed');
        
        if($terms_ageed && $details_correct){
            $order_id = $this->model_order->addOrder($this->session->userdata['id'], 'pending', false);
            foreach($this->cart->contents() as $item){
                $product_id = $item['id'];
                $quantity = $item['qty'];
                $price = $item['price'];
                $this->model_order->addProductToOrder($order_id, $product_id, $price, $quantity);
            }
            $this->cart->destroy();
            redirect('checkout/makePayment?id=' . $order_id, 'refresh');
        }else{
            $data = array('message' => '');
           if(!$details_correct)
               $data['message'] = $data['message'] . '<p>Please Confirm Details Are Correct</p>';
        
            if(!$terms_ageed)
               $data['message'] = $data['message'] . '<p>Please Agree To Terms & Conditions</p>';
            
            $this->index($data);
        }
    }
    
    function makePayment($data = array()){
        if($this->input->get('id')){
            
            $data['order'] = $this->model_order->getOrder($this->input->get('id'));
            $data['products'] = $this->model_order->getOrderProducts($this->input->get('id'));
            $data['total'] = $this->model_order->getOrderTotal($this->input->get('id'));
            
            if($data['order']->num_rows() == 0){
                redirect('checkout', 'refresh');
            }else{
                parent::loadPage('checkout/makePayment', 'Make Payment', $data);
            }
            
        }else{
            redirect('checkout', 'refresh');
        }
    }
    
    function processPayment(){
        $order_id = $this->input->post('order_id');
        if($order_id){
            $this->model_order->markPaid($order_id);
            redirect('checkout/success', 'refresh');
        }else{
            $this->makePayment(array('message' => 'Error Making Payment, Try Again.'));
        }
    }
    
    function success(){
        parent::loadPage('checkout/success', 'Order Made');
    }
}
