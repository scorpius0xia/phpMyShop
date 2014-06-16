<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author coolwind
 */
class User_model extends CI_Model {

    public $username = '';
    public $password = '';
    public $status = FALSE;
    public $email = '';
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($username, $password){
        $this->username = $username;
        $this->password = $password;
        
        if($this->checkLogin() == TRUE){
            $user = array(
                'username'=>$this->username,
                'status'=>TRUE
                    );
            $this->session->set_userdata($user);
            
            return TRUE;
        }else{
            return FALSE;
        }
        
    }

    public function auto_login() {
        $this->username = $this->session->userdata('username');
        $this->status = $this->session->userdata('status');

        if (isset($this->username) && isset($this->status) &&
                strcmp($this->username, '') != 0 && $this->status == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function checkLogin(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('uname',$this->username);
        $this->db->where('upassword',$this->password);
        
        $query = $this->db->get();
        
        if($query->num_rows() != 0){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    
    public function registration($username, $password, $email){
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        
        $user = array(
            'uname'=>$this->username,
            'upassword'=>$this->password,
            'uemail'=>$this->email,
            'uadmin'=>0,
            'ustatus'=>0
        );
        
        $query = $this->db->insert('users',$user);
        
        $user = array(
            'uname'=>$this->username,
            'udname'=>'',
            'udaddress'=>'',
            'udcode'=>'',
            'udtelephone'=>''
        );
        
        $result = $this->db->insert('user_detail',$user);
        if ($query != FALSE && $result != FALSE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logout(){
        $user = array(
            'username'=>'',
            'status'=>''
        );
        
        $this->session->unset_userdata($user);
    }
    
    public function getUser($username){
        $this->db->select('*');
        $this->db->from('user_detail');
        $this->db->where('uname',$username);
        
        $query = $this->db->get();
        
        return $query;
    }
    
    public function modify_password($data,$username){
        $ori_pwd = $data['ori_pwd'];
        $new_pwd = $data['new_pwd'];
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('uname',$username);
        $this->db->where('upassword',$ori_pwd);
        
        $query = $this->db->get();
        if($query->num_rows() == 0){
            return "<h4 class=\"text-center btn-submit\">原密码错误</h4>";
        }else{
            $this->db->where('uname',$username);
            $this->db->update('users',array('upassword'=>$new_pwd));
            return "<h4 class=\"text-center btn-submit\">密码修改成功</h4>";
        }
    }
    
    public function modify_user($data,$username){
        $this->db->where('uname',$username);
        $this->db->update('user_detail',$data);
    }
    
}
