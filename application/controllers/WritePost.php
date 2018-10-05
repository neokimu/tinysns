<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WritePost extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('post_dao');
        $this->load->helper(array('date', 'form'));
    }
    
    public function index()
    {   
        $this->load->view('writepost_view');        
    }   
    
    // post登録のvalidationのルールをsetting
    public function set_rules() 
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('p_text', 'p_text', 'required');
        $this->form_validation->set_rules('p_category[]', 'p_category', 'required');
    }
    
    // post登録のvalidation
    public function post_validation()
    {   
        $post_array = NULL;
        
        $this->set_rules();
        
        if ($this->form_validation->run() == false)
        {   
            // validationに合わない場合
            $this->load->view('writepost_view');            
        } else {  
            // validationに合う場合
            // 画像の名前を習得
            $photo_name = $_FILES['p_photo']['name'];            
            $post_array = [ $this->session->userdata('id'), $this->input->post('title'), 
                            $photo_name, $this->get_m_photo(),
                            $this->input->post('p_text'), 
                            $this->category_str($this->input->post('p_category')), date('Y-m-d H:i:s') ];
          
            $this->post_register($post_array);
        }       
    }
    
    // post画像を保存する
    public function do_upload()
    {
        $config['upload_path']          = './assets/img/p_photo';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 1000;

        $this->load->library('upload', $config);

        $this->upload->do_upload('p_photo');
        $this->upload->initialize($config, $reset = TRUE);
    }
    
    // データベースの登録のためにp_categoryの前処理
    public function category_str($p_category) 
    {
        $category_str = NULL;
        $category_array = $p_category;
        
        foreach ($category_array as $category) 
            {           
                $category_str .= $category;
            }            
        return $category_str;
    }
    
    public function get_m_photo()
    {   
        $post_result = $this->post_dao->get_photo($this->session->userdata('id'));
            
        if($post_result['m_photo'] == ''){
            return $post_result['m_photo'] = 'default.jpg';
        }
        return $post_result['m_photo'];   
    } 
    
    // データベースの登録のためにpost情報を送る
    public function post_register($post_array)
    {   
        // 登録された値を送る
        $post_result = $this->post_dao->write($post_array);
            // 会員登録に成功する場合、mainページの画面に戻る
        // post画像のupload
        $this->do_upload();
        if($post_result != FALSE)
        {
            redirect('main');       
        }
    } 
}

