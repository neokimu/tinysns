<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('member_dao');
    }
    
    public function index()
    {       
        $this->load->view('join_view');                
    } 
    
    public function register()
    {       
        $this->form_validation->set_rules('id', 'id', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', 'password', 'required|matches[re_password]');
        $this->form_validation->set_rules('re_password', 're_password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('m_category', 'm_category', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('join_view');    
        } else {       
            $this->load->view('sns_view');           
        }       
    }
}
