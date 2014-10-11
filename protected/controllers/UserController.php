<?php

/**
 *
 */
class UserController extends Controller
{
    public $islogin = false;

    public function actionIndex()
    {
        $this->render("index");
    }

    public function actionWelcom()
    {
        $this->render('welcom');
    }

    public function actionLogin()
    {

        $login_model = new LoginForm;
        if (isset($_POST['LoginForm'])) {
            $login_model->attributes = $_POST['LoginForm'];
            var_dump($login_model->user_name);
            var_dump($login_model->password);
            if ($login_model->validate())
                $this->redirect('welcom');
        }

        $this->render('login', array('login_model' => $login_model));

    }

    public function actionLogout()
    {
        $this->render("logout");
    }

    public function actionShow()
    {/*
         * 实例化数据模型对象user
         */
        $user_model = new User();

        // 通过model模型对象，调用相关方法帮我们查询数据
        // $user_infos = $user_model -> find();
        // echo $user_infos -> user_name.'<br>';
        // echo $user_infos -> user_id.'<br>';
        // echo $user_infos -> password.'<br>';

        /*         * 获取全部商品信息findAll()* */
        // $user_infos = $user_model -> findAll();

        /*         * 获取全部数据的名字* */
        // foreach ($user_infos as $_v) {
        // echo $_v -> user_name . '<br>';
        // echo $_v -> user_id . '<br>';
        // echo $_v -> password . '<br>';
        // }

        /*         * 直接打印信息* */
        // var_dump($user_infos);

        /*         * 自定义SQL语句获取* */
        $sql = "select * from user limit 3";
        $user_infos = $user_model->findAllBySql($sql);
        /*         * 在视图显示信息* */
        $this->render('show', array('user_infos' => $user_infos));
    }

    public function actionRegister()
    {
        $user_model = new User();
        if (isset($_POST['User'])) {
            $user_model->attributes = $_POST['User'];
            $user_model->save();
        }
        $this->render('register', array('user_model' => $user_model));
    }

    function actionUpdate()
    {

    }
}

?>