<?php
$res = $results->result();
$row = $res[0];
?>
<script type="text/javascript">
    $().ready(function() {
        $('#goOrder').submit(function() {
            $.post('<?php echo site_url('index/getUser/' . $username); ?>', {},
                    function(data) {
                        $('#item_name').val($('#iname').text());
                        $('#item_no').val($('#ino').text());
                        $('#user_name').val(data.name);
                        $('#user_address').val(data.address);
                        $('#user_code').val(data.code);
                        $('#user_telephone').val(data.telephone);
                    }, "json");
            $('#item_amount').val($('#amount').val());
            var tol = parseInt($('#amount').val());
            tol = tol * <?php echo $row->gprice; ?>;
            $('#tol_price').text(tol);
            $('#goModal').modal('show');
            return false;
        });
        $('#form-submit-order').submit(function() {
            $.post('<?php echo site_url('item/submit_order/' . $username); ?>',
                    {
                        item_name: $('#item_name').val(),
                        item_no: $('#item_no').val(),
                        item_amount: $('#item_amount').val(),
                        user_name: $('#user_name').val(),
                        user_address: $('#user_address').val(),
                        user_code: $('#user_code').val(),
                        user_telephone: $('#user_telephone').val(),
                        total: $('#tol_price').text()
                    }, function(data) {
                //$('#submit_status').text(data);
                alert(data);
                $('#goModal').modal('hide');
                location.reload();
            }
            );
            return false;
        });
        $('#addToTrolley').click(function() {
            alert('加入购物车成功');
        });

    });
</script>

<div class="container marketing-content">
    <div class="row featurette">
        <div class="col-md-7">
            <img class="img-thumbnail img-responsive" src="<?php echo $row->gshowpic; ?>">
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <h3 id="iname"><?php echo $row->gname; ?></h3>
                    <p><?php echo $row->goption;?></p>
                    <?php if($row->gstatus == 1){?>
                    <h4>已下架</h4>
                    <?php }?>
                </div>
            </div>
            <hr class="item-hr">
            <div class="row">
                <div class="col-md-2">
                    <h4 class="text-right">编号:</h4>
                </div>
                <div class="col-md-4">
                    <h4 class="text-left" id="ino"><?php echo $row->gid; ?> </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <h4 class="text-right">价格:</h4>
                </div>
                <div class="col-md-4">
                    <h4 class="text-left" id="per_price">￥<?php echo $row->gprice; ?> </h4>
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
                        <h5 id="leftAmount" class="text-left"><?php echo $row->gamount; ?></h5>
                    </div>
                </div>
                <div class="row marketing-content">
                    <div class="col-md-4 col-md-offset-1">
                        <button class="btn btn-block btn-danger" type="submit" <?php if ($username === '' || $username == null || $row->gstatus == 1) echo "disabled=\"disabled\"" ?>>立即购买</button>
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
                <?php echo $row->gdiscribe; ?>
            </div>
            <div class="tab-pane fade" id="size">
                <div class="table-content">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">处理器：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left"><?php echo $row->gcpu; ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">内存：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left"><?php echo $row->gmemory; ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">硬盘：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left"><?php echo $row->gdisk; ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">显卡：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left"><?php echo $row->ggpu; ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="text-right">特别说明：</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left"><?php echo $row->gother; ?></h4>
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
                            <form class="form-group" id="form-submit-order">
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
                                    <input class="form-control" id="item_amount" type="number" readonly>
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
                                    <h4 class="col-lg-4" id="submit_status"></h4>
                                    <h4 class="col-lg-3">总价:</h4>
                                    <h4 class="col-lg-3"id="tol_price"></h4>
                                </div>
                                <div class="col-8 col-lg-8 col-lg-offset-2 form-register-item">
                                    <button type="submit" class="btn btn-block btn-success btn-submit btn-lg" id="submit_order">提交订单</button>
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