<?php
class product extends My_Controller{
    private $products;
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Product', 'product');
    }
    
    function index($data = array()){
        $this->all($data);
    }
    
    function all($data = array()){
        $data['products'] = $this->product->getProducts();
        parent::loadAdmin('product/all', $data);
    }
    
    function single($data = array()){
        $id = $this->input->get('id');
        if($id != false && is_numeric($id)){
            $data['product_info'] = $this->product->getProduct($id);
            parent::loadAdmin('product/single', $data);
        }
    }
}
