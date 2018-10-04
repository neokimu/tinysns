<?php

/**
 * DAOモデル
 *
 * @author キム
 * 
 * @property FRIENDS_DB
 */
class Friends_dao extends CI_Model
{
    protected $id;
    protected $request_id;
    protected $freiend_id;
    
    /**
     * 友達の申し込む習得
     *
     * @param $id
     *
     * @return array $result
     */
    public function request($id)
    {
        
        $result = null;
        $query = $this->db->query("select id, m_photo, profile from member where id ="
                                  . "(select request_id from friends where id = '$id')");

        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            
            return $result;
        }          
    }
    
    /**
     * 登録されている友達の目録を習得
     *
     * @param $id
     *
     * @return array $result
     */
    public function friends($id)
    {
        
        $result = null;
        $query = $this->db->query("select id, email, m_photo, profile from member where id ="
                                  . "(select friends_id from friends where id = '$id')");

        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            
            return $result;
        }          
    }
}