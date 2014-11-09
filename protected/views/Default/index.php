<?php if ($psw_error == true) { ?>
    <script>
        $(function () {
            $("#real-login").click();
        })
    </script>
<?php } ?>

<?php if ($rgs_error == true) { ?>
    <script>
        $(function () {
            $("#real-register").click();
        })
    </script>
<?php } ?>
<script>
    $(function () {
        $("#register_login").click(
            function () {
                $("#real-login").click();
            }
        )
    })
</script>


<!-- Modal 登录 -->
<div class="modal fade" id="myModal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModalLabel" style="color:RGB(48,113,169)"><b>用户登录</b></h3>
            </div>
            <div class="modal-body">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                )); ?>
                <div class="form-group">
                    <label>用户名</label>
                    <?php echo $form->textField($login_model, 'user_name', array('class' => 'form-control', 'placeholder' => '用户名',
                        'required' => 'required')) ?>
                    <?php echo $form->error($login_model, 'user_name', array('class' => 'error_style')); ?>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <?php echo $form->passwordField($login_model, 'password', array('class' => 'form-control', 'placeholder' => '密码', 'required' => 'required')) ?>
                    <?php echo $form->error($login_model, 'password', array('class' => 'error_style')); ?>
                </div>
                <div style="padding-bottom: 10px;padding-top: 15px">
                    <button type="submit" class="btn btn-success">登录</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                </div>
                <?php $this->endWidget(); ?>
            </div>

        </div>
    </div>
</div>
<!--模态登录窗口结束-->

<!-- Modal 注册-->
<div class="modal fade" id="myModal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModalLabel" style="color:RGB(48,113,169)"><b>用户注册</b></h3>
            </div>
            <div class="modal-body">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                )); ?>
                <div class="form-group">
                    <label>用户名</label>
                    <?php echo $form->textField($user_model, 'user_name', array('class' => 'form-control', 'placeholder' => '用户名',
                        'required' => 'required')) ?>
                    <?php echo $form->error($user_model, 'user_name', array('class' => 'error_style')); ?>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <?php echo $form->passwordField($user_model, 'password', array('class' => 'form-control', 'placeholder' => '密码', 'required' => 'required')) ?>
                    <?php echo $form->error($user_model, 'password', array('class' => 'error_style')); ?>
                </div>
                <div class="form-group">
                    <label>重复密码</label>
                    <?php echo $form->passwordField($user_model, 'password2', array('class' => 'form-control', 'placeholder' => '重复密码', 'required' => 'required')) ?>
                    <?php echo $form->error($user_model, 'password2', array('class' => 'error_style')); ?>
                </div>

                <div class="form-group">
                    <label>邮箱</label>
                    <?php echo $form->emailField($user_model, 'email', array('class' => 'form-control', 'placeholder' => '邮箱', 'required' => 'required')) ?>
                    <?php echo $form->error($user_model, 'email', array('class' => 'error_style')); ?>
                </div>
                <div class="form-group">
                    <?php
                    if (Yii::app()->user->hasFlash('success')) {
                        echo Yii::app()->user->getFlash('success');
                    }
                    ?>
                </div>
                <div style="padding-bottom: 10px;padding-top: 15px">
                    <button type="submit" class="btn btn-success">注册</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="register_login">登录
                    </button>

                </div>

                <?php
                if (Yii::app()->user->hasFlash('success')) {
                    echo Yii::app()->user->getFlash('success');
                }
                ?>
                <?php $this->endWidget(); ?>
            </div>

        </div>
    </div>
</div>
<!--模态 注册窗口结束-->

<!--广告巨幕-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/1.jpg" alt="...">

            <div class="carousel-caption">
                ...
            </div>
        </div>
        <div class="item">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/2.jpg" alt="...">

            <div class="carousel-caption">
                ...
            </div>
        </div>
        <div class="item">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/3.jpg" alt="...">

            <div class="carousel-caption">
                ...
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--广告巨幕结束-->