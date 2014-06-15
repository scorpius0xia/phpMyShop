<script type="text/javascript">
    $().ready(function() {
        $('#goOrder').submit(function() {
            /*$.post('<?php echo site_url('index/getUser/' . $username); ?>',{},
             function (data){
             //alert("成功");
             $('#usernamex').val(data.username);
             $('#passwordx').val(data.password);
             $('#emailx').val(data.email);
             
             
             },"json");*/
            $('#item_amount').val($('#amount').val());
            $('#goModal').modal('show');
            return false;
        });
        $('#submit_order').click(function() {
            alert('提交成功');
        });
        $('#addToTrolley').click(function() {
            alert('加入购物车成功');
        });

    });
</script>
<div class="container marketing-content">
    <div class="row featurette">
        <div class="col-md-7">
            <img class="img-thumbnail img-responsive" src="<?php echo base_url('public/image/lenovo_show.jpg'); ?>">
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <h3>Lenovo G410AM-IFI(H) (金属黑)</h3>
                    <p class="close-to">英特尔® 酷睿Haswell双核处理器</p>
                    <p class="close-to">Linpus Lite简体中文版</p>
                    <p class="close-to">4GB内存/500GHDD硬盘</p>
                    <p class="close-to">14.0’HD LED显示屏</p>
                </div>
            </div>
            <hr class="item-hr">
            <div class="row">
                <div class="col-md-2">
                    <h4 class="text-right">价格:</h4>
                </div>
                <div class="col-md-4">
                    <h4 class="text-left">￥4799.00 </h4>
                </div>
            </div>
            <hr class="item-hr">
            <form class="form-group" id="goOrder">
                <div class="row">
                    <div class="col-md-2">
                        <h4 class="text-right">数量:</h4>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" id="amount" required>
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-right">库存:</h4>
                    </div>
                    <div class="col-md-2">
                        <h5 id="leftAmount" class="text-left">100000</h5>
                    </div>
                </div>
                <div class="row marketing-content">
                    <div class="col-md-4 col-md-offset-1">
                        <button class="btn btn-block btn-danger" type="submit">立即购买</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-block btn-danger" id="addToTrolley">加入购物车</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr class="item-hr">
    <div class="row">
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#describe" data-toggle="tab">商品描述</a></li>
            <li><a href="#size" data-toggle="tab">规格配置</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="describe">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
            </div>
            <div class="tab-pane fade" id="size">
                <div class="table-content">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">处理器：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">第四代智能英特尔® 酷睿™ i7 处理器i7-4500U</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">内存：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">4GB DDR3</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">硬盘：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">1TB HDD</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">无线局域网卡：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">WIFI BGN无线局域网卡</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">光驱：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">超级DVD刻录</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">显示屏：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">14英寸LED背光高清炫彩屏</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">显卡：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">AMD Radeon™ R5 M230独立显卡</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">显示内存：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">2G DDR3L</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">键盘：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">联想高触感巧克力键盘</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">标准接口：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">1*USB 3.0接口，2*USB 2.0接口，VGA，HDMI-out，RJ45，二合一读卡器</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">特别说明：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">联想会尽力为您提供标准、全面的信息，但不对信息中可能出现的错误或遗漏承担责任。产品图片仅供参考，请以销售实物为准。以上内容如有变动，恕不另行通知。 </h4>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div id="goModal" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">订单提交</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <form class="form-group">
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <label for="item_name">商品名称</label>
                                    <input class="form-control" id="item_name" type="text" readonly>
                                </div>
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <label for="item_no">商品编号</label>
                                    <input class="form-control" id="item_no" type="text" readonly>
                                </div>
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <label for="item_amount">数量</label>
                                    <input class="form-control" id="item_amount" type="number">
                                </div>
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <label for="user_name">收件人姓名</label>
                                    <input class="form-control" id="user_name" type="text">
                                </div>
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <label for="user_address">收件人地址</label>
                                    <input class="form-control" id="user_address" type="text">
                                </div>
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <label for="user_code">邮政编码</label>
                                    <input class="form-control" id="user_code" type="text">
                                </div>
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <label for="user_telephone">电话号码</label>
                                    <input class="form-control" id="user_telephone" type="text">
                                </div>

                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <button class="btn btn-block btn-success btn-submit btn-lg" id="submit_order">提交订单</button>
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