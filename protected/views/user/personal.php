<script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/bootstrap.js"></script>


<div class="col-lg-9 col-lg-offset-1 col-xs-9 col-xs-offset-1 "
     style="min-height: 550px;border: 1px solid #d3d3d3;border-radius: 8px;margin-top:60px;margin-bottom: 10px;">
    <h1>个人信息</h1>
    我的名字:<?php echo Yii::app()->user->name ?><br><br>
    我的邮箱:<?php $user = new User();
    $email = $user->find('user_name=:user_name', array(':user_name' => Yii::app()->user->name))->email;
    echo $email;
    ?>
    <br><br>
    我的当前头像
    <a href="./upfile">修改头像</a>
    <br> <br>
    <?php $user = new User();
    $email = $user->find('user_name=:user_name', array(':user_name' => Yii::app()->user->name))->id;
    $img = new Img();
    @$url = $img->find('name=:name', array(':name' => Yii::app()->user->name))->url;
    //    echo $url;
    ?>
    <img src="<?php if ($url != null) {
        echo Yii::app()->request->baseUrl . '/' . $url;
    } else echo Yii::app()->request->baseUrl . '/images/nopic.jpg'?>" width="300px" height="280px"
         style="border-radius: 10px">

</div>
<!--正文结束-->

<!--侧边导航栏-->
<div class="col-lg-2 col-xs-2" style="margin-top: 60px;">
    <button type="button" id="hehe" class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="right"
            title="还没想好要干嘛"><font font-size="1">私&nbsp;人&nbsp;的&nbsp;</font>
    </button>
    <br><br>
    <button type="button" id="hehe2" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right"
            title="不用再碰了"><font font-size="1">私&nbsp;人&nbsp;的&nbsp;</font>
    </button>
    <br><br>

    <button type="button" id="hehe3" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="right"
            title="真的没想好"><font font-size="1">私&nbsp;人&nbsp;的&nbsp;</font>
    </button>
</div>
<!--侧边导航栏结束-->
