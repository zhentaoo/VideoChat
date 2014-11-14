<?php

/**
 *
 */
class UserController extends Controller
{

    public $layout = 'user_layout';
    public $uploadedFile;

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

    function filters()
    {
        return array('accessControl');
    }

    function accessRules()
    {
        return array(
            array(
                'allow', //允许访问
                'actions' => array('s1', 's2', 'App'), //提到的都可以访问
                'users' => array('*'),
            ),
            array(
                'allow', //允许访问
                'actions' => array('VideoList', 'videoRoom', 'logout', 'upfile', 'index', 'personal', 'welcom', 'submit', 'error', 'computer', 'PageShow', 'captcha', 'S3'), //提到的都可以访问
                'users' => array('@'), //登录的用户可以访问
            ),
            array(
                'allow',
                'actions' => array('show'),
                'users' => array('李震涛', '嘎嘎嘎'), //只有李震涛，嘎嘎嘎这两个用户可以访问
            ),
            array(
                'allow',
                'actions' => array('S1', 'S2', 'S3'),
                'users' => array('?'),
            ),
            array(
                'deny',
                'users' => array('*'), //上面沒有提到的页面，任何用户都不可以访问
            ),
        );
    }

    public function actionIndex()
    {
        $img = new img();
        $this->render("index", array('img' => '$img'));
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

        /** 获取全部数据的名字* */
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
         * 图片上传,若存在，删除旧图，上传新图
         */
        $model = new Img();
        $user_id = User::model()->find('user_name=:name', array(':name' => Yii::app()->user->name))->id;
        if (isset($_POST['Img'])) {
            //获取一个CUploadfile的实例
            $file = CUploadedFile::getInstance($model, 'url');
            //判断实例化是否成功 将图片重命名
            if (is_object($file) && get_class($file) === 'CUploadedFile') {
                $model->url = 'images/upfile/' . $user_id . '.' . $file->extensionName;
                $model->id = $user_id;
                $model->name = Yii::app()->user->name;
                $model->size = $file->size;
            }

            /*
             * 如果图片存在
             */
            if (is_file($model->url)) {
                //删除文件
                unlink($model->url);
                //删除数据库记录
                Img::model()->deleteAll('name=:name', array(':name' => Yii::app()->user->name));
            }

            //将表中的其他的选项保存到数据表中  并将文件开始上传
            if ($model->save()) {
                if (is_object($file) && get_class($file) === 'CUploadedFile') {
                    /*
                     * 上传图片，将图片上传到$model->url这个路径下.调用save方法，将命名和路径以参数形式传递
                     */
                    $file->saveAs($model->url);
                    $success = '上传头像成功';
                    $this->redirect('personal', array('success' => $success));
                } else {
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

    function actionVideoRoom()
    {
        $this->render('VideoRoom');
    }

    function actionVideoList()
    {
        $model = new Video();

        if (isset($_POST['Video'])) {
            $model->attributes = $_POST['Video'];
            $model->save();
//            $this->redirect('VideoRoom?id=22');
        }

        $cnt = $model->count();
        $per = 20;
        $page = new Pagination($cnt, $per);
        /*
         * 按照分页样式拼装sql语句进行查询
         */
        $sql = "select * from video $page->limit";
        $videoList = $model->findAllBySql($sql);
        /*
         * 通过数组0到8传递分页参数
         */
        $page_list = $page->fpage(array(3, 5, 7));
//        echo $page_list;
        $this->render('VideoList', array('model' => $model, 'videoList' => $videoList, 'page_list' => $page_list));
    }

    function actionError()
    {
        $this->render('error');
    }

    function actionS1()
    {
        $arr = array('name' => 'zs', 'psw' => '123');
        Yii::app()->session['user_name'] = $arr;
        echo 'make session success';
    }

    function actionS2()
    {
//        var_dump(Yii::app()->session);
        foreach (Yii::app()->session as $key => $val) {
            echo '<br>' . Yii::app()->session['user_name']['name'] . '<br>';
        }

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
        /*
         * 删除cookie
         */
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

        echo '<br>findAllBySql: ';
        $var = $img->findAllBySql("select url from img where name ='$name'");
        foreach ($var as $_v) {
            echo $_v->url . '<br>';
        }

        echo 'find: ';
        $var2 = $img->find('size=:size', array(':size' => '27796'));
        if ($var2 != null)
            echo $var2->url;
        /*
         * 如果是find查询出来的结果，save相当于update
         */
        $var2->name = 'sssdfsdf';
        $var2->save();

//        $var3=new Img();
//        $var3->name='李震s涛';
//        $var3->url='sadfasd';
//        $var3->id='sdf';
//        $var3->size='34';
//        $var3->save();
    }

}

?>
