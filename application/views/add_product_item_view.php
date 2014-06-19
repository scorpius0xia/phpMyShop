<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form class="form-group" action="<?php echo site_url('index/add_product_item');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">商品编号</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="product_item_name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">文字说明</h4>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" name="product_item_text" rows="10" ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
                    <button class="btn btn-block btn-success btn-submit" type="submit">添加到首页</button>
                </div>
            </div>
        </form>
    </div>
</div>
