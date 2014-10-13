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

}
