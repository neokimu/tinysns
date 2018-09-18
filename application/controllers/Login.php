<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {    

    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {   
        
        $this->load->model('member_dao');     
        
        if($this->member_dao->login($this->input->post('id'), $this->input->post('password')))
        {
            // login 成功
           $this->load->view('sns_view');
        } else {
           // login 失敗
           $this->load->view('main_view');
        }                  
    }       
}
