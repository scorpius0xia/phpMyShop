<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 table-title-item">
                <h4 class="text-center">商品名称</h4>
            </div>
            <div class="col-md-1 table-title-item">
                <h4 class="text-center ">数量</h4>
            </div>
            <div class="col-md-2 table-title-item">
                <h4 class="text-center">总价</h4>
            </div>
            <div class="col-md-3 table-title-item">
                 <h4 class="text-center">下单时间</h4>
            </div>
            <div class="col-md-1 table-title-item">
                 <h4 class="text-center">操作</h4>
            </div>
        </div>
        <?php
        $res = $results->result();
        foreach ($res as $row){
        ?>
        <div class="row">
            <div class="col-md-4 table-item">
                <p class="text-center"><a href="<?php echo site_url('index/item_detail/'.$row->gid);?>"><?php echo $row->gname;?></a></p>
            </div>
            <div class="col-md-1 table-item">
                <p class="text-center "><?php echo $row->oamount;?></p>
            </div>
            <div class="col-md-2 table-item">
                <p class="text-center"><?php echo $row->ototal;?></p>
            </div>
            <div class="col-md-3 table-item">
                 <p class="text-center"><?php echo $row->odate;?></p>
            </div>
            <div class="col-md-1 table-item">
                <p class="text-center"><a href="<?php echo site_url('index/item_cancel/'.$row->oid);?>">取消</a></p>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>