<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of general
 *
 * @author Wilson McCoubrey <wilson@mccoubreys.co.uk>
 */
class general extends CI_Controller{
    
    private $settings = array(
        'Title:'        => 'title',
        'Store Logo:'   => 'logo'
    );
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Settings');
        $this->load->helper(array('form'));
	$this->load->library('form_validation');
    }
    
    public function index(){
        $values         = array();
        $values_full    = $this->Model_Settings->getSettings();
        foreach($values_full->result() as $row){
            $values[$row->setting] =  $row->value;
        }
        
        $data['values']     = $values;
        $data['settings']   = $this->settings;
        
        $this->load->view('admin/common/header');
        $this->load->view('admin/general', $data);
        $this->load->view('admin/common/header');
        
    }
    
    public function saveSettings(){
        $settings = array();
        foreach($this->settings as $key => $setting){
            $settings[$setting] = $this->input->post('Setting_' . $setting);
        }
        $this->Model_Settings->setSettings($settings);
        
        $this->index();
    }
}
