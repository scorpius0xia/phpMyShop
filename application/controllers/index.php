<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author coolwind
 */
class Index extends CI_Controller {

    //put your code here

    private $menu = '';

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('User_model');
        $this->config->load('menu');
        //$this->output->enable_profiler(TRUE);

        $this->menu = $this->config->item('menu');
    }

    public function index() {
        $this->User_model->auto_login();
        $data['status'] = $this->User_model->status;
        $data['username'] = $this->User_model->username;
        $data['title'] = '联想商城';
        $data['brand'] = $this->menu['brand'];
        $data['menuactive'] = array('active', '', '');
        $this->mainpage($data);
    }

    public function login() {
        
    }

    public function mainpage($data) {
        $this->page('main_view', $data);
    }

    public function aboutpage() {
        $data['status'] = $this->User_model->status;
        $data['username'] = $this->User_model->username;
        $data['title'] = '关于我们';
        $data['brand'] = $this->menu['brand'];
        $data['menuactive'] = array('', 'active', '');
        $this->page('about_view', $data);
    }

    public function contactpage() {
        $data['status'] = $this->User_model->status;
        $data['username'] = $this->User_model->username;
        $data['title'] = '联系我们';
        $data['brand'] = $this->menu['brand'];
        $data['menuactive'] = array('', '', 'active');
        $this->page('contact_view', $data);
    }
    
    public function register(){
        
    }

    public function page($content, $data) {
        $this->load->view('common/header', $data);
        $this->load->view('common/menu_view');
        $this->load->view($content);
        $this->load->view('common/footer');
    }

}
