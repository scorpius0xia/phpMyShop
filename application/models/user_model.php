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
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function login($username, $password){
        $this->username = $username;
        $this->password = $password;
        
        if(checkLogin()){
            $user =array('username'=>$this->username);
        }else{
            return FALSE;
        }
        
    }

    public function auto_login() {
        $this->username = $this->session->userdata('username');
        $this->status = $this->session->userdata('status');

        if (isset($this->username) && isset($this->status) &&
                strcmp($this->username, '') != 0 && status == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function checkLogin(){
        
    }

}
