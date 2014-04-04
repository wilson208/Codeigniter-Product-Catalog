<?php

class review extends My_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_Review');
    }
    
    
    function index()
    {
        $id = $this->uri->segment(2);
        $data['review'] = $this->Model_Review->getReview($id);
        parent::loadPage('product/review', 'Reviews',$data);
    }
}
