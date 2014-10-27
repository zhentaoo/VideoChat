<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button hidden="hidden" id="real-login" data-toggle="modal"
        data-target="#myModal" style="margin-left: 5%">
    登录
</button>
<!-- Modal 登录 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <?php echo $form->textField($login_model, 'user_name') ?>
                    <?php echo $form->error($login_model, 'user_name'); ?>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <?php echo $form->passwordField($login_model, 'password') ?>
                    <?php echo $form->error($login_model, 'password'); ?>
                </div>
                <div style="padding-bottom: 10px;padding-top: 15px">
                    <button type="submit" class="btn btn-success">登录</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-success">注册</button>
                </div>
                <?php $this->endWidget(); ?>
            </div>

        </div>
    </div>
</div>
<!--模态窗口结束-->
