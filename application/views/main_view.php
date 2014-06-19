
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>-->
        <?php
        $row_nums = $res1->num_rows();
        for ($i = 0; $i < $row_nums; $i ++) {
            ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
        <?php } ?>
    </ol>
    <?php
    $res1 = $res1->result();
    $row = $res1[0];
    ?>
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo $row->sshowpic; ?>" >
            <div class="container">
                <div class="carousel-caption">
                    <h1><h1><?php
                            $tmp = $this->Good_model->item_detail($row->gid);
                            $tmp = $tmp->result();
                            echo $tmp[0]->gname;
                            ?></h1></h1>
                    <p>
                        <?php echo $tmp[0]->goption; ?>
                    </p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="<?php echo site_url('index/item_detail/' . $row->gid); ?>" role="button">查看详情</a>
                    </p>
                </div>
            </div>
        </div>
        <?php
        for ($i = 1; $i < $row_nums; $i ++) {
            $row = $res1[$i];
            ?>
            <div class="item">
                <img src="<?php echo $row->sshowpic; ?>" >
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php
                            $tmp = $this->Good_model->item_detail($row->gid);
                            $tmp = $tmp->result();
                            echo $tmp[0]->gname;
                            ?></h1>
                        <p>
                            <?php echo $tmp[0]->goption; ?>
                        </p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('index/item_detail/' . $row->gid); ?>" role="button">查看详情</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<!-- /.carousel -->

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <?php
        $row_nums = $res2->num_rows();
        $res2 = $res2->result();
        for ($i = 0; $i < $row_nums; $i ++) {
            $row = $res2[$i];
            $tmp = $this->Good_model->item_detail($row->gid);
            $tmp = $tmp->result();
            ?>
            <div class="col-lg-4 ">
                <img class="img-circle img-responsive" src="<?php echo $tmp[0]->gtitlepic; ?>" alt="Generic placeholder image">
                <h2><?php echo $tmp[0]->gname; ?></h2>
                <p>
                    <?php echo $row->pshowtext; ?>
                </p>
                <p>
                    <a class="btn btn-default" href="<?php echo site_url('index/item_detail/' . $tmp[0]->gid); ?>" role="button">查看详情 &raquo;</a>
                </p>
            </div>
        <?php } ?>

    </div>

    <?php
    $row_nums = $res3->num_rows();
    $res3 = $res3->result();
    for ($i = 0; $i < $row_nums; $i ++) {
        $row = $res3[$i];
        $tmp = $this->Good_model->item_detail($row->gid);
        $tmp = $tmp->result();
        if ($i % 2 == 0) {
            ?>
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <p class="lead">
                        <?php echo $row->pshowtext; ?>
                    </p>
                </div>
                <div class="col-md-5">
                    <a href="<?php echo site_url('index/item_detail/' . $tmp[0]->gid); ?>"><img class="featurette-image img-responsive thumbnail"  alt="Generic placeholder image" src="<?php echo $tmp[0]->gtitlepic; ?>"></a>
                </div>
            </div>
        <?php } else { ?>
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-5">
                    <a href="<?php echo site_url('index/item_detail/' . $tmp[0]->gid); ?>"><img class="featurette-image img-responsive thumbnail"  alt="Generic placeholder image" src="<?php echo $tmp[0]->gtitlepic; ?>"></a>
                </div>
                <div class="col-md-7">
                    <p class="lead">
                        <?php echo $row->pshowtext; ?>
                    </p>
                </div>

            </div>
        <?php } ?>

    <?php } ?>
</div>



