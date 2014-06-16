<script type="text/javascript">
        $().ready(function() {
        $('#pwd_form').submit(function() {
            alert("提交?");
            $.post('<?php echo site_url('index/savePwd'); ?>',
                    {
                        ori_pwd: $("#ori_pwd").val(),
                        new_pwd: $("#new_pwd").val(),
                        uname: "<?php echo $username;?>"
                    },
            function(data) {
                $("#okArea").html(data);
            }
            );
            return false;
        });
    });
</script>
<div class="row">
    <div class="col-md-10 col-md-offset-1 tab-content">
        <form class="form-group" id="pwd_form">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">原密码：</h4>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="password" id="ori_pwd" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">新密码：</h4s>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="password" id="new_pwd" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-right">重复密码：</h4>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="password" id="rpt_pwd" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" id="okArea">
                    
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-block btn-success btn-submit">保存修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
