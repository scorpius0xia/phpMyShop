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
        $data['title'] = '联想商城';
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
        $data['title'] = '关于我们';
        $data['menuactive'] = array('', 'active', '');
        $this->page('about_view', $data);
    }

    public function contactpage() {
        $data['title'] = '联系我们';
        $data['menuactive'] = array('', '', 'active');
        $this->page('contact_view', $data);
    }

    public function register() {
        $this->User_model->auto_login();
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

    public function page($content, $data, $validate = FALSE) {
        $this->User_model->auto_login();
        $data['status'] = $this->User_model->status;
        $data['username'] = $this->User_model->username;
        $data['brand'] = $this->menu['brand'];

        if ($validate == TRUE) {
            if (strcmp($data['username'], '') == 0) {
                $this->errorpage('没有登录', '后台重地，闲人免进!');
                return;
            }
        }

        $this->load->view('common/header', $data);
        $this->load->view('common/menu_view');
        $this->load->view($content);
        $this->load->view('common/footer');
    }

    public function errorpage($error, $msg) {
        $data['error'] = $error;
        $data['msg'] = $msg;
        $data['title'] = '好像哪里不对劲';
        $data['brand'] = $this->menu['brand'];
        $data['menuactive'] = array('', '', '');
        $this->page('common/error_view', $data);
    }

    public function logout() {
        $this->User_model->logout();
        $this->index();
    }

    public function ucenter() {
        /* $data['title'] = '用户中心';
          $data['menuactive'] = array('', '', '');
          $this->user_page('welcome_view', $data); */

        $data['title'] = '管理中心';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('welcome_view', $data);
    }

    public function user_page($content, $data, $validate = TRUE) {
        $this->User_model->auto_login();
        $data['status'] = $this->User_model->status;
        $data['username'] = $this->User_model->username;
        $data['brand'] = $this->menu['brand'];

        if ($validate == TRUE) {
            if (strcmp($data['username'], '') == 0) {
                $this->errorpage('没有登录', '后台重地，闲人免进!');
                return;
            }
        }

        $this->load->view('common/header', $data);
        $this->load->view('common/menu_view');
        $this->load->view('common/user_menu_header');
        $this->load->view($content);
        $this->load->view('common/user_menu_footer');
        $this->load->view('common/footer');
    }

    public function admin_page($content, $data, $validate = TRUE) {
        $this->User_model->auto_login();
        $data['status'] = $this->User_model->status;
        $data['username'] = $this->User_model->username;
        $data['brand'] = $this->menu['brand'];

        if ($validate == TRUE) {
            if (strcmp($data['username'], '') == 0) {
                $this->errorpage('没有登录', '后台重地，闲人免进!');
                return;
            }
        }

        $this->load->view('common/header', $data);
        $this->load->view('common/menu_view');
        $this->load->view('common/admin_menu_header');
        $this->load->view($content);
        $this->load->view('common/admin_menu_footer');
        $this->load->view('common/footer');
    }

    public function item_detail() {
        $data['title'] = '商品详情';
        $data['menuactive'] = array('', '', '');
        $this->page('item_detail_view', $data);
    }

    public function mod_pwd() {
        $this->User_model->auto_login();
        $data['username'] = $this->User_model->username;


        $data['title'] = '修改密码';
        $data['menuactive'] = array('', '', '');
        $this->user_page('modify_password_view', $data);
    }

    public function mod_user() {
        $this->User_model->auto_login();
        $username = $this->User_model->username;
        $query = $this->User_model->getUser($username);

        $res = $query->result();

        $data['username'] = $username;
        $data['result'] = $res[0];
        $data['title'] = '修改资料';
        $data['menuactive'] = array('', '', '');
        $this->user_page('modify_user_view', $data);
    }

    public function select_order() {
        $data['title'] = '查询订单';
        $data['menuactive'] = array('', '', '');
        $this->user_page('select_orders_view', $data);
    }

    public function cancel_order() {
        $data['title'] = '取消订单';
        $data['menuactive'] = array('', '', '');
        $this->user_page('cancel_orders_view', $data);
    }

    public function getUser($username) {
        $result = $this->User_model->getUser($username);
        //需要修改，先做测试
        $row = $result->result();
        $result = $row[0];
        $res = array(
            'username' => $result->uname,
            'password' => $result->upassword,
            'email' => $result->uemail
        );

        echo json_encode($res);
    }

    public function admin_modify_user() {
        $this->User_model->auto_login();
        $username = $this->User_model->username;
        $query = $this->User_model->getUser($username);

        $res = $query->result();

        $data['username'] = $username;
        $data['result'] = $res[0];
        $data['title'] = '修改资料';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('modify_user_view', $data);
    }

    public function admin_modify_password() {
        $this->User_model->auto_login();
        $data['username'] = $this->User_model->username;
        $data['title'] = '修改密码';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('modify_password_view', $data);
    }

    public function admin_send_item() {
        $data['title'] = '发货';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('admin_send_item_view', $data);
    }

    public function admin_delete_orders() {
        $data['title'] = '删除订单';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('admin_delete_orders_view', $data);
    }

    public function admin_add_item() {
        $data['title'] = '商品上架';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('admin_add_item_view', $data);
    }

    public function admin_fall_item() {
        $data['title'] = '商品下架';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('admin_fall_item_view', $data);
    }

    public function admin_add_amount() {
        $data['title'] = '进货';
        $data['menuactive'] = array('', '', '');
        $this->admin_page('admin_add_amount_view', $data);
    }

    public function saveUser() {
        $uname = $this->input->post('uname');
        $udname = $this->input->post('udname');
        $udaddress = $this->input->post('udaddress');
        $udcode = $this->input->post('udcode');
        $udtelephone = $this->input->post('udtelephone');

        $data = array(
            'udname' => $udname,
            'udaddress' => $udaddress,
            'udcode' => $udcode,
            'udtelephone' => $udtelephone
        );

        $this->User_model->modify_user($data, $uname);
        echo "<h4>修改成功</h4>";
    }

    public function savePwd() {
        $ori_pwd = $this->input->post('ori_pwd');
        $new_pwd = $this->input->post('new_pwd');
        $uname = $this->input->post('uname');

        $data['ori_pwd'] = md5($ori_pwd);
        $data['new_pwd'] = md5($new_pwd);
        $res = $this->User_model->modify_password($data, $uname);
        echo $res;
    }

}
