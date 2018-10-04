<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WritePost extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('post_dao');
        $this->load->helper('date');
    }
    
    public function index()
    {   
        $this->load->view('writepost_view');        
    }   
    
    public function write()
    {   
        $p_category = NULL;
        
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('p_text', 'p_text', 'required');
        $this->form_validation->set_rules('p_category[]', 'p_category', 'required');
        
        if ($this->form_validation->run() == false)
        {
            $this->load->view('writepost_view');            
        } else {  
            
            $category_array = $this->input->post('p_category');
            
            foreach ($category_array as $value) 
            {           
                $p_category .= $value;
            }
            
            $post_array = [ $this->session->userdata('id'), $this->input->post('title'), 
                            $this->input->post('p_photo'), $this->input->post('p_text'), 
                            $p_category, date('Y-m-d H:i:s') ];
            
            $post_result = $this->post_dao->write($post_array);
            
            if ($post_result != FALSE)
            {
                redirect('main');       
            }          
        }       
    }
}

