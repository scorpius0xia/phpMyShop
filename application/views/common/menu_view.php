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
                                    <a href="<?php echo site_url("index/ucenter"); ?>"><?php echo $username; ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("index/logout"); ?>">退出</a>
                                </li>
                            <?php } ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    购物车 <span class="badge pull-right">0</span>

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
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div id="registerModal" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">用户注册</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <form class="form-group" action="<?php echo site_url('index/register'); ?>" method="post">
                                    <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                        <label for="username">账号：</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                    </div>
                                    <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                        <label for="password">密码：</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                        <label for="repeat">重复：</label>
                                        <input type="password" class="form-control" name="repeat" id="repeat" required>
                                    </div>
                                    <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                        <label for="email">电子邮箱：</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                        <a href="">服务条约</a>
                                        <button type="submit" class="btn btn-block btn-success btn-submit btn-lg">同意相关条约并注册</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="loginModal" class="modal fade in">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">登录</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <form class="form-group" action="<?php echo site_url('index/login'); ?>" method="post">
                                    <div class="col-12 col-lg-12 form-register-item">
                                        <label for="username">账号：</label>
                                        <input type="text" name="username" id="username" class="form-control" required>
                                    </div>
                                    <div class="col-12 col-lg-12 form-register-item">
                                        <label for="password">密码：</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <div class="col-12 col-lg-12 form-register-item">
                                        <button type="submit" class="btn btn-block btn-success btn-submit-sm">登录</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
