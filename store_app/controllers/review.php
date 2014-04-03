<?php

class review extends My_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_Review');
    }
    
    function reviews($id)
    {
        $data['review'] = $this->Model_Review->getReview($id)->row();
        parent::loadPage('product/review', 'Reviews',$data);
    }
}
