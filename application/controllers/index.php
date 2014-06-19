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
        $this->load->model(array('User_model', 'Good_model', 'Order_model'));
        $this->config->load('menu');
        $this->load->database();
        //$this->output->enable_profiler(TRUE);

        $this->menu = $this->config->item('menu');
    }

    public function index() {
        $this->db->order_by('sid','desc');
        $res1 = $this->db->get('show_items',5);
        $this->db->order_by('pid','desc');
        $res2 = $this->db->get('product_items',3);
        $this->db->order_by('pid','desc');
        $res3 = $this->db->get('product_items',3,3);
        
        $data['res1'] = $res1;
        $data['res2'] = $res2;
        $data['res3'] = $res3;
        $data['title'] = '联想商城';
        $data['menuactive'] = array('active', '', '', '');
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
        $data['menuactive'] = array('', '', '', 'active');
        $this->page('about_view', $data);
    }

    public function contactpage() {
        $data['title'] = '联系我们';
        $data['menuactive'] = array('', '', 'active', '');
        $this->page('contact_view', $data);
    }

    public function productpage() {

        $this->load->library('pagination');
        $config['base_url'] = site_url('index/productpage');
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['results'] = $this->Good_model->get_items($config['per_page'], $this->uri->segment(3));

        $data['title'] = '产品列表';
        $data['menuactive'] = array('', 'active', '', '');
        $this->page('goods_list_view', $data);
    }

    public function selectpage($cpu, $mem, $disk, $gpu) {

        //echo $cpu;
        $this->load->library('pagination');
        $config['base_url'] = site_url('index/selectpage/' . $cpu . '/' . $mem . '/' . $disk . '/' . $gpu);
        //echo 
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 7;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);



        echo $this->uri->segment(7);
        $data['results'] = $this->Good_model->get_items($config['per_page'], $this->uri->segment(7));

        $data['title'] = '产品列表';
        $data['menuactive'] = array('', 'active', '', '');
        $this->page('goods_list_view', $data);
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
        $data['menuactive'] = array('', '', '', '');
        $this->page('common/error_view', $data);
    }

    public function logout() {
        $this->User_model->logout();
        $this->index();
    }

    public function ucenter() {
        /* $data['title'] = '用户中心';
          $data['menuactive'] = array('', '', '', '');
          $this->user_page('welcome_view', $data); */

        $data['title'] = '管理中心';
        $data['menuactive'] = array('', '', '', '');
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

    public function item_detail($gid) {
        $result = $this->Good_model->item_detail($gid);

        $data['results'] = $result;
        $data['title'] = '商品详情';
        $data['menuactive'] = array('', '', '', '');
        $this->page('item_detail_view', $data);
    }

    public function mod_pwd() {
        $this->User_model->auto_login();
        $data['username'] = $this->User_model->username;


        $data['title'] = '修改密码';
        $data['menuactive'] = array('', '', '', '');
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
        $data['menuactive'] = array('', '', '', '');
        $this->user_page('modify_user_view', $data);
    }

    public function select_order($username) {

        $this->load->library('pagination');
        $config['base_url'] = site_url('index/select_order/' . $username);
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $uid = $this->User_model->getUid($username);
        //echo $this->uri->segment(3);
        $data['results'] = $this->Order_model->getOrders($config['per_page'], $this->uri->segment(4), $uid);
        $data['title'] = '查询订单';
        $data['menuactive'] = array('', '', '', '');
        $this->user_page('select_orders_view', $data);
    }

    public function cancel_order($username) {
        $this->load->library('pagination');
        $config['base_url'] = site_url('index/cancel_order/' . $username);
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $uid = $this->User_model->getUid($username);
        //echo $this->uri->segment(3);
        $data['results'] = $this->Order_model->getOrders($config['per_page'], $this->uri->segment(4), $uid, 0);

        $data['title'] = '取消订单';
        $data['menuactive'] = array('', '', '', '');
        $this->user_page('cancel_orders_view', $data);
    }

    public function getUser($username) {
        $result = $this->User_model->getUser($username);
        //需要修改，先做测试
        $row = $result->result();
        $result = $row[0];
        $res = array(
            'name' => $result->udname,
            'code' => $result->udcode,
            'address' => $result->udaddress,
            'telephone' => $result->udtelephone
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
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('modify_user_view', $data);
    }

    public function admin_modify_password() {
        $this->User_model->auto_login();
        $data['username'] = $this->User_model->username;
        $data['title'] = '修改密码';
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('modify_password_view', $data);
    }

    public function admin_send_item() {
        $this->load->library('pagination');
        $config['base_url'] = site_url('index/admin_send_item');
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['results'] = $this->Order_model->getOrderAdmin($config['per_page'], $this->uri->segment(3), 0);

        $data['title'] = '发货';
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('admin_send_item_view', $data);
    }

    public function admin_delete_orders() {
        $this->load->library('pagination');
        $config['base_url'] = site_url('index/admin_delete_orders');
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['results'] = $this->Order_model->getOrderAdmin($config['per_page'], $this->uri->segment(3));

        $data['title'] = '删除订单';
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('admin_delete_orders_view', $data);
    }

    public function admin_add_item() {
        $data['title'] = '商品上架';
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('admin_add_item_view', $data);
    }

    public function admin_fall_item() {
        $this->load->library('pagination');
        $config['base_url'] = site_url('index/admin_delete_orders');
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['results'] = $this->Good_model->get_items($config['per_page'], $this->uri->segment(3));
        $data['title'] = '商品下架';
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('admin_fall_item_view', $data);
    }

    public function admin_add_amount() {

        $this->load->library('pagination');
        $config['base_url'] = site_url('index/admin_add_amount');
        $config['total_rows'] = 200; //$this->db->count_all('goods');
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '第一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '最后一页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['results'] = $this->Good_model->get_items($config['per_page'], $this->uri->segment(3));

        $data['title'] = '进货';
        $data['menuactive'] = array('', '', '', '');
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

    public function add_item() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_name'] = 'hello_';

        $this->load->library('upload', $config);

        $this->upload->do_upload('item_front_pic');
        $tmp = $this->upload->data();
        //echo $this->upload->display_errors();
        //var_dump($tmp);
        if (strcmp($tmp['file_name'], 'hello_') == 0) {
            $gtitlepic = "";
        } else {
            $gtitlepic = base_url() . 'uploads/' . $tmp['file_name'];
        }
        $this->upload->initialize($config);
        $this->upload->do_upload('item_show_pic');
        $tmp = $this->upload->data();
        //var_dump($tmp);
        if (strcmp($tmp['file_name'], 'hello_') == 0) {
            $gshowpic = "";
        } else {
            $gshowpic = base_url() . 'uploads/' . $tmp['file_name'];
        }


        $gname = $this->input->post('item_name');
        $gprice = $this->input->post('item_price');
        $goption = $this->input->post('item_simple');
        $gdiscribe = $this->input->post('editorValue');
        $gcpu = $this->input->post('cpu');
        $gmemory = $this->input->post('memory');
        $gdisk = $this->input->post('disk');
        $ggpu = $this->input->post('gpu');
        $gother = $this->input->post('other');

        $data = array(
            'gname' => $gname,
            'gprice' => $gprice,
            'gtitlepic' => $gtitlepic,
            'gshowpic' => $gshowpic,
            'goption' => $goption,
            'gdiscribe' => $gdiscribe,
            'gcpu' => $gcpu,
            'gmemory' => $gmemory,
            'gdisk' => $gdisk,
            'ggpu' => $ggpu,
            'gother' => $gother
        );

        $this->Good_model->add_item($data);

        $this->admin_add_item();
    }

    public function item_cancel($oid) {
        $this->Order_model->item_cancel($oid);
        $this->ucenter();
    }

    public function item_send($oid) {
        $this->Order_model->item_cancel($oid);
        redirect('index/admin_send_item');
    }

    public function order_delete($oid) {
        $this->Order_model->order_delete($oid);
        redirect('index/admin_delete_orders');
    }

    public function item_fall($gid) {
        $this->db->where('gid', $gid);
        $this->db->update('goods', array('gstatus' => 1));
        redirect('index/admin_fall_item');
    }

    public function add_item_amount() {
        $gid = $this->input->post('item_id');
        $gamount = $this->input->post('item_amount');
        $gprice = $this->input->post('item_price');

        $this->db->where('gid', $gid);
        $this->db->update('goods', array('gamount' => $gamount, 'gprice' => $gprice));

        echo '更新成功';
    }

    public function admin_add_show() {
        $data['title'] = '添加到拉幕';
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('add_show_item_view', $data);
    }

    public function admin_add_product() {
        $data['title'] = '添加到首页';
        $data['menuactive'] = array('', '', '', '');
        $this->admin_page('add_product_item_view', $data);
    }

    public function add_show_item() {
        $gid = $this->input->post('show_item_name');
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_name'] = 'hehe_';

        $this->load->library('upload', $config);

        $this->upload->do_upload('show_item_pic');
        $tmp = $this->upload->data();
        //echo $this->upload->display_errors();
        //var_dump($tmp);
        if (strcmp($tmp['file_name'], 'hello_') == 0) {
            $sshowpic = "";
        } else {
            $sshowpic = base_url() . 'uploads/' . $tmp['file_name'];
        }
        
        $data['gid'] = $gid;
        $data['sshowpic'] = $sshowpic;
        
        $this->db->insert('show_items',$data);
        $this->index();
    }

    public function add_product_item() {
        $gid = $this->input->post('product_item_name');
        $ptext = $this->input->post('product_item_text');

        $data['gid'] = $gid;
        $data['pshowtext'] = $ptext;

        $this->db->insert('product_items', $data);
        $this->index();
    }

}
