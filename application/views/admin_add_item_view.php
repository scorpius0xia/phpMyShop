<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form class="form-group" action="<?php echo site_url('index/add_item');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">商品名称</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="item_name">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">商品价格</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="item_price">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">封面图片</h4>
                </div>
                <div class="col-md-6">
                    <input class="input-file" type="file" name="item_front_pic">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">展示图片</h4>
                </div>
                <div class="col-md-6">
                    <input class="input-file" type="file" name="item_show_pic">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">商品简介</h4>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" name="item_simple"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">商品详情</h4>
                </div>
                <div class="col-md-6">
                    <script type="text/plain" id="myEditor" class="myEditor form-control editor-height"></script>
                    <script type="text/javascript">
                        var editor = UM.getEditor('myEditor');
                    </script> 

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">处理器型号</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="cpu">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">内存类型</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="memory">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">硬盘类型</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="disk">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">显卡型号</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="gpu">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-right">其他描述</h4>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="other">
                </div>
            </div>



            <<div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
                    <button class="btn btn-block btn-success" type="submit">商品上架</button>
                </div>
            </div>
        </form>
    </div>
</div>