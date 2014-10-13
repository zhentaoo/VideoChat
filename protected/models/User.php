<?php

class User extends CActiveRecord
{
    public $user_name;
    public $password;
    public $password2;
    public $email;
    private $_identity;

    /*
     * 对应的标签名
     */
    function attributeLabels()
    {
        return array(
            'user_name' => '用户名',
            'password' => '密码',
            'email' => '邮箱'
        );
    }

    public function rules()
    {
        return array(
            array('user_name', 'required', 'message' => '<font color="red">*用户名必填</font>'),
            array('password', 'required', 'message' => '<font color="red">*密码必填</font>'),
            array('password2', 'required', 'message' => '<font color="red">*重复密码必填</font>'),
            array('email', 'required', 'message' => '<font color="red">*邮箱必填</font>'),
            array('email', 'email', 'message' => '<font color="red">*邮箱格式错误！！！</font>'),
            array('password', 'authenticate'),
        );
    }

    public function authenticate($attribute, $params)
    {
        if ($this->password != $this->password2)
            $this->addError('password2', '<font color="red">*两次密码不同！！！</font>');
    }

    /*
     * 返回当前模型对象的静态方法
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /*
     * 返回当前模型的名字
     */

    public function tableName()
    {
        return 'user';
    }
}

?>