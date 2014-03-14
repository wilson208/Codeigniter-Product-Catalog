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
            $this->load->model('Model_Manufacturer', 'manufacturer');
            $this->load->model('Model_Category', 'category');
            
            $data['categories']     = $this->category->getCategories();
            $data['manufacturers']  = $this->manufacturer->getManufacturers();
            $data['images']         = array_diff(scandir('store_assets/images/products/'), array('.', '..'));
            $data['product']        = $this->product->getProduct($id);
            $data['productImages']  = $this->product->getProductImages($id);
            $data['productSpecials']= $this->product->getProductSpecials($id);
            $data['productReviews'] = $this->product->getProductReviews($id);
            
            parent::loadAdmin('product/single', $data);
        }
    }
    
    function delete(){
        if($this->input->get('id') != FALSE){
            $id = $this->input->get('id');
            $this->product->deleteProduct($id);
            $this->product->deleteAllProductImages($id);
            $this->product->deleteAllProductSpecials($id);
            $this->product->deleteAllProductReviews($id);
        }
    }
}
