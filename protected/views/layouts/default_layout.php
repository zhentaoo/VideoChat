<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css">
    <script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/jquery-1.11.1.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/login.js"></script>
</head>
<html>
<body>
<style>
    .error_style {
        margin-top: 6px;
    }
</style>
<div class="container-fluid">
    <!--头部-->
    <div class="row navbar-fixed-top"
         style="background-color: #000000;opacity: 0.85 ;padding-bottom: 7px;padding-top: 7px">
        <div class="col-lg-10  col-xs-7 " style="padding-left: 4%">

            <button type="button" id="test" class="btn btn-default">欢迎来到这个碉堡了的网站</button>

        </div>
        <div class="col-lg-2 col-xs-5">
            <!-- Button trigger modal -->
            <button id="real-login" data-toggle="modal"
                    data-target="#myModal_login" class="btn btn-primary" style="margin-left: 5%">
                登录
            </button>
            <button id="real-register" data-toggle="modal"
                    data-target="#myModal_register" class="btn btn-primary" style="margin-left: 4%">
                注册
            </button>

        </div>
    </div>
    <!--头部结束-->

    <!--中间-->
    <div class="row" style="margin-top: 60px;margin-bottom: 20px" >
        <!--正文-->
        <div class="col-lg-10 col-lg-offset-1 col-xs-10 col-xs-offset-1 "
             style="border: 1px solid #d3d3d3;border-radius: 8px;padding:10px">
            <?php echo $content ?>
        </div>
        <!--正文结束-->
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