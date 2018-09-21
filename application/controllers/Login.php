<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {    

    public function __construct() {
        parent::__construct();
        $this->load->model('member_dao');
    }
    
    public function index()
    {   
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        
        if($this->member_dao->login($id, $password))
        {
            // login 成功         
 //          $this->load->library('../controllers/main');
            $this->session->set_userdata('id', $id);
            
            $this->load->view('main_view');
        } else {
           // login 失敗
           $this->load->view('welcome_view');
        }                  
    }       
}
