<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css">
    <script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/jquery-1.11.1.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/login.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/latest.js"></script>
</head>
<html>
<body>

<div class="container-fluid">
    <!--头部-->
    <div class="row navbar-fixed-top"
         style="min-width: 500px;background-color: #000000;opacity: 0.85 ;padding-bottom: 7px;padding-top: 7px">
        <div class="col-lg-10  col-xs-7 " style="padding-left: 4%">
            <!--下拉按钮-->
            <div class="btn-group">
                <button type="button" class="btn btn-default" id="personal"><font
                        color="green"><?php echo Yii::app()->user->name ?></font>的主页
                </button>
                <button type="button"
                        class="btn btn-default" id="video">
                    视频大厅
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        网站声明与简介
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo SITE_URL ?>user/PageShow">PageShow</a></li>
                        <li><a href="<?php echo SITE_URL ?>user/show">Show</a></li>
                    </ul>
                </div>
            </div>
            <!--下拉按钮结束-->
        </div>
        <div class="col-lg-2 col-xs-5">
            <!-- Button trigger modal -->
            <img width="45px" height="35px" style="border-radius: 5px;margin-left: 20%"
                 src="/<?php echo Yii::app()->name.'/';
                 $name = Yii::app()->user->name;
                 $img = new Img();
                 $var = $img->find('name=:name', array(':name' => $name));
                 if ($var == null)
                     echo 'images/nopic.jpg';
                 else
                     echo $var->url;
                 ?>
                ">

            <button id="logout" class="btn btn-primary"
                    onclick="javascript:window.location.href='/VideoChat/index.php/default/logout'"
                    style="margin-left:10%;width: 48px">
                退出
            </button>

        </div>
    </div>
    <!--头部结束-->

    <!--中间-->
    <div class="row">
        <?php echo $content ?>
    </div>
    <!--中间结束-->

    <!--脚部-->
    <div class="row">
        <div class="panel-footer "> * Created by zhentaoo.
            * Date: 2014/10/22
            * Time: 12:00
        </div>
    </div>
    <!--脚部结束-->
</div>
</body>
</html>