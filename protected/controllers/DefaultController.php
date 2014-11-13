<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/10/15
 * Time: 9:08
 */
class DefaultController extends Controller
{
    public $layout = 'default_layout';

    function actions()
    {
        return array(
            'captcha' => array('class' => 'system.web.widgets.captcha.CCaptchaAction', 'width' => '80', 'height' => '35'),
            /*
             * 我们在外边随便定义一个类(computer)，都可以这种方式访问
             */
            'computer' => array('class' => 'application.controllers.Computer'),
        );
    }

    function actionIndex()
    {
        $login_model = new LoginForm;
        $user_model = new User();
        $psw_error = false;
        $rgs_error = false;

        if (isset($_POST['LoginForm'])) {
            $login_model->attributes = $_POST['LoginForm'];
            /**validate只校验不保存，和save()的区别**/
            if ($login_model->validate() && $login_model->login())
                $this->redirect('/VideoChat/index.php/user/');
            else {
                $psw_error = true;
            }
        }
        if (isset($_POST['User'])) {
            $user_model->attributes = $_POST['User'];
            $rgs_error = true;
            if ($user_model->save()) {
                Yii::app()->user->setFlash('success', '<font color="green">恭喜注册成功!!!!!!!</font>');
            }
        }
        $this->render('index', array('login_model' => $login_model, 'user_model' => $user_model, 'psw_error' => $psw_error, 'rgs_error' => $rgs_error));
    }

    function actionWelcome()
    {
        $this->render('welcome');
    }

    function actionF1()
    {
        $this->render('f1');
    }

    public function actionLogout()
    {
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
        $this->redirect("/VideoCHat");
    }


    function actionApp()
    {
        /*
         * 在config/main.php中定义
         */
        echo Yii::app()->defaultController . '<br>';
        echo Yii::app()->layout . '<br>';
        echo Yii::app()->name . '<br>';
        echo Yii::app()->baseUrl . '<br>';
    }

    function actionTime()
    {
        /*
         * 计算脚本执行时间
         */
        Yii::beginProfile('mytime');
        for ($i = 0; $i <= 5000; $i++) {
            if ($i % 7 == 0)
                echo "seven<br/>";
            else if ($i % 8 == 0)
                echo 'eight<br/>';
            else
                echo $i . '<br/>';
        }
        Yii::endProfile('mytime');
    }

    function actionError()
    {
        $this->renderPartial('error');
    }
}