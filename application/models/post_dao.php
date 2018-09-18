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
    private $p_number;
    private $id;
    private $title;
    private $p_photo;
    private $p_text;
    private $p_category;
    private $like_num;
    private $p_date;
    
    public function get_p_number($p_number){
        return $this->p_number;
    }

    public function set_p_number($p_number){
        $this->p_number = $p_number;
    }
    
    public function get_id($id){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }
    
    public function get_title($title){
        return $this->title;
    }

    public function set_title($title){
        $this->title = $title;
    }
    
    public function get_p_photo($p_photo) {
        $this->p_photo;
    }
    
    public function set_p_photo($p_photo) {
        $this->p_photo = $p_photo;
    }
    
    public function get_p_text($p_text) {
        $this->p_text;
    }
    
    public function set_p_text($p_text) {
        $this->p_text = $p_text;
    }
    
    public function get_p_category($p_category) {
        $this->p_category;
    }
    
    public function set_p_category($p_category) {
        $this->p_category = $p_category;
    }
    
    public function get_like_num($like_num) {
        $this->like_num;
    }
    
    public function set_like_num($like_num) {
        $this->like_num = $like_num;
    }
    
    public function get_p_date($p_date) {
        $this->p_date;
    }
    
    public function set_p_date($p_date) {
        $this->p_date = $p_date;
    }
}