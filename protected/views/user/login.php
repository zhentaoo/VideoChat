<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<h1>用户登录</h1>
<?php $form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>
<table>
    <tr>
        <td> <?php echo $form->label($login_model, 'user_name'); ?></td>
        <td> <?php echo $form->textField($login_model, 'user_name') ?></td>
        <td><?php echo $form->error($login_model, 'user_name'); ?></td>
    </tr>
    <tr>
        <td><?php echo $form->label($login_model, 'password'); ?></td>
        <td><?php echo $form->passwordField($login_model, 'password') ?></td>
        <td><?php echo $form->error($login_model, 'password'); ?></td>
    </tr>
    <tr>
        <td><?php echo CHtml::submitButton('登录');
            ?></td>
        <td>
            <button type="button" id="register">注册</button>
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>
