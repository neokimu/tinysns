<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {
    
    public $data;

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('post_dao');
  
    }
    
    public function index()
    {   
        $this->data = $this->post_dao->mypost($this->session->userdata('id'));
        $this->load->view('mypage_view', $this->data);
    } 
      
}


