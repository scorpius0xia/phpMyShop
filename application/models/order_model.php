<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order_model
 *
 * @author coolwind
 */
class Order_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function submit_order($data){
        $this->db->select('gamount');
        $this->db->from('goods');
        $this->db->where('gid',$data['gid']);
        
        $res = $this->db->get();
        $res = $res->result();
        $res = $res[0];
        
        $amount = $res->gamount;
        
        if($amount < $data['oamount']){
            return '购买商品数量大于当前库存，下单失败！';
        }
        
        $amount = $amount - $data['oamount'];
        
        $this->db->where('gid',$data['gid']);
        $this->db->update('goods',array('gamount'=>$amount));
        
        $this->db->insert('orders',$data);
        return '订单提交成功';
    }
    
    public function getOrders($num,$offset,$uid,$status = 10){
        if($status != 10){
            $this->db->where('ostatus',$status);
        }
        $this->db->where('uid',$uid);
        $query = $this->db->get('orders',$num,$offset);
        return $query;
    }
    
    public function item_cancel($oid){
        $this->db->where('oid',$oid);
        $this->db->update('orders',array('ostatus'=>2));
    }
    
    public function getOrderAdmin($num,$offset,$status = 10){
        if($status != 10){
            $this->db->where('ostatus',$status);
        }
        $query = $this->db->get('orders',$num,$offset);
        return $query;
    }
    
    public function item_send($oid){
        $this->db->where('oid',$oid);
        $this->db->update('orders',array('ostatus'=>1));
    }
    
    public function order_delete($oid){
        $this->db->where('oid',$oid);
        $this->db->delete('orders');
    }
}
