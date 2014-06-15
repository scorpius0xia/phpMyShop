<div class="container marketing-content">
    <div  data-offset-top="60" data-offset-bottom="200">
        <div class="col-3 col-lg-3" role="complementary">
            <div class="accordion nav nav-tabs nav-stacked" id="accordion2"  
                 data-offset-top="60" data-offset-bottom="200">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle btn btn-block btn-primary" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            用户中心
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" id="admin_modify_user" href="<?php echo site_url('index/admin_modify_user');?>">修改资料</a>
                        </div>
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" id="admin_modify_password" href="<?php echo site_url('index/admin_modify_password');?>">修改密码</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle btn btn-block btn-primary" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                            订单管理
                        </a>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" id="admin_send_item" href="<?php echo site_url('index/admin_send_item');?>">发货</a>
                        </div>
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" id="admin_delete_orders" href="<?php echo site_url('index/admin_delete_orders');?>">删除订单</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle btn btn-block btn-primary" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            商品管理
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" id="admin_add_item" href="<?php echo site_url('index/admin_add_item');?>">商品上架</a>
                        </div>
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" id="admin_fall_item" href="<?php echo site_url('index/admin_fall_item');?>">商品下架</a>
                        </div>
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" id="admin_add_amount" href="<?php echo site_url('index/admin_add_amount');?>">进货</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9 col-lg-9" id="admin_main_show">