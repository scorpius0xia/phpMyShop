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
class Item extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('Order_model','User_model'));
    }

    public function submit_order($username) {
        $data['gid'] = $this->input->post('item_no');
        $data['gname'] = $this->input->post('item_name');
        $data['oamount'] = $this->input->post('item_amount');
        $data['oname'] = $this->input->post('user_name');
        $data['oaddress'] = $this->input->post('user_address');
        $data['ocode'] = $this->input->post('user_code');
        $data['otelephone'] = $this->input->post('user_telephone');
        $data['ototal'] = $this->input->post('total');
        
        $data['uid'] = $this->User_model->getUid($username);
        $data['odate'] = date('Y-m-d G:i:s');
        $data['ostatus'] = 0;
        
        $msg = $this->Order_model->submit_order($data);
        
        echo $msg;
    }

}
