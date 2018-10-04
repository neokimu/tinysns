<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('member_dao');
        $this->load->helper('url');
    }
    
    public function index()
    {       
        $this->load->view('join_view');                
    } 
    
    public function register()
    {   
        $m_category = NULL;
        
        $this->form_validation->set_rules('id', 'id', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', 'password', 'required|matches[re_password]');
        $this->form_validation->set_rules('re_password', 're_password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('m_category[]', 'm_category', 'required');
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('join_view'); 
        } else {
            
            $category_array = $this->input->post('m_category');
            
            foreach ($category_array as $value) 
            {           
                $m_category .= $value;
            }
            
            $join_array = [ $this->input->post('id'), $this->input->post('password'), 
                            $this->input->post('email'), $this->input->post('m_photo'),
                            $this->input->post('profile'), $m_category ];
        
            $join_result = $this->member_dao->join($join_array);
            
            if($join_result != FALSE)
            {
                redirect('/');       
            }
        }       
    }
}
