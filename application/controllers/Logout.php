<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {    
    // sessionの破棄して、最初の画面に戻る
    public function __construct() 
    {
        parent::__construct();
        $this->session->sess_destroy();
    }
    
    public function index()
    {           
        redirect(base_url());               
    }       
}
