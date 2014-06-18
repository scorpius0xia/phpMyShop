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
                            <a class="btn btn-block btn-default" href="<?php echo site_url('index/mod_user');?>">修改资料</a>
                        </div>
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" href="<?php echo site_url('index/mod_pwd');?>">修改密码</a>
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
                            <a class="btn btn-block btn-default" href="<?php echo site_url('index/select_order/'.$username);?>">查询订单</a>
                        </div>
                        <!--<div class="accordion-inner">
                            <a class="btn btn-block btn-default" href="<?php echo site_url('index/ucenter/4');?>">修改订单</a>
                        </div>-->
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" href="<?php echo site_url('index/cancel_order/'.$username);?>">取消订单</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle btn btn-block btn-primary" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            帮助中心
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" href="<?php echo site_url('index/help_faq');?>">常见问题</a>
                        </div>
                        <div class="accordion-inner">
                            <a class="btn btn-block btn-default" href="<?php echo site_url('index/help_talk');?>">客服咨询</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9 col-lg-9">