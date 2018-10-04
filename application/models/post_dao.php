<?php

/**
 * DAOモデル
 *
 * @author キム
 * 
 * @property POST_DB
 */
class Post_dao extends CI_Model
{
    protected $p_number;
    protected $id;
    protected $title;
    protected $p_photo;
    protected $p_text;
    protected $p_category;
    protected $like_num;
    protected $p_date;
    
    /**
     * postの中でユーザのカテゴリーを含まれているpost習得（時間順）
     *
     * @param $m_category
     *
     * @return array $result
     */
    public function view($m_category)
    {                 
        $result = null;

        $sql = "SELECT * FROM post WHERE p_category REGEXP ? ORDER BY p_number DESC";
        
        $query = $this->db->query($sql, $m_category);

        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            
            return $result;
        }
    }
    
    /**
     * ユーザが作成したpostを習得（時間順）
     *
     * @param $id
     *
     * @return array $result
     */
    public function mypost($id)
    {                 
        $result = null;
        $sql = "select * from post where id= ? order by p_number DESC";
        $query = $this->db->query($sql, $id);

        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            
            return $result;
        }
    }
    
    /**
     * ユーザが作成したpostをデータベースに登録
     *
     * @param array $post_array [id, title, p_photo, p_text, p_category, p_date]
     *
     * @return bool
     */
    public function write($post_array) 
    {
        $sql = "INSERT INTO post VALUES (null, ?, ?, ?, ?, ?, null, ?)";
        $result = $this->db->query($sql, $post_array);
              
        if($result != NULL) {    
            return TRUE;                
        }   
        return FALSE;
    }
}
