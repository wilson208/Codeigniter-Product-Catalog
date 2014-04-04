<?php

class review extends My_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_Review');
        $this->load->model('Model_Product');
    }
    
    
    function index()
    {
        $id = $this->uri->segment(2);
        $data['product'] = $this->Model_Product->getProduct($id)->row();
        $data['review'] = $this->Model_Review->getReview($id)->result();
        
        parent::loadPage('product/review', 'Reviews',$data);
    }
}
