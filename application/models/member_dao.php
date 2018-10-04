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
    protected $uq_number;
    protected $id;
    protected $password;
    protected $email;
    protected $m_photo;
    protected $profile;
    protected $m_category;
    
    /**
     * 登録しているユーザかどうかを確認
     *
     * @param $id, $password
     *
     * @return bool
     */
    public function login($id, $password)
    {        
        $sql = "SELECT * FROM member WHERE id= ? AND password= ?";
        $result = $this->db->query($sql, array($id, $password))->row_array();
              
        if ($result != NULL)
        {   
            return $result;
        } 
    }   
    
    /**
     * ユーザ登録をする
     *
     * @param array $join_array [id, password, email, m_photo, profile, m_category]
     *
     * @return bool
     */
    public function join($join_array){
        
        $sql = "INSERT INTO member VALUES (null, ?, ?, ?, ?, ?, ?)";
        $result = $this->db->query($sql, $join_array);
              
        if($result != NULL) {    
            return TRUE;                
        } 
        return FALSE; 
    }
}
