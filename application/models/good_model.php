<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of good_model
 *
 * @author coolwind
 */
class Good_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_item($data){
        $this->db->insert('goods',$data);
    }
    
    public function get_items($num,$offset){
        $this->db->where('gstatus',0);
        $query = $this->db->get('goods',$num,$offset);
        return $query;
    }
    
    public function item_detail($gid){
        $this->db->select('*');
        $this->db->from('goods');
        $this->db->where('gid',$gid);
        
        $query = $this->db->get();
        
        return $query;
    }
    
}
