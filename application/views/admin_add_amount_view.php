<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2 col-md-offset-1 table-title-item">
                <h4 class="text-center">商品编号</h4>
            </div>
            <div class="col-md-4 table-title-item">
                <h4 class="text-center">商品名称</h4>
            </div>
            <div class="col-md-1 table-title-item">
                <h4 class="text-center ">数量</h4>
            </div>
            <div class="col-md-2 table-title-item">
                <h4 class="text-center">单价</h4>
            </div>
            <div class="col-md-1 table-title-item">
                <h4 class="text-center">操作</h4>
            </div>
        </div>
        <?php
        $res = $results->result();
        foreach ($res as $row) {
            ?>
            <script type="text/javascript">

                $().ready(function() {
                    $('#form_add_<?php echo $row->gid; ?>').submit(function() {
                        $.post('<?php echo site_url('index/add_item_amount'); ?>',
                                {
                                    item_id: '<?php echo $row->gid; ?>',
                                    item_amount: $('#item_amount_<?php echo $row->gid; ?>').val(),
                                    item_price: $('#item_price_<?php echo $row->gid; ?>').val()
                                }, function($data) {
                                    alert($data);
                        }
                        );
                        return false;
                    });
                });

                $().ready(function() {
                    $('#submit_<?php echo $row->gid; ?>').click(function() {
                        $('#form_add_<?php echo $row->gid; ?>').submit();
                    });
                });
            </script>
            <div class="row">
                <form class="form-group" id="form_add_<?php echo $row->gid; ?>" name="form_add_<?php echo $row->gid; ?>">
                    <div class="col-md-2 col-md-offset-1 table-item">
                        <p class="text-center"><?php echo $row->gid; ?></p>
                    </div>
                    <div class="col-md-4 table-item">
                        <p class="text-center"><?php echo $row->gname; ?></p>
                    </div>
                    <div class="col-md-1 table-nopad">
                        <input type="text" class="form-control input-sm" id="item_amount_<?php echo $row->gid; ?>" value="<?php echo $row->gamount; ?>">
                    </div>
                    <div class="col-md-2 table-nopad">
                        <input type="text" class="form-control input-sm" id="item_price_<?php echo $row->gid; ?>" value="<?php echo $row->gprice; ?>">
                    </div>
                    <div class="col-md-1 table-item">
                        <p class="text-center"> <a href="" id="submit_<?php echo $row->gid; ?>">更新</a></p>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
