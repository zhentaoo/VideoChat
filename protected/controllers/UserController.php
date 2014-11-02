<?php

/**
 *
 */
class UserController extends Controller
{
    public $layout = 'user_layout';
    public $uploadedFile;
    public $img = null;

    function actions()
    {
        return array(
            'captcha' => array('class' => 'system.web.widgets.captcha.CCaptchaAction', 'width' => '80', 'height' => '35'),
            'computer' => array('class' => 'application.controllers.Computer'),
            array('uploadedFile', 'file', 'types' => 'jpg,gif,png'),
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
                'actions' => array('App'),//提到的都可以访问
                'users' => array('*'),//登录的用户可以访问
            ),

            array(
                'allow',//允许访问
                'actions' => array('logout', 'upfile', 'index', 'personal', 'welcom', 'submit', 'error', 'computer', 'PageShow', 'captcha', 'S3'),//提到的都可以访问
                'users' => array('@'),//登录的用户可以访问
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
        $this->render("index", array('img' => '$img'));
    }

    public function actionWelcom()
    {
//        if (Yii::app()->user->getIsGuest()) {
//            $guest = '游客';
//            $this->render('index', array('guest' => $guest));
//        } else
        $img = new img();

        $this->render('welcom', array('img' => $img));
    }

    public function actionLogout()
    {
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
        $this->redirect("/yii-test");
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

        /** 获取全部商品信息findAll()* */
        // $user_infos = $user_model -> findAll();

        /** 获取全部数据的名字**/
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
        $per = 50;
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

    public function actionUpfile()
    {
        /*
         * 图片上传
         */
        $model = new Img();
        if (isset($_POST['Img'])) {
            //获取一个CUploadfile的实例
            $file = CUploadedFile::getInstance($model, 'url');
            //判断实例化是否成功 将图片重命名
            if (is_object($file) && get_class($file) === 'CUploadedFile') {
                $model->url = 'images/upfile/_' . time() . '_' . rand(0, 9999) . '.' . $file->extensionName;
                $model->id = time();
                $model->name = Yii::app()->user->name;
                $model->size = $file->size;
            } else {
                $model->url = 'images/upfile/no.jpg';
            }
            //将表中的其他的选项保存到数据表中  并将文件开始上传
            if ($model->save()) {
                if (is_object($file) && get_class($file) === 'CUploadedFile') {
                    //调用save方法，将命名和路径以参数形式传递
                    $file->saveAs($model->url);
//                    echo "上传成功";
//                    echo '<br>' . $file->name . '<br>' . $file->size . '<br>' . $file->tempName;
                }   // 上传图片
                else {
                    echo "上传失败";
                }
            }
        }
        $this->render('upfile', array('model' => $model));
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

    function actionApp()
    {
        /*
         * 在config/main.php中定义
         */
        echo Yii::app()->defaultController . '<br>';
        echo Yii::app()->layout . '<br>';
        echo Yii::app()->name . '<br>';
        echo Yii::app()->baseUrl . '<br>';
        echo Yii::app()->user->name . '<br>';
        echo Yii::app()->basePath . '<br>';

        $name = Yii::app()->user->name;
        $img = new Img();
        $var = $img->findAllBySql("select url from img where name ='$name'");
        foreach ($var as $_v) {
            echo $_v->url . '<br>';
        }
    }

}

?>
