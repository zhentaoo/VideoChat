<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $user_name;
    public $password;
    public $rememberMe;
    private $_identity;

    public function rules()
    {
        /**jQuery校验**/
        return array(
            array('user_name', 'required', 'message' => '<font color="red">*用户名必填</font>'),
            array('password', 'required', 'message' => '<font color="red">*密码必填</font>'),
            array('password', 'authenticate'),
        );
    }

    function attributeLabels()
    {
        return array(
            'user_name' => '用户名',
            'password' => '密码',
        );
    }


    public function authenticate($attribute, $params)
    {
        /**使用UserIdentity**/
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->user_name, $this->password);
            if (!$this->_identity->authenticate())
                $this->addError('password', '<font color="red">*密码或用户名错误！！</font>');
        }

        /**不使用UserIdentity**/
//        if ($this->user_name == '')
//            $this->addError('user_name', '<font color="red">*用户名不能空</font>');
//        if ($this->password == '')
//            $this->addError('password', '<font color="red">*密码不能空</font>');
//
//        $user_model = new User();
//        $sql = "select password from user where user_name = '$this->user_name'";
//        $result = $user_model->findAllBySql($sql);
//        $find_password = '';
//        foreach ($result as $_v) {
//            $find_password = $_v->password;
//        }
//
//        if ($this->password != $find_password)
//            $this->addError('password', '<font color="red">*错误的用户名或密码</font>');
    }

    public function login()
    {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            /**用户信息session持久操作**/
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }
}
