<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('member_dao');
        $this->load->helper('form');
    }
    
    public function index()
    {       
        $this->load->view('join_view');                
    } 
    
    // 会員登録のvalidationのルールをsetting
    public function set_rules() 
    {
        $this->form_validation->set_rules('id', 'id', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', 'password', 'required|matches[re_password]');
        $this->form_validation->set_rules('re_password', 're_password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('m_category[]', 'm_category', 'required');
    }
    
    // 会員登録のvalidation
    public function join_validation() 
    {   
        $join_array = NULL;
        
        $this->set_rules();
        
        if($this->form_validation->run() == false)
        {   
            // validationに合わない場合
            $this->load->view('join_view'); 
        } else {
            // validationに合う場合
            $join_array = [ $this->input->post('id'), $this->input->post('password'), 
                                  $this->input->post('email'), $this->input->post('m_photo'),
                                  $this->input->post('profile'), 
                                  // m_categoryの配列を文字列に変換
                                  $this->category_str($this->input->post('m_category')) ];
            // profile画像のupload
            // 登録された値を送る
            $this->do_upload();
            $this->join_register($join_array);
        }
    }
    
    // profile画像を保存する
    public function do_upload()
    {
        $config['upload_path']          = './assets/img/m_photo';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        $this->upload->do_upload('m_photo');
    }
    
    // データベースの登録のためにm_categoryの前処理
    public function category_str($m_category) 
    {
        $category_str = NULL;
        $category_array = $m_category;
        
        foreach ($category_array as $category) 
            {           
                $category_str .= $category;
            }            
        return $category_str;
    }
        
    // データベースの登録のために登録情報を送る
    public function join_register($join_array)
    {   
        $join_result = $this->member_dao->join($join_array);
            // 会員登録に成功する場合、最初の画面に戻る
            if($join_result != FALSE)
            {
                redirect('/');       
            }
    } 
}
