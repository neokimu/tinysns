<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {    
    
    public $data;

    public function __construct() 
    {    
        parent::__construct();
        $this->load->model('post_dao');
        
        // loginしていない場合404処理
        if($this->session->userdata('id') === NULL)
        {
            show_404();
        }        
    }
    
    public function index()
    {       
            $m_category = $this->regular();
            
            $this->data = $this->post_dao->view($m_category);
            
            $this->load->view('main_view', $this->data);              
    }
    
    /**
     * カテゴリーの文字列を正規表現への変換
     *
     * @param
     *
     * @return string
     */
    public function regular() 
    {
        $m_category = $this->session->userdata('m_category');
        $last_category = (int)substr($m_category, -1, 1);
        $splited_category = str_split($m_category);
        $regulared = null;
             
        foreach ($splited_category as $category)
        {
            if($category != $last_category)
            {
                $regulared .= $category . '|'; 
            }
        }        
        return $regulared .= $last_category;
    }
}
