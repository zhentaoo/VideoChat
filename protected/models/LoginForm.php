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

    public function rules()
    {
        return array(
            array('user_name,password', 'authenticate'),
        );
    }

    public function authenticate($attribute, $params)
    {
        if ($this->user_name == '')
            $this->addError('user_name', '<font color="red">*用户名不能空</font>');
        if ($this->password == '')
            $this->addError('password', '<font color="red">*密码不能空</font>');

        $user_model = new User();
        $sql = "select password from user where user_name = '$this->user_name'";
        $result = $user_model->findAllBySql($sql);
        $find_password = '';
        foreach ($result as $_v) {
            $find_password = $_v->password;
        }

        if ($this->password != $find_password)
            $this->addError('password', '<font color="red">*错误的用户名或密码</font>');
    }

}
