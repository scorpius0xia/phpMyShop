<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author coolwind
 */
class Item extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    
    public function item_detail(){
        $this->load->view('item_detail');
    }
}
