<?php
class model_email extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->library('email');
    }
    
    function sendEmail($to, $subject, $message){
        $config['protocol'] = 'mail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        
        $this->email->from('admin@onlinestore.co.uk', 'Online Store');
        $this->email->to($to); 

        $this->email->subject($subject);
        $this->email->message($message);	

        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
           return false; 
        }
    }
    
    function sendEmailToUser($user_id, $subject, $message){
        $this->load->model('model_user');
        $user = $this->model_user->getUser($user_id);
        if($user->num_rows() > 0){
            $email = $user->row()->email;
            return $this->sendEmail($email, $subject, $message);
        }else{
            return false;
        }
    }
}
