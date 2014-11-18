<script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/bootstrap.js"></script>

<div class="col-lg-9 col-lg-offset-1 col-xs-9 col-xs-offset-1 "
     style="min-height: 550px;border: 1px solid #d3d3d3;border-radius: 8px;margin-top:60px;margin-bottom: 10px;">
    <h2>user表信息</h2>
    <table class="table table-hover ">
        <tr>
            <td>用户名</td>
            <td>邮箱</td>
        </tr>
        <?php
        foreach ($user_infos as $_v) {
            ?>
            <tr>
                <td><?php echo $_v->user_name; ?></td>
                <td><?php echo $_v->email; ?></td>
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
    <img src="/VideoChat/images/wechat.jpg" style="border-radius: 8px;height:170px;width: 170px">
    <br><br>
    <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="right"
            id="wechat" title="加我微信哦！！！">扫一扫
    </button>
    <br>
    <div style="color: #3851e2;font-size: large;width: 90%">
        <marquee scrollamount="2" direction=up>
            QQ：1904974327<br><br><br>
            脱下长日的假面<br>
            奔向梦幻的疆界<br>
            南瓜马车的午夜<br>
            换上童话的玻璃鞋<br>
        </marquee>
    </div>
</div>
<!--侧边导航栏结束-->