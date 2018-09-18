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
    private $id;
    private $request_id;
    private $freiend_id;
    
    public function get_uq_numer($id){
        return $this->id;
    }

    public function set_uq_numer($id){
        $this->id = $id;
    }
    
    public function get_request_id($request_id){
        return $this->request_id;
    }

    public function set_request_id($request_id){
        $this->request_id = $request_id;
    }
    public function get_freiend_id($freiend_id){
        return $this->freiend_id;
    }

    public function set_freiend_id($freiend_id){
        $this->freiend_id = $freiend_id;
    }
}