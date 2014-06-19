<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form class="form-group" action="<?php echo site_url('index/add_show_item');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">商品编号</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="show_item_name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">拉幕图片</h4>
                </div>
                <div class="col-md-6">
                    <input class="input-file" type="file" name="show_item_pic">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
                    <button class="btn btn-block btn-success" type="submit">添加到拉幕</button>
                </div>
            </div>
        </form>
    </div>
</div>
