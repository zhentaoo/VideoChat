<script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/bootstrap.js"></script>

<div class="col-lg-9 col-lg-offset-1 col-xs-9 col-xs-offset-1 "
     style="min-height: 550px;border: 1px solid #d3d3d3;border-radius: 8px;margin-top:60px;margin-bottom: 10px;">
    welcom!!!!!!!!!!!!!!!!<?php /**在user组件里有一个方法getIsGuest(),判断用户是否是游客**/
    if (Yii::app()->user->getIsGuest()) {
        ?>
        <a href="login">登录</a>
        <a href="register">注册</a>
    <?php
    } else {
        echo '<font color="#daa520">' . Yii::app()->user->name . '</font>';
    } ?><br>
    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/1.jpg" width="700px" height="400px">


</div>
<!--正文结束-->

<!--侧边导航栏-->
<div class="col-lg-2 col-xs-2" style="margin-top: 60px;">
    <button type="button" id="hehe" class="btn btn-default" data-toggle="tooltip" data-placement="right"
            title="这是bootstrap tooltip插件，使用时需要使用js初始化一下"><font font-size="1">私&nbsp;人&nbsp;的&nbsp;</font>
    </button>
</div>
<!--侧边导航栏结束-->
