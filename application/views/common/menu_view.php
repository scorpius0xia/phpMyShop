<body>
    <div class="navbar-wrapper">
        <div class="container">

            <div class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url(''); ?>"><?php echo $brand; ?></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo $menuactive[0]; ?>">
                                <a href="<?php echo site_url(); ?>">主页</a>
                            </li>
                            <li class="<?php echo $menuactive[1]; ?>">
                                <a href="<?php echo site_url('index/aboutpage'); ?>">关于</a>
                            </li>
                            <li class="<?php echo $menuactive[2]; ?>">
                                <a href="<?php echo site_url('index/contactpage'); ?>">联系我们</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Nav header</li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                    <li>
                                        <a href="#">One more separated link</a>
                                    </li>
                                </ul>
                            </li><!--end dropdown-menu-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right" style="margin-right:18px">
                            <?php if ($status == FALSE) { ?>
                                <li class="">
                                    <a data-toggle="modal" href="#loginModal">登录</a>
                                </li>
                                <li>
                                    <a data-toggle="modal" href="#registerModal">注册</a>
                                </li>
                                <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo site_url("index/ucenter"); ?>"><?php echo $username;?></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("index/quit"); ?>">退出</a>
                                </li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
