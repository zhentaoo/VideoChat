<?php

/**
 *
 */
class UserController extends Controller
{
    public $layout = 'user';
    function actions()
    {
        return array(
            'captcha' => array('class' => 'system.web.widgets.captcha.CCaptchaAction', 'width' => '80', 'height' => '35'),
            'computer' => array('class' => 'application.controllers.Computer'),
        );
        /*
         * 我们在外边随便定义一个类(computer)，都可以这种方式访问
         */

    }

    function  filters()
    {
        return array('accessControl');
    }

    function accessRules()
    {
        return array(
            array(
                'allow',//允许访问
                'actions' => array('personal', 'welcom', 'submit','error', 'computer', 'index', 'login', 'register', 'PageShow', 'captcha', 'S3'),//提到的都可以访问
                'users' => array('*'),//登录的用户可以访问
            ),

            array(
                'allow',
                'actions' => array('show'),
                'users' => array('李震涛', '嘎嘎嘎'),//只有李震涛，嘎嘎嘎这两个用户可以访问
            ),
            array(
                'allow',
                'actions' => array('S1', 'S2', 'S3'),
                'users' => array('?'),
            ),

            array(
                'deny',
                'users' => array('*'),//上面沒有提到的页面，任何用户都不可以访问
            ),
        );
    }

    public function actionIndex()
    {
        $this->render("index");
    }

    public function actionWelcom()
    {
//        if (Yii::app()->user->getIsGuest()) {
//            $guest = '游客';
//            $this->render('index', array('guest' => $guest));
//        } else
        $this->render('welcom');
    }

    public function actionLogin()
    {

        $login_model = new LoginForm;
        if (isset($_POST['LoginForm'])) {
            $login_model->attributes = $_POST['LoginForm'];
            /**validate只校验不保存，和save()的区别**/
            if ($login_model->validate() && $login_model->login())
                $this->redirect('welcom');
        }
        $this->render('login', array('login_model' => $login_model));
    }

    public function actionLogout()
    {

        $this->redirect("index");
    }

    public function actionShow()
    {/*
         * 实例化数据模型对象user
         */
        $user_model = new User();

        // 通过model模型对象，调用相关方法帮我们查询数据
        // $user_infos = $user_model -> find();
        // echo $user_infos -> user_name.' < br>';
        // echo $user_infos -> user_id.' < br>';
        // echo $user_infos -> password.' < br>';

        /*         * 获取全部商品信息findAll()* */
        // $user_infos = $user_model -> findAll();

        /*         * 获取全部数据的名字* */
        // foreach ($user_infos as $_v) {
        // echo $_v -> user_name . ' < br>';
        // echo $_v -> user_id . ' < br>';
        // echo $_v -> password . ' < br>';
        // }

        /*         * 直接打印信息* */
        // var_dump($user_infos);

        /*         * 自定义SQL语句获取* */
        $sql = "select * from user limit 3";
        $user_infos = $user_model->findAllBySql($sql);
        /*         * 在视图显示信息* */
        $this->render('show', array('user_infos' => $user_infos));
    }

    public function actionPageShow()
    {
        /*
         * 分页类组件使用
         * 获取数据模型
         */
        $user_model = new User();
        /*
         * 实例化分页类对象
         */
        $cnt = $user_model->count();
        $per = 30;
        $page = new Pagination($cnt, $per);
        /*
         * 按照分页样式拼装sql语句进行查询
         */
        $sql = "select * from user $page->limit";
        $user_infos = $user_model->findAllBySql($sql);
        /*
         * 通过数组0到8传递分页参数
         */
        $page_list = $page->fpage(array(3, 5, 7));
//        echo $page_list;

        $this->render('PageShow', array('user_infos' => $user_infos, 'page_list' => $page_list));
    }

    public function actionPersonal()
    {
        $this->render('personal');
    }

    public function actionRegister()
    {
        $user_model = new User();
        if (isset($_POST['User'])) {
            $user_model->attributes = $_POST['User'];
            if ($user_model->save()) {
                Yii::app()->user->setFlash('success', '注册成功');
//                $this->redirect('./index.php/user/login');
            }
        }
        $this->render('register', array('user_model' => $user_model));
    }

    function actionUpdate()
    {

    }

    function actionSubmit()
    {

    }

    function actionError()
    {
        $this->render('error');
    }

    function actionS1()
    {
        Yii::app()->session['user_name'] = 'zhangsan';
        Yii::app()->session['email'] = 'sdf@qq . com';
        echo 'make session success';
    }

    function actionS2()
    {
        echo Yii::app()->session['user_name'] . ' < br>';
        echo Yii::app()->session['email'] . ' < br>';
        echo 'use session success';
    }

    function actionS3()
    {
        /*
         * 删除一个session
         */
//        unset(Yii::app()->session['user_name']);

        /*
         * 删除全部session
         */
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
        $this->render('index');
    }

    function actionC1()
    {
        /*
         * 设置cookie
         */
        $ck = new CHttpCookie('sex', '女');
        $ck->expire = time() + 3600;
        /*
         * 把$ck对象放入cookie组件里
         */
        Yii::app()->request->cookies['sex'] = $ck;
        /*
         * 设置第二个cookies
         */
        $ck2 = new CHttpCookie('hobby', '男');
        $ck2->expire = time() + 3600;
        Yii::app()->request->cookies['hobby'] = $ck2;

        echo "cookie make success";
    }

    function actionC2()
    {
        /*
         * 访问cookie
         */
        echo Yii::app()->request->cookies['sex'];
        echo Yii::app()->request->cookies['hobby'];
    }

    function actionC3()
    {
        unset(Yii::app()->request->cookies['sex']);

    }

    function actionLu()
    {
        //输出路径别名信息
        /*
         * framwork\web
         */
        echo Yii::getPathOfAlias('system . web');
    }


}

?>
