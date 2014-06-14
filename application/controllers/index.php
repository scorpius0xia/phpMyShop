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
        $this->output->enable_profiler(TRUE);

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
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $password = md5($password);

        $result = $this->User_model->login($username, $password);

        if ($result == FALSE) {
            $this->errorpage("估计你用户名密码错了", "数据库君没有找到任何有关输入的用户名和密码信息。。。");
        } else {
            $this->index();
        }
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

    public function register() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');

        $password = md5($password);

        $result = $this->User_model->registration($username, $password, $email);
        if ($result == FALSE) {
            $this->errorpage('出现了一些错误', '我也不知道什么原因');
        } else {
            $this->index();
        }
    }

    public function page($content, $data) {
        $this->load->view('common/header', $data);
        $this->load->view('common/menu_view');
        $this->load->view($content);
        $this->load->view('common/footer');
    }

    public function errorpage($error, $msg) {
        $data['error'] = $error;
        $data['msg'] = $msg;
        $data['status'] = $this->User_model->status;
        $data['username'] = $this->User_model->username;
        $data['title'] = '好像哪里不对劲';
        $data['brand'] = $this->menu['brand'];
        $data['menuactive'] = array('', '', '');
        $this->page('common/error_view', $data);
    }

    public function logout() {
        $this->User_model->logout();
        $this->index();
    }

}
