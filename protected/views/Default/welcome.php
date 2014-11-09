<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
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
</body>
</html>