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
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('p_text', 'p_text', 'required');
        $this->form_validation->set_rules('p_category', 'p_category', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('writepost_view'); 
        } else {       
            $this->post_dao->write($this->session->userdata('id'), $this->input->post('title'), 
                                   $this->input->post('p_photo'), $this->input->post('p_text'), 
                                   $this->input->post('p_category'), date('Y-m-d H:i:s'));
            
            $this->load->view('main_view');           
        }       
    }
}

