<script type="text/javascript">
    $().ready(function(){
        $('#select_item_form').submit(function(){
            var cpu = $('#info_cpu').val();
            var mem = $('#info_mem').val();
            var hd = $('#info_hd').val();
            var gpu = $('#info_gpu').val();
            alert(cpu);
            window.open("<?php echo site_url('index/selectpage');?>" + "/"
                    + cpu + "/" + mem + "/" + hd + "/" + gpu);
        });
    });
</script>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <form class="form-group" id="select_item_form">
                <div class="container marketing-content">
                    <div class="col-md-2">
                        <select class="mbn" id="info_cpu">
                            <option value="Intel i5 酷睿">Intel i5 酷睿</option>
                            <option value="Intel i7 4511 mx">Intel i7 4511 mx</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="mbn" id="info_mem">
                            <option value="0">4GB DDR3</option>
                            <option value="1">8GB DDR3</option>
                        </select>
                    </div>
                    <div class="col-md-2 center-block">
                        <select class="mbn" id="info_hd">
                            <option value="0">64GB SSD</option>
                            <option value="1">1TB HDD</option>
                        </select>
                    </div>
                    <div class="col-md-2 center-block">
                        <select class="mbn" id="info_gpu">
                            <option value="0">NVIDIA GTX 650 Ti Boost</option>
                            <option value="1">AMD HD8625</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <button type="submit" class="btn btn-default">筛选</button>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <script type="text/javascript">
            $("select").selectpicker({style: 'btn btn-embossed btn-primary', menuStyle: 'dropdown-inverse'});
        </script>
        <!--===========goodslist============-->
        <!-- Three columns of text below the carousel -->
        <br />
        <br />
        <br />
        <br />
        <br />
        <!--============row1==================-->
        <div class="row">
            <?php
            $res = $results->result();
            foreach($res as $row){
            ?>
            <div class="col-md-3">
                <img class="img-responsive img-thumbnail" src="<?php echo $row->gtitlepic;?>" alt="Generic placeholder image">
                <h2><?php echo $row->gname;?></h2>
                <p>
                    <?php echo $row->goption;?>
                </p>
                <p>
                    <a class="btn btn-default" href="<?php echo site_url('index/item_detail/'.$row->gid);?>" role="button">View details &raquo;</a>
                </p>
            </div>
            <?php } ?>
            <!-- /.col-md-4 -->
            
        </div>
        <!--=================/row1=================-->
 
    </div>
    <!--===========end goodslist============-->
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>