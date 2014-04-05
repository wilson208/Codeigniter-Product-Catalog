<?php
class model_order extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function getOrder($id){
        $this->db->where(array('id' => $id));
        return $this->db->get('order');
    }
    
    function getOrders($user_id = null){
        if($user_id != null){
            $this->db->where(array('user_id' => $user_id));
        }
        return $this->db->get('order');
    }
    
    function getOrderTotal($order_id){
        $sql = 'SELECT SUM(`price` * `quantity`) as `total` FROM `order_product` WHERE `order_id` = ? ;';
        return $this->db->query($sql, array($order_id))->row()->total;
    }
    
    function addOrder($user_id, $status = 'pending', $payment_confirmed = true){
        $data = array(
            'user_id'           => $user_id,
            'status'            => $status,
            'payment_confirmed' => $payment_confirmed
        );
        $this->db->insert('order', $data);
        return $this->db->insert_id();
    }
    
    function updateOrder($order_id, $data){
        $this->db->update('order', $data, array('id' => $order_id));
    }
    
    function addProductToOrder($order_id, $product_id, $price, $quantity = 1){
        $data = array(
            'order_id' => $order_id,
            'product_id' => $product_id,
            'price' => $price,
            'quantity' => $quantity
        );
        
        $this->db->insert('order_product', $data);
        //No ID To Return (Combination of order id and product id) 
    }
    
    function getOrderProducts($order_id){
        $this->db->where(array('order_id' => $order_id));
        $sql = 'SELECT `product`.`id` AS product_id, `product`.`name`,  `order_product`.`price`, `order_product`.`quantity` '
                . 'FROM `product`, `order_product` '
                . 'WHERE `product`.`id` = `order_product`.`product_id` '
                . 'AND `order_product`.`order_id` = ? ;';
        return $this->db->query($sql, array($order_id));
    }
    
    function markPaid($order_id){ 
        $this->load->model('model_email');
        $data = array(
            'payment_confirmed' => 1,
            'status' => 'confirmed',
            'date_modified' => date('Y-m-d H:i:s')
        );
        
        $this->updateOrder($order_id, $data);
        $order = $this->getOrder($order_id)->row();
        $message = "Your payment has been confirmed for your order. Order #: $order_id. Visit our website and login to view all your orders." ;
        $this->model_email->sendEmailToUser($order->user_id, 'Order Payment Received', $message);
    }
    
    function markShipped($order_id){ 
        $this->load->model('model_email');
        $data = array(
            'payment_confirmed' => 1,
            'status' => 'shipped',
            'date_modified' => date('Y-m-d H:i:s')
        );
        
        $this->updateOrder($order_id, $data);
        $order = $this->getOrder($order_id)->row();
        $message = "You have an order update for you order through our online store. Your order has been shipped. Please visit our website and login to view your order details.";
        $this->model_email->sendEmailToUser($order->user_id, 'Order Update', $message);
        
    }
}
