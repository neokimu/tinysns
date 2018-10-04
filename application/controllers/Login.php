<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {    
        
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('member_dao');
    }
    
    public function index()
    {   
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $result = $this->member_dao->login($id, $password);
        
        if($result != FALSE)
        {
            // login 成功         
            $session_data = array(
                                'id' => $result['id'],
                                'm_category' => $result['m_category']
                                 );
            $this->session->set_userdata($session_data);
            
            redirect('main');         
        } else {
           // login 失敗
           redirect(base_url());
        }                  
    }       
}
