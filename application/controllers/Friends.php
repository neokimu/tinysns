<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {
    
    public $request;
    public $friends;

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('friends_dao');  
    }
    
    public function index()
    {   
        $this->request = $this->friends_dao->request($this->session->userdata('id'));
        $this->friends = $this->friends_dao->friends($this->session->userdata('id'));
        $this->load->view('friends_view');
    } 
      
}


