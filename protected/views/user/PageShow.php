<script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/bootstrap.js"></script>

<div class="col-lg-9 col-lg-offset-1 col-xs-9 col-xs-offset-1 "
     style="min-height: 550px;border: 1px solid #d3d3d3;border-radius: 8px;margin-top:60px;margin-bottom: 10px;">
    <h2>user表信息</h2>
    <table class="table table-hover ">
        <tr>
            <td>用户名</td>
            <td>密码</td>
        </tr>
        <?php
        foreach ($user_infos as $_v) {
            ?>
            <tr>
                <td><?php echo $_v->user_name; ?></td>
                <td><?php echo $_v->password; ?></td>
            </tr>
        <?php } ?>
    </table>
    <h5>
        <ul class="pagination "><?php echo $page_list; ?></ul>
    </h5>
</div>
<!--正文结束-->

<!--侧边导航栏-->
<div class="col-lg-2 col-xs-2" style="margin-top: 60px;">
    <button type="button" id="hehe" class="btn btn-default" data-toggle="tooltip" data-placement="right"
            title="这是bootstrap tooltip插件，使用时需要使用js初始化一下"><font font-size="1">分&nbsp;页&nbsp;显&nbsp;示</font>
    </button>
</div>
<!--侧边导航栏结束-->