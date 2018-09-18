<?php

/**
 * DAOモデル
 *
 * @author キム
 * 
 * @property MEMBER_DB
 */
class Member_dao extends CI_Model
{
    private $uq_number;
    private $id;
    private $password;
    private $email;
    private $m_photo;
    private $profile;
    private $m_category;

    public function login($id, $password){
        
        $sql = "select * from member where id= '$id' and password= '$password'";
        $result = $this->db->query($sql)->row_array();
              
        if($result !=null) {
            
            $this->uq_number = $result['uq_number'];
            $this->id = $result['id'];
            $this->password = $result['password'];
            $this->email = $result['email'];
            $this->m_photo = $result['m_photo'];
            $this->profile = $result['profile'];
            $this->m_category = $result['m_category'];
            
            return TRUE;                
        } 
        return FALSE;    
    }
    
    public function join($id, $password, $email, $m_photo, $profile, $m_category){
        
        $sql = "select * from member where id= '$id' and password= '$password'";
        $result = $this->db->query($sql)->row_array();
        
        $this->uq_number = $uq_number;
        $this->id = $id;
        $this->password = $password;
        $this->email = $email;
        $this->m_photo = $m_photo;
        $this->profile = $profile;
        $this->m_category = $m_category;
    }


    public function get_uq_number($uq_number){
        return $this->uq_number;
    }

    public function set_uq_number($uq_number){
        $this->uq_number = $uq_number;
    }
    
    public function get_id($id){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }
    
    public function get_password($password){
        return $this->password;
    }

    public function set_password($password){
        $this->password = $password;
    }
    
    public function get_email($email) {
        $this->email;
    }
    
    public function set_email($email) {
        $this->email = $email;
    }
    
    public function get_m_photo($m_photo) {
        $this->m_photo;
    }
    
    public function set_m_photo($m_photo) {
        $this->m_photo = $m_photo;
    }
    
    public function get_profile($profile) {
        $this->profile;
    }
    
    public function set_profile($profile) {
        $this->profile = $profile;
    }
    
    public function get_m_category($m_category) {
        $this->m_category;
    }
    
    public function set_m_categoy($m_category) {
        $this->m_category = $m_category;
    }

}