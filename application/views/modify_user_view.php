<script type="text/javascript">
    $().ready(function() {
        $('#userModify').submit(function() {
            alert($("#uname").val() + $("#udname").val() + $("#udaddress").val()+$("#udcode").val()+$("#udtelephone").val());
            
            $.post('<?php echo site_url('index/saveUser'); ?>',
                    {
                        uname: $("#uname").val(),
                        udname: $("#udname").val(),
                        udaddress: $("#udaddress").val(),
                        udcode: $("#udcode").val(),
                        udtelephone: $("#udtelephone").val()
                    },
            function(data) {
                $("#resultArea").html(data);
            }
            );
            return false;
        });
    });
</script>

<div class="row">
    <div class="col-md-10 col-md-offset-1 tab-content">
        <form class="form-group" id="userModify">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">账号：</h4>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="text" value="<?php echo $result->uname; ?>" id="uname" readonly>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">姓名：</h4>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="text" value="<?php echo $result->udname; ?>" id="udname">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">收件地址：</h4>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="text" value="<?php echo $result->udaddress; ?>" id="udaddress">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">邮政编码：</h4>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="text" value="<?php echo $result->udcode; ?>" id="udcode">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">电话号码：</h4>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="text" value="<?php echo $result->udtelephone; ?>" id="udtelephone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" id="resultArea">

                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-block btn-success btn-submit">保存修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
